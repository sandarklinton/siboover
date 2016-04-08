<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Session;
use Auth;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;


class UserController extends Controller
{
    public function login(Request $request)
    {	
    	$user= DB::table('user')->where([['email','=',$request->email],['password','=',$request->password]])->first();
    	if($user===null){
    		echo "tidak ada";

    	}
    	else
    		{ return view('\welcome');}
    }

    public function index()
    {
    	return view('\login');
    }
}

database.php

<?php
