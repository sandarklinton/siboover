@extends('template.admin')

@section('title', 'Booking')

@section('content')
<nav>
    <div class="nav-wrapper" style="padding-left:10px;">
        <div class="col s12">
            <a href="#!" class="breadcrumb">YOUR BOOKING</a>
        </div>
    </div>
</nav>
<div class="row" style="padding-top: 30px;">
    <div style="padding-left: 20px;">
        <p>Booking yang telah dibuat:</p>
        <div class="col s8">
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
                        <td><a class="waves-effect waves-teal btn-flat" style="padding:0; text-transform:none;">Cancel</a></td>
                        <td><a class="waves-effect waves-teal btn-flat" style="padding:0; text-transform:none;">Suggestions</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="row">
    <div style="padding-left: 20px;">
        <p>Pilih jadwal booking:</p>
        <div class="col s6">
            <div class="row">
                <form class="col s7 offset-s1">
                    <div class="row">
                        <div>
                            <label for="date">Tanggal</label>
                            <input id="date" type="date" class="datepicker">
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field">
                            <input id="waktu" type="text" class="validate">
                            <label for="waktu">Waktu</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field">
                            <input id="tujuan" type="text" class="validate">
                            <label for="tujuan">Tujuan</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field">
                            <textarea id="keperluan" class="materialize-textarea"></textarea>
                            <label for="keperluan">Keperluan</label>
                        </div>
                    </div>
                    <div class="right-align">
                        <button class="btn waves-effect waves-light" type="submit" name="action">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection