@extends('template.admin')

@section('title', 'History')

@section('content')
<nav>
    <div class="nav-wrapper" style="padding-left:10px;">
        <div class="col s12">
            <a href="#!" class="breadcrumb">HISTORY</a>
        </div>
    </div>
</nav>
<div class="row" style="padding-top: 30px;">
    <div class="col s8 offset-s2">
        <table>
            <thead>
                <tr>
                    <th data-field="date">Tanggal</th>
                    <th data-field="time">Waktu</th>
                    <th data-field="destination">Tujuan</th>
                    <th data-field="driver">Driver</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Tanggal</td>
                    <td>Waktu</td>
                    <td>Tujuan</td>
                    <td>Driver</td>
                    <td><a class="waves-effect waves-teal btn-flat" style="padding:0; text-transform:none;" href="<?=URL::route('review');?>">Review</a></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<div class="row">
    <div class="center-align">
        <button class="btn waves-effect waves-light" type="submit" name="action">Lihat History Keseluruhan</button>
    </div>
</div>
@endsection