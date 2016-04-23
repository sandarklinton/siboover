@extends('layouts.newapp')

@section('title', 'Add Vehicle')

@section('content')
<nav>
    <div class="nav-wrapper" style="padding-left:10px;">
        <div class="col s12">
            <a href="<?=URL::route('manageasset');?>" class="breadcrumb">MANAGE ASSET</a>
            <a href="<?=URL::route('managevehicle');?>" class="breadcrumb">MANAGE VEHICLE</a>
            <a href="<?=URL::route('addvehicle');?>" class="breadcrumb">ADD VEHICLE</a>
        </div>
    </div>
</nav>
<div class="row" style="padding-top: 30px;">
    <div class="col s3">
        <div class="center-align">
            <p>Tambah Data Kendaraan</p>
        </div>
    </div>
</div>
<div class="row">
    <form class="col s4 offset-s2" method="post" action= {{url('addvehicle')}} >
    {{csrf_field()}}
        <div class="row">
              <div class="input-field">
                      @if (!empty($success))
                          {{$success}}
                      @endif
              </div>
        </div>
        <div class="row">
            <div class="input-field">
                <input id="username" type="text" class="validate" name="nomorpolisi" required="required">
                <label for="username">Nomor Polisi</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field">
                <input id="series" type="text" class="validate" name="serikendaraan" required="required">
                <label for="series">Seri Kendaraan</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field">
                <input id="capacity" type="number" class="validate" name="kapasitas" required="required">
                <label for="capacity">Kapasitas</label>
            </div>
        </div>
        <div class="right-align">
            <button class="btn waves-effect waves-light" type="submit" name="action">Submit</button>
        </div>
    </form>
</div>
@endsection
