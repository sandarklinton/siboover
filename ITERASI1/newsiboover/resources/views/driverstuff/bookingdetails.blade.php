@extends('layouts.newapp')

@section('title', 'Booking Details')

@section('content')
<nav>
    <div class="nav-wrapper" style="padding-left:10px;">
        <div class="col s12">
            <a href="{{ URL::to('bookinglist') }}" class="breadcrumb">BOOKING LIST</a> 
            <a href="{{ URL::to('/bookingdetails', $success) }} " class="breadcrumb">BOOKING DETAILS</a> 
        </div>
    </div>
</nav>
<div class="row" style="padding-top: 30px;">
    <div class="row col s4 offset-s2">
        <?php
            $month = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'];
            $bulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember', 'Senin', 'Selasa', "Rabu", 'Kamis', 'Jumat'];
            $booking = DB::table('booking')->where('id_booking', '=', $success)->get();
            $tanggal = str_ireplace($month, $bulan, (date('l, d F Y', strtotime($booking[0]->tanggal_waktu))));
            $waktu = date('h:i', strtotime($booking[0]->tanggal_waktu));
            $tujuan = $booking[0]->tujuan;
            $pemesan = $booking[0]->username_customer;
            $driver = $booking[0]->username_driver;
            echo "<p>".$tanggal."</p>";
        ?>
        
    </div>
</div>
<div class="row">
    <div class="align-center col s6 offset-s3">
        <table>
            <tbody>
                <tr>
                    <td>Waktu</td>
                    <td>{{$waktu}}</td>
                </tr>
                <tr>
                    <td>Tujuan</td>
                    <td>{{$tujuan}}</td>
                </tr>
                <tr>
                    <td>Pemesan</td>
                    <td>{{$pemesan}}</td>
                </tr>
                <tr>
                    <td>Driver</td>
                    <td>{{$driver}}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<div class="row">
    <div class="col s6 offset-s3">
      <form method="post" action = {{ url('/bookinglist')}} > 
      {{csrf_field()}}
          {!! Form::label("warning", "Pesan Peringatan") !!}
                <?php
                    $pesan = DB::table('booking')->where("id_booking", '=', $success)->get();
                    if(Session::get('role') == 'driver'){
                        if($pesan[0]->status == "Ready" || $pesan[0]->status == "Warning"){
                            if($pesan[0]->pesan_warning != null){
                                echo Form::textarea("pesanPeringatan", $pesan[0]->pesan_warning, array("id"=>"warning", "class"=>"materialize-textarea"));
                            }
                            else {
                                echo Form::textarea("pesanPeringatan", null, array("id"=>"warning", "class"=>"materialize-textarea"));   
                            }
                        }
                        else {
                            if($pesan[0]->pesan_warning != null){
                                echo "<p>".$pesan[0]->pesan_warning."</p>";
                            } else {
                                echo "<p>-</p>";
                            }    
                        }
                    } else {
                        if($pesan[0]->pesan_warning != null){
                            echo "<p>".$pesan[0]->pesan_warning."</p>";
                        } else {
                            echo "<p>-</p>";
                        }
                    }
                ?>
            <input type="hidden" name='id_booking' value = '{{$success}}' >
            <div class="row">
                <?php
                // $pesan = DB::table('booking')->where("id_booking", '=', $success)->get();
                 // if($pesan[0]->status == "Ready"){
                 //    echo '<div class=" col s6 offset-s3 right-align">';
                 //        
                 //    echo "</div>";
                
                ?>
                <div class=" col s6 offset-s3 right-align">
                    {!! Form::submit("Submit", ["class"=>"btn waves-effect waves-light"]) !!}
                 </div>
            </div>
      </form>

    </div>
</div>
@endsection