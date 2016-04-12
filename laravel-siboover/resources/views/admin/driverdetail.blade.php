@extends('template.admin')

@section('title', 'Driver Detail')

@section('content')
<nav>
    <div class="nav-wrapper" style="padding-left:10px;">
        <div class="col s12">
            <a href="#!" class="breadcrumb">YOUR BOOKING</a>
            <a href="#!" class="breadcrumb">PICK DRIVER</a>
            <a href="#!" class="breadcrumb">DRIVER DETAIL</a>
        </div>
    </div>
</nav>
<div class="row" style="padding-top: 30px;">
    <div class="col s3">
        <img src="avatar.png" style="width: 200px; height: 200px;">
    </div>
    <div class="col s3">
        <p>Nama</p>
        <p>Nomor Handphone</p>
        <p>Email</p>
        <p>Rating</p>
    </div>
</div>
<div class="row">
    <div class="col s6 offset-s2">
        <p>Review:</p>
        <p>"Ini adalah sebuah review"</p>
        <p class="right-align">- Pemberi Review</p>
    </div>
</div>
<div class="row">
    <div class="col s6 offset-s2 center-align">
        <button class="btn waves-effect waves-light" type="submit" name="action">Konfirmasi Booking</button>
    </div>
</div>
@endsection