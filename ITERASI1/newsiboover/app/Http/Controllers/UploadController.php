<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Storage;
use validate;
use DB;

$GLOBALS['idmaintenance'] = 0;

class uploadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function upload($idmaintenance)
    {
    	$GLOBALS['idmaintenance'] = $idmaintenance;
        return view('driverstuff.upload')->with('idmaintenance', $idmaintenance);
    }
    public function handleUpload(Request $request) {

      if($request->hasFile('file')) {
        $file = $request->file('file');
        //$allowedFilesTypes = config(app.allowedFilesTypes);
      //  $maxFileSize = config('app.maxFileSize')
        //$rules = [
          //'file' => 'required|mimes;'.$allowedFilesTypes.'|max:'.$maxFileSize
        //];
      //  $this->validate($request, $rules);
        $extension = $file->getClientOriginalExtension();
        
        if (($extension != 'pdf') && ($extension != 'jpg') && ($extension != 'jpeg') && ($extension != 'png') && ($extension != 'PDF') && ($extension != 'JPG') && ($extension != 'JPEG') && ($extension != 'PNG')) {
        	
          return redirect()->to('/trips')->with('idmaintenance', $GLOBALS['idmaintenance']);
        }
        $size = $file->getSize();
        if ($size > 50000000) {
        	echo 2;
        	dd($request);
            return redirect()->to('/trips')->with('idmaintenance', $GLOBALS['idmaintenance']);;
        }

        $fileName = $file->getClientOriginalName();
        $destinationPath = 'uploads/'.$fileName;
        $uploaded = Storage::put($destinationPath, file_get_contents($file->getRealPath()));
        // DB::insert('insert into invoice(id, id_maintenance, tanggal_waktu, foto) VALUES (?,?,?,?);', ['',$GLOBALS['idmaintenance'],'\''.date(Y-m-d).'\'', $destinationPath]);

	    if ($uploaded) {

	    }

      }
      return redirect()->to('trips')->withSuccess('Foto berhasil diupload');
    }
    // public function upload(){
    //   return view('upload');
    // }
}
