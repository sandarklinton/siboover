@extends('template.admin')

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
<div class="row" style="padding-top: 50px;">
    <div class="col s3">
        <div class="center-align">
            <p>Daftar Kendaraan</p>
        </div>
    </div>
</div>
<div class="row">
    <div class="col s3">
        <div class="center-align">
            <a class="waves-effect waves-teal btn-flat">Seri Kendaraan</a>
        </div>
    </div>
    <div class="col s3">
        <div class="center-align">
            <p>Nomor Polisi</p>
        </div>
    </div>
</div>
<div class="row">
    <div class="col s6">
        <div class="center-align">
            <a class="waves-effect waves-light btn" href="<?=URL::route('addvehicle');?>">Tambah Kendaraan</a>
        </div>
    </div>
    <div class="col s6">
        <div class="center-align">
            <a class="waves-effect waves-light btn">Tambah Record Maintenance</a>
        </div>
    </div>
</div>
@endsection