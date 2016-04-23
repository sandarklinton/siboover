<?php

namespace App\Http\Controllers\Auth;

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

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    public function showLoginForm(){
      
        
            return view('/auth/login');
    }
    public function login(){

         
        $user= DB::table('user')->where([['username','=',$_POST['username']],['password','=',$_POST['password']]])->first();
        if($user===null){
            $forsession = $arrayName = array('wrong' => 1);
            Session::put($forsession);
            return redirect()->route('mula');
        }
        else
            { 
                $role = DB::table('customer')->where([['username','=', $_POST['username']]])->first();
                $take = '';
                if(is_null($role)){
                $take = 'driver';
                }
                else{
                $takee = get_object_vars($role);
                $take =$takee['role'];
                }


                $forsession = array(
                    'username' => $_POST['username'],
                    'password' => $_POST['password'],
                    'role' => $take

                 );
                Session::put($forsession);
               // if ($take['role'] == 'customer') {
                  //  # code...
                //    return redirect()->route('customer');
              //  }
                if ($take=='customer') {
                    # code...
                    return redirect()->route('customer');
                }elseif ($take=='admin') {
                    # code...
                    return redirect()->route('admin');
                }elseif ($take=='finance') {
                    # code...
                    return redirect()->route('finance');
                }else {
                    # code...
                    return redirect()->route('drivers');
                }

                
        }
                

    }
    public function logout(){
            Session::flush();
            return redirect()->route('mula');
    }

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
