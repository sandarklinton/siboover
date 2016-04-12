@extends('template.driver')

@section('title', 'Booking Details')

@section('content')
<nav>
    <div class="nav-wrapper" style="padding-left:10px;">
        <div class="col s12">
            <a href="<?=URL::route('driverdetail');?>" class="breadcrumb">DRIVER DETAIL</a>
            <a href="<?=URL::route('bookinglist');?>" class="breadcrumb">BOOKING LIST</a>
            <a href="<?=URL::route('bookingdetails');?>" class="breadcrumb">BOOKING DETAILS</a>
        </div>
    </div>
</nav>
<div class="row" style="padding-top: 30px;">
    <div class="row col s4 offset-s2">
        <p>Hari, dd Month yyyy</p>
    </div>
</div>
<div class="row">
    <div class="align-center col s6 offset-s3">
        <table>
            <tbody>
                <tr>
                    <td>Waktu</td>
                    <td>hh:mm</td>
                </tr>
                <tr>
                    <td>Tujuan</td>
                    <td>Tujuan</td>
                </tr>
                <tr>
                    <td>Pemesan</td>
                    <td>Pemesan</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<div class="row">
    <div class="col s6 offset-s3">
        <label for="warning">Peringatan</label>
        <textarea id="warning" class="materialize-textarea"></textarea>
    </div>
</div>
<div class="row">
    <div class=" col s6 offset-s3 right-align">
        <button class="btn waves-effect waves-light" type="submit" name="action">Submit</button>
    </div>
</div>

@endsection