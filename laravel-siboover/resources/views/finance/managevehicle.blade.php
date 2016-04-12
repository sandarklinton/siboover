@extends('template.finance')

@section('title', 'Manage Vehicle')

@section('content')
<nav>
    <div class="nav-wrapper" style="padding-left:10px;">
        <div class="col s12">
            <a href="<?=URL::route('managevehiclef');?>" class="breadcrumb">MAINTENANCE HISTORY</a>
        </div>
    </div>
</nav>
<div class="row" style="padding-top: 30px;">
    <table class="col s8 offset-s2">
        <thead>
            <tr>
                <th data-field="date">Tanggal</th>
                <th data-field="jenis">Jenis Maintenance</th>
                <th data-field="driver">Driver</th>
                <th data-field="kendaraan">Kendaraan</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Tanggal</td>
                <td>Jenis Maintenance</td>
                <td>Driver</td>
                <td>Kendaraan</td>
                <td><a class="waves-effect waves-teal btn-flat" style="padding:0; text-transform:none;">Lihat Bukti</a></td>
            </tr>
        </tbody>
    </table>
</div>
<div class="row center-align">
    <a class="waves-effect waves-light btn" href="<?=URL::route('addmaintenance');?>">Tambahkan Jadwal Maintenance</a>
</div>
@endsection