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


class AssetController extends Controller
{
    public function manageAsset() {
        return view('adminstuff.manageasset');
    }

    public function managevehicle() {
        if (Session::get('role') =='finance') {
            # code...
        return view('financestuff.managevehicle');
        }elseif (Session::get('role') =='admin') {
            # code...
            return view('adminstuff.managevehicle');
        } 
    }
    public function destroy($nomorpolisi){
        DB::table('kendaraan')-> where('nomorpolisi', '=', $nomorpolisi)->delete();
        return redirect('/managevehicle');
    }

     public function addVehicle() {
        return view('adminstuff.addvehicle');
    }
    public function addKendaraan(Request $request) {
        $vehicle = DB::table('kendaraan')->where("nomorpolisi", "=", $request->nomorpolisi)->get();
        if($vehicle == null){
            DB::table('kendaraan')->insert(
              ['nama' => $request->serikendaraan, 'nomorpolisi' => $request->nomorpolisi, 'kapasitas' => $request->kapasitas , 'jarak' => 0, 'status' => 0]
            );
            return view('adminstuff.managevehicle')->withSuccess('Kendaraan Berhasil Ditambahkan');
        }
        else {
            return view('adminstuff.addvehicle')->withSuccess('Kendaraan Gagal Ditambahkan');
        }
    }
    public function vehicledetail($nomorpolisi) {

        $data = DB::table('kendaraan')-> where("nomorpolisi", "=", $nomorpolisi)->get();
        return view('adminstuff.vehicledetail')-> with('data', $data);
    } 
    public function updateVehicle($nomorpolisi) {
        DB::table('kendaraan')
            ->where('nomorpolisi', $nomorpolisi)
            ->update(['status' => $_POST['status']]);
        $data = DB::table('kendaraan')-> where("nomorpolisi", "=", $nomorpolisi)->get();
        return view('adminstuff.managevehicle')->withSuccess('Status Berhasil Diubah')->with('data',$data);
    }

}

