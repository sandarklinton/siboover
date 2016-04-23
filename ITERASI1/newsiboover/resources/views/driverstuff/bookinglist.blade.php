@extends('layouts.newapp')

@section('title', 'Booking List')

@section('content')
<nav>
    <div class="nav-wrapper" style="padding-left:10px;">
        <div class="col s12">
            <a href="{{ URL::to('/bookinglist') }}" class="breadcrumb">BOOKING LIST</a>
        </div>
    </div>
</nav>
<div class="row" style="padding-top: 30px;">
    <table class="col s8 offset-s2">
        <thead>
            <tr>
                <td colspan="6" style="text-align: center;">
                    <div style = "background:rgba(161, 255, 157, 0.6);" class="input-field">
                            @if (!empty($success))
                                {{$success}}
                            @endif
                    </div>
                </td>
                <td colspan="6" style="text-align: center;">
                    <div style = "background:rgba(161, 255, 157, 0.6);" class="input-field">
                        @if (!empty($status))
                            {{ $status }}
                        @endif
                    </div>
                </td>
            </tr>
            <tr>
                <th data-field="date">Tanggal</th>
                <th data-field="time">Waktu</th>
                <th data-field="destination">Tujuan</th>
                <th data-field="penumpang">Penumpang</th>
                <th data-field="status">Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $booking = DB::table('booking')->where('username_driver', '=', Session::get('username'))->paginate(5);
                foreach ($booking as $data_booking) {
                    echo "<tr>
                       <td>".date("d-m-Y", strtotime($data_booking->tanggal_waktu))."</td>
                        <td>".date("H:i", strtotime($data_booking->tanggal_waktu))."</td>
                        <td>".$data_booking->tujuan."</td>
                        <td>".$data_booking->username_customer."</td>
                        <td>".$data_booking->status."</td>
                        <td><a class='btn waves-effect waves-light' style='padding:0; width: 100px; text-transform:none;' href='".URL::to('bookingdetails', $data_booking->id_booking)."'>Detail</a></td>";
                }

            ?>
        </tbody>
        <div class="col s8 offset-s2">
            {!! $booking->render() !!}    
        </div>
        
    </table>
</div>
@endsection
<!--
 
                       
-->