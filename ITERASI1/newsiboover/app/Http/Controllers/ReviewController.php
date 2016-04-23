<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;

class ReviewController extends Controller
{
    //
    public function review($idbook) {
    	$booking = DB::table('booking')->select('username_driver')->where('id_booking', '=', $idbook)->get();
    	if($booking == null){
    		return redirect('history');
    	}
    	else {
	    	$username = "".$booking[0]->username_driver;
	    	$driver = DB::table('user')->where('username', '=', $username)->get();
	        $rating = '';
	    	$results = DB::select('select sum(rating) as rating from review where id_booking in (SELECT id_booking FROM booking where username_driver = \''.$username.'\')');

	    		$resultss = get_object_vars($results[0]);
	    		if($resultss['rating']==''){
				    //balikkan dengan nilai unrated
				    $rating = "unrated";
				}else{ 
					//cari banyaknya review
					$banyak = DB::select('select count(rating) as banyakcount from review where id_booking in (SELECT id_booking FROM booking where username_driver = \''.$username.'\')');
					$banyaknya = get_object_vars($banyak[0]);

					
					$rating=round((float)$resultss['rating']/(int)$banyaknya['banyakcount'],2);

				}


	        return view('userstuff.review')->with('idbook', $idbook)
	        							   ->with('info_driver', $driver)
	        							   ->with('rating', $rating);
	    }

    }
    
    public function tambahReview(Request $request){
        $nilai_review = intval($request->parameter1) + intval($request->parameter2) + intval($request->parameter3) + intval($request->parameter4) + intval($request->parameter5);
        $mean = $nilai_review/5;
        $gentId = 0;
        $cek = DB::table('review')->get();
       
        foreach ($cek as $id) {
            if($id->id_comment > $gentId){
                $gentId = $id->id_comment;
            }
        }
        $gentId = $gentId + 1;
        $mean = number_format($mean, 1);
        DB::table('review')->insert(
            ['id_booking' => $request->idbook, 'rating' => $mean, 'comment'=> $request->review, 'id_comment' => $gentId]
        );
        DB::table('booking')->where('id_booking', '=', $request->idbook)->update(['status' => 'Completed']);
        return redirect('history');
    }
}
