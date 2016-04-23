<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Session;
use Auth;
use DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Mail;


class BookingController extends Controller
{
    //
    public function postBook($username)
    {
        //dd(Session::all());
        $tanggalwaktu = "";
        $tujuan = "";
        $keperluan = "";
        $driverpicked = $username;
        $penyewa = session::get('username');
        Session::put('driverpicked', $driverpicked);      
        
        if (Session::has('tanggal')) {
            # code...
            $tanggalwaktu = Session::pull('tanggal'). " " . Session::pull('waktu');
            $tujuan = Session::pull('tujuan');
            $keperluan = Session::pull('keperluan');
        
            DB::insert('insert into booking (id_booking, username_customer, username_driver, tanggal_waktu, keperluan, tujuan, status, pesan_warning) values (?, ?, ?, ?, ?, ?, ?, ?)', array('', $penyewa, $driverpicked, $tanggalwaktu,$keperluan,$tujuan, 'Ready', ''));

            //now the mail part...
            $email = DB::table('user')->where('username', $username)->value('email');
            Session::put('drivermail',$email);
            // echo $email;
            // dd($email);
           
                Mail::send('emailtemplate.drivernotif', ['namadriver' => Session::get('driverpicked')], function($message){

                $message->to(Session::get('drivermail'), Session::get('driverpicked'))->subject('Ada Request Terbaru!');

            });
                
            return redirect('/booking');
        }

    }
    public function getBookingForm()
    {
        $tables= DB::table('booking')->where([['username_customer','=',Session::get('username')]])->get();
        $driver = DB::table('user')->where('username', '=', Session::get('username'))->get();
        
    	return view('userstuff/booking')->with('tables', $tables)->with('driver', $driver);
        
    }
   


    public function getDriver(){
        // check dan simpan masukan ke session dulu disini

        $forbooking = array(
                    'tanggal' => $_POST['tanggal'],
                    'waktu' => $_POST['waktu'],
                    'tujuan' => $_POST['tujuan'],
                    'keperluan' => $_POST['keperluan']
                 );
        Session::put($forbooking);
        // dd(Session::get($forbooking));

    	$tables= DB::table('driver')->get();
    	$ratingarray = array();

    	foreach ($tables as $nama) {
    		# code...
    		$blow = get_object_vars($nama);
    		$search = $blow['username'];
    		
    		$results = DB::select('select sum(rating) as rating from review where id_booking in (SELECT id_booking FROM booking where username_driver = \''.$search.'\')');

    		$resultss = get_object_vars($results[0]);
    		if($resultss['rating']==''){
			    //balikkan dengan nilai unrated
			    $ratingarray[$search] = "unrated";
			}else{ 
				//cari banyaknya review
				$banyak = DB::select('select count(rating) as banyakcount from review where id_booking in (SELECT id_booking FROM booking where username_driver = \''.$search.'\')');
				$banyaknya = get_object_vars($banyak[0]);

				//put into ratingarray
				$ratingarray[$search]=round((float)$resultss['rating']/(int)$banyaknya['banyakcount'],2);

			}
    	}
        Session::put('table',$tables);
        Session::put('ratingarray', $ratingarray);
        return redirect('pickdriver');
    }
    public function  showDriver()
    {
        # code...
        return view('userstuff/pickdriver')->with('ratingarray', Session::get('ratingarray'))->with('tables',Session::get('table')); 
    }

    public function getDriverDetail($username)
    {   
        //set/refresh driver yg disewa di session
        Session::put('driverpicked', $username);

        //return Redirect 
        $email  = DB::table('user')->where('username', $username)->value('email');
        $nohp   = DB::table('user')->where('username', $username)->value('nohp');
        $rating =  Session::get('ratingarray')[$username];
        $review = DB::select('select distinct username_customer, comment from booking, review where booking.id_booking= review.id_booking and booking.username_driver = \''. $username.'\'');
       
    	return view('userstuff/driverdetail')->with('username',$username)->with('email', $email)->with('nohp', $nohp)->with('rating', $rating)->with('review', $review);
    	# code...
    }

    public function cancelBooking($idbook){
         $booking = DB::table('booking')->where('id_booking', "=", $idbook)->get();
        if ($booking == null){
            return redirect('history');
        }
        else {
            DB::table('booking')->where('id_booking', '=', $idbook)->update(['status' => 'Canceled']);
            return redirect('history')->with('status', 'Jadwal Booking Telah Berhasil Dibatalkan');
        }  
    }

    public function manageBooking() {
        return view('adminstuff.managebooking');
    }

    public function manageAccount() {
        return view('adminstuff.manageaccount');
    }
}

