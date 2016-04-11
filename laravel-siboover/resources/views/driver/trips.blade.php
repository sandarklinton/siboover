@extends('template.driver')

@section('title', 'Trips')

@section('content')
<nav>
    <div class="nav-wrapper" style="padding-left:10px;">
        <div class="col s12">
            <a href="<?=URL::route('trips');?>" class="breadcrumb">UPDATE TRIPS</a>
        </div>
    </div>
</nav>
<div class="row" style="padding-top: 30px;">
    <div class="col s6 offset-s3">
        <div class="row">
            <div>
                <label for="date">Tanggal</label>
                <input id="date" type="date" class="datepicker">
            </div>
        </div>
        <div class="row">
            <div class="input-field">
                <input id="distance" type="text" class="validate">
                <label for="distance">Jarak Tempuh Kendaraan (km)</label>
            </div>
        </div>
        <div class="row center-align">
            <button class="btn waves-effect waves-light" type="submit" name="action">Submit</button>
        </div>
        <div class="row" style="margin-top: 50px;">
            <p>Upload Invoice Service Kendaraan</p>
            <form action="#">
                <div class="file-field input-field">
                    <div class="btn">
                        <span>File</span>
                        <input type="file">
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text">
                    </div>
                </div>
            </form>
        </div>
        <div class="row center-align">
            <button class="btn waves-effect waves-light" type="submit" name="action">Upload</button>
        </div>
    </div>
</div>
@endsection