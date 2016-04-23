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
use Illuminate\Support\Facades\Redirect;
use Storage;



class UserController extends Controller
{
    public function manageAccount() {

        return view('adminstuff.manageaccount');
    }

    public function profile() {
        if(Session::get('role')== "admin")
        return view('adminstuff.profile');
    	else return view('userstuff.profile');
    } 

    public function updateProfile(Request $request) {        
        DB::table('user')
            ->where('username', Session::get('username'))
            ->update(['nama' => $request->name, 'nohp' => $request->phone, 'email' => $request->email]);

        if($request->hasFile('file')) {
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();

            if (($extension != 'pdf') && ($extension != 'jpg') && ($extension != 'jpeg') && ($extension != 'png')) {
                return redirect()->to('/profile');
            }
            $size = $file->getSize();
            if ($size > 50000000) {
                return redirect()->to('/profile');
            }

            $fileName = $file->getClientOriginalName();
            $destinationPath = 'avatar/'.$fileName;
            $uploaded = Storage::put($destinationPath, file_get_contents($file->getRealPath()));
            
            if ($uploaded) {

            }
        }

        return redirect('profile')->withSuccess('Profil Berhasil Diubah');
    }
}

