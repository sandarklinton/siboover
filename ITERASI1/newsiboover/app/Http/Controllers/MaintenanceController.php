<?php

//controller dibikin di artisan kontos
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



class MaintenanceController extends Controller
{
   public function addMaintenance() {
        return view('adminstuff.addmaintenance');
    }

    public function tambahmaintenance(Request $request)
    {   
        $tglMaintenance = strtotime($request->tanggal_waktu);
        $now = strtotime(date("Y-m-d H:i", time()+25200));
        $time_now = strtotime(date("H:i", time()+25200));
        $time_maintenance = strtotime(date('H:i', $tglMaintenance));
        $jam_masuk = strtotime(date("07:00"));
        $jam_keluar=strtotime(date("15:30"));
        $maintenance  = DB::table('maintenance')->where([["nomorpolisi", "=", $request->kendaraan], ["tanggal_waktu", "=", $request->tanggal_waktu]])->get();
        $cekHari = date('l', $tglMaintenance);
        if($cekHari != "Sunday" && $cekHari != "Saturday"){
            if(($tglMaintenance > $now) && ($time_maintenance >= $jam_masuk) && ($time_maintenance <= $jam_keluar)){
                $tanggal_now = strtotime(date("Y-m-d"));
                $tanggal_maintenance = strtotime(date('Y-m-d', $tglMaintenance));
                    if($maintenance == null){
                        DB::table('maintenance')->insertGetId(
                           ['nomorpolisi' => $request->kendaraan, 'jenis' => $request->jenis_maintenance, 'username_customer'=> Session::get('username'), 'tanggal_waktu' => $request->tanggal_waktu]
                        );
                        return view('financestuff.managevehicle')->withSuccess('Jadwal Maintenance Berhasil Ditambahkan');
                    }
                    else {
                        return view('adminstuff.addmaintenance')->withSuccess('Jadwal Maintenance Gagal Ditambahkan');
                    }
            }  
            else {
                return view('adminstuff.addmaintenance')->withSuccess('Jadwal Maintenance Gagal Ditambahkan');
            }
        }
        else {
            return view('adminstuff.addmaintenance')->withSuccess('Jadwal Maintenance Gagal Ditambahkan');
        }
        
    }
}

