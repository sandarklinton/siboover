@extends('template.admin')

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
                    <td>B 1234 XXX</td>
                </tr>
                <tr>
                    <td>Seri Kendaraan</td>
                    <td>Toyota Vios</td>
                </tr>
                <tr>
                    <td>Kapasitas</td>
                    <td>4 orang</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="col s6">
        <div class="row">
            <div class="input-field col s4 offset-s2">
                <select>
                    <option value="1">Aktif</option>
                    <option value="2">Non-aktif</option>
                </select>
                <label>Status Kendaraan</label>
            </div>
        </div>
        <div class="row">
            <div class="center-align">
                <button class="btn waves-effect waves-light" type="submit" name="action">Submit</button>
            </div>
        </div>
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
    <div class="col s6 center-align" style="padding-top: 50px;">
        <a class="waves-effect waves-light btn">Hapus Kendaraan</a>
    </div>
</div>
@endsection