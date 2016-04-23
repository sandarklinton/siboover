<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        
        if ((Session::get('role') == 'customer') == 1) {
            # code...
            return view('template/user');
        }elseif (Session::get('role') ==1) {
            # code...
            return view('template/admin');
        }
        //return view('home');
    }
}
