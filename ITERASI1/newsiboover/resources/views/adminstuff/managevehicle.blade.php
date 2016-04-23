@extends('layouts.newapp')

@section('title', 'Manage Vehicle')

@section('content')
<nav>
    <div class="nav-wrapper" style="padding-left:10px;">
        <div class="col s12">
            <a href="<?=URL::route('manageasset');?>" class="breadcrumb">MANAGE ASSET</a>
            <a href="<?=URL::route('managevehicle');?>" class="breadcrumb">MANAGE VEHICLE</a>
        </div>
    </div>
</nav>
<div class="row">
      <div class="input-field">
              @if (!empty($success))
                  {{$success}}
              @endif
      </div>
</div>
<div class="row" style="padding-top: 50px;">
    <div class="col s3">
        <div class="center-align">
            <p>Daftar Kendaraan</p>
        </div>
    </div>
</div>
<?php
$variable = DB::table('Kendaraan')->get();

foreach ($variable as $kendaraan) {
  # code...
  echo '<div class="row">
      <div class="col s3">
          <div class="center-align">
              <a class="waves-effect waves-teal btn-flat" href="'.URL::to('vehicledetail', $kendaraan->nomorpolisi).'">'.$kendaraan->nama.'</a>
          </div>
      </div>
      <div class="col s3">
          <div class="center-align">
              <p>'.$kendaraan->nomorpolisi.'</p>
          </div>
      </div>
      <div class="pull-right">
    <form action="deletekendaraan/'.$kendaraan->nomorpolisi.'" method="post">'
?>{{csrf_field()}}
   <?php  
   echo '<button class="btn waves-effect waves-light" type="submit" name="action">Hapus Kendaraan</button></form>
</div>
  </div>
';
}

?>

<div class="row">
    <div class="col s6">
        <div class="center-align">
            <a class="waves-effect waves-light btn" href="<?=URL::route('addvehicle');?>">Tambah Kendaraan</a>
        </div>
    </div>
    <div class="col s6">
        <div class="center-align">
            <a class="waves-effect waves-light btn" href="<?=URL::route('addmaintenance');?>">Tambah Record Maintenance</a>
        </div>
    </div>
</div>
@endsection
