@extends('layouts.newapp')

@section('title', 'Vehicle Detail')

@section('content')
<nav>
    <div class="nav-wrapper" style="padding-left:10px;">
        <div class="col s12">
            <a href="#!" class="breadcrumb">MANAGE ASSET</a>
            <a href="#!" class="breadcrumb">MANAGE VEHICLE</a>
            <a href="#!" class="breadcrumb">VEHICLE DETAIL</a>
        </div>
    </div>
</nav>
<div class="row" style="padding-top: 50px;">
    <div class="col s6">
        <table>
            <tbody>

                <tr>
                    <td>Nomor Polisi</td>
                    <td>{{$data[0]->nomorpolisi}}</td>
                </tr>
                <tr>
                    <td>Seri Kendaraan</td>
                    <td>{{$data[0]->nama}}</td>
                </tr>
                <tr>
                    <td>Kapasitas</td>
                    <td>{{$data[0]->kapasitas}}</td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td>@if($data[0]->status == 1)
                    Aktif
                    @else tidak aktif
                    @endif
                        </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="col s6">
        <div style="background-color: #66ff66;">
            @if (!empty($success))
                {{$success}}
            @endif
        </div>
        <form action="{{URL::to('vehicledetail',$data[0]->nomorpolisi)}}" method="post">
        {{csrf_field()}}
            <div class="row">
                <div class="input-field col s4 offset-s2">
                    <select name="status">
                        <option value="1">Aktif</option>
                        <option value="0">Non-aktif</option>
                    </select>
                    <label>Status Kendaraan</label>
                </div>
            </div>
            <div class="row">
                <div class="center-align">
                    <button class="btn waves-effect waves-light" type="submit" name="action">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="row">
    <div class="col s6">
        <table>
            <thead>
                <tr>
                    <th data-field="date">Tanggal</th>
                    <th data-field="type">Jenis Maintenance</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Tanggal</td>
                    <td>Jenis</td>
                </tr>
                <tr>
                    <td>Tanggal</td>
                    <td>Jenis</td>
                </tr>
            </tbody>
        </table>
    </div>
    
</div>
@endsection