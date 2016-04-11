@extends('template.driver')

@section('title', 'Booking List')

@section('content')
<nav>
    <div class="nav-wrapper" style="padding-left:10px;">
        <div class="col s12">
            <a href="<?=URL::route('driverdetails');?>" class="breadcrumb">DRIVER DETAIL</a>
            <a href="<?=URL::route('bookinglist');?>" class="breadcrumb">BOOKING LIST</a>
        </div>
    </div>
</nav>
<div class="row" style="padding-top: 30px;">
    <table class="col s8 offset-s2">
        <thead>
            <tr>
                <th data-field="date">Tanggal</th>
                <th data-field="time">Waktu</th>
                <th data-field="destination">Tujuan</th>
                <th data-field="penumpang">Penumpang</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Tanggal</td>
                <td>Waktu</td>
                <td>Tujuan</td>
                <td>Penumpang</td>
                <td><a class="waves-effect waves-teal btn-flat" style="padding:0; text-transform:none;" href="<?=URL::route('bookinglist');?>">Details</a></td>
            </tr>
        </tbody>
    </table>
</div>
@endsection