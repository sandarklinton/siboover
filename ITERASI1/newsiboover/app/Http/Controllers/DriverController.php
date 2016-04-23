<?php

//controller dibikin di artisan kontos
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Html\HtmlFacade;
use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Session;
use Auth;
use DB;
use App\Http\Requests;
use Mail;
use Illuminate\Support\Facades\Redirect;




class DriverController extends Controller
{
    public function trips() {
        return view('driverstuff.trips');
    }
    
    public function addtrips(Request $request) {
    	$nopol = DB::table('driver')->where('username', Session::get('username'))->get();
    	
        DB::table('kendaraan', 'driver')
            ->where('nomorpolisi', $nopol[0]->nomorpolisi)
            ->update(['jarak' => $request->distance]);

        return view('driverstuff.trips')->withSuccess('Input Berhasil');
    }

    public function driver() {
        return view('driverstuff.driver');
    }

    public function bookingList() {
        return view('driverstuff.bookinglist');
    }
    public function bookingDetails($id) {
        $booking = DB::table('booking')->where('id_booking', "=", $id)->get();
        if ($booking == null){
            return redirect('bookinglist');
        }
        else {
            return view('driverstuff.bookingdetails')->withSuccess($id);
        }
    }
    public function tambahPesanWarning(Request $request){
        DB::table('booking')->where("id_booking", "=", $request->id_booking)->update(["pesan_warning" => $request->pesanPeringatan]);
        DB::table('booking')->where("id_booking", "=", $request->id_booking)->update(["status" => "Warning"]);

        //mail
        $usernames = DB::table('booking')->where("id_booking", "=", $request->id_booking)->get();
        $username  = $usernames[0]->username_customer;

        $email = DB::table('user')->where('username', $username)->value('email');
            Session::put('mail',$email);
            Session::put('usernamemailing', $username);
            // echo $email;
            // dd($email);
           
                Mail::send('emailtemplate.warningnotif', ['nama' => $username], function($message){

                $message->to(Session::get('mail'), Session::get('usernamemailing'))->subject('Booking bermasalah...');

            });

        return view("driverstuff.bookinglist")->withSuccess("Pesan Peringatan Berhasil Diubah");
    }
}

