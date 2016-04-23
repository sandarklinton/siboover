@extends('layouts.newapp')

@section('title', 'Driver')

@section('content')
<nav>
    <div class="nav-wrapper" style="padding-left:10px;">
        <div class="col s12">
            <a href="<?=URL::route('driverdetail', Session::get('username'));?>" class="breadcrumb">DRIVER DETAIL</a>
        </div>
    </div>
</nav>
<div class="row" style="padding-top: 50px;">
    <div class="col s6">
        <div class="center-align">
            <a class="waves-effect waves-light btn">Lihat Detail Driver</a>
        </div>
    </div>
    <div class="col s6">
        <div class="center-align">
            <a class="waves-effect waves-light btn" href="<?=URL::route('bookinglist');?>">Lihat Daftar Booking</a>
        </div>
    </div>
</div>
@endsection