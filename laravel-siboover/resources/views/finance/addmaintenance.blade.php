@extends('template.finance')

@section('title', 'Add Maintenance')

@section('content')
<nav>
    <div class="nav-wrapper" style="padding-left:10px;">
        <div class="col s12">
            <a href="<?=URL::route('managevehiclef');?>" class="breadcrumb">MAINTENANCE HISTORY</a>
            <a href="<?=URL::route('addmaintenance');?>" class="breadcrumb">ADD MAINTENANCE</a>
        </div>
    </div>
</nav>
<div class="row" style="padding-top: 30px;">
    <form class="col s6 offset-s3">
        <div class="row">
            <div class="input-field">
                <input id="kendaraan" type="text" class="validate">
                <label for="kendaraan">Kendaraan</label>
            </div>
        </div>
        <div class="row">
            <div>
                <label for="date">Tanggal</label>
                <input id="date" type="date" class="datepicker">
            </div>
        </div>
        <div class="row">
            <div class="input-field">
                <input id="time" type="text" class="validate">
                <label for="time">Waktu</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field">
                <input id="type" type="text" class="validate">
                <label for="type">Jenis Maintenance</label>
            </div>
        </div>
        <div class="center-align">
            <button class="btn waves-effect waves-light" type="submit" name="action">Simpan</button>
        </div>
    </form>
</div>
@endsection