<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Session;
use Auth;
use DB;

class HistoryController extends Controller
{
    //
    
    public function getHistory()
   	{
   		# code...
   		$tables= DB::table('booking')->where([['username_customer','=',Session::get('username')]])->get();
   		return view('userstuff/history')->with('tables', $tables);
   	}

}
