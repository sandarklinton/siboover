@extends('layouts.newapp')

@section('title', 'Add Maintenance')

@section('content')
<nav>
    <div class="nav-wrapper" style="padding-left:10px;">
        <div class="col s12">
        @if(Session::get('role') == 'admin')
           <a href="<?=URL::route('manageasset');?>" class="breadcrumb">MANAGE ASSET</a>
            <a href="<?=URL::route('managevehicle');?>" class="breadcrumb">MANAGE VEHICLE</a> 
        @else
            <a href="<?=URL::route('maintenancehistory');?>" class="breadcrumb">MAINTENANCE HISTORY</a>
        @endif
            
            <a href="<?=URL::route('addmaintenance');?>" class="breadcrumb">ADD MAINTENANCE</a>
        </div>
    </div>
</nav>
<div class="row" style="padding-top: 30px;">
    <form class="col s6 offset-s3" method="post" action= {{url('addmaintenance')}} >
     {{csrf_field()}}
        <div class="row">
            <div style = "background:rgba(255, 0, 0, 0.6); text-align:center;" class="input-field" >
                    @if (!empty($success))
                        {{$success}}
                    @endif
            </div>
            <div class="input-field">
                <select name = 'kendaraan'  required>
                 <option value="" disabled selected>--Pilih Kendaraan--</option>
                    <?php
                        $kendaraan = DB::table('kendaraan')->get();
                        foreach ($kendaraan as $vehicle)
                        {
                          $out = $vehicle->nomorpolisi;
                          $cekdriver = DB::table('driver')->where('nomorpolisi', "=", $out)->get();
                          if($cekdriver != null){
                            echo "<option value='".$out."'>".$out."</option>";  
                          }
                          
                        }
                     ?>
                 </select>
                <label for="kendaraan">Kendaraan</label>
            </div>
        </div>
        <div class="row">
            <div>
                <label for="date">Tanggal dan Waktu</label>
                <input id="date" type="datetime-local" name = "tanggal_waktu" required>
            </div>
        </div>
        <div class="row">
            <div class="input-field">
                <select name = 'jenis_maintenance' required>
                    <option value="" disabled selected>--Pilih Jenis Maintenance--</option>
                    <option value="Berkala">Berkala</option>
                    <option value="Darurat">Darurat</option>
                </select>
                
                <label for="type">Jenis Maintenance</label>
            </div>
        </div>
        <div class="center-align">
            <button class="btn waves-effect waves-light" type="submit" name="action">Simpan</button>
        </div>
    </form>
</div>
@endsection