@extends('layouts.newapp')

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
                    <td colspan="7" style="text-align: center;">
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
                    <th data-field="driver">Driver</th>
                    <th data-field="status">Status</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php  
                    foreach ($tables as $nama ) {
                        $take = get_object_vars($nama);
                        if($take['status'] == 'Completed' || $take['status'] == 'Canceled'){
                            echo '<tr>';
                            $dtime = strtotime($take['tanggal_waktu']);
                            $date = date('d-m-Y', $dtime);
                            $time = date('G:i:s', $dtime);
                            //echo '<td>'.$take['tanggal_waktu'].'</td>';
                            echo '<td>'.$date.'</td>';
                            echo '<td>'.$time.'</td>';
                            //echo '<td>'.$take['id_booking'].'</td>';
                            //echo '<td>'.$take["username_customer"].'</td>';
                            //echo '<td>'.$take['keperluan'].'</td>';
                            echo '<td>'.$take['tujuan'].'</td>';
                            echo '<td>'.$take['username_driver'].'</td>';
                            echo "<td>".$take['status']."</td>";
                            // $review = DB::table('review')->select('id_booking')->where('id_booking', '=', $nama->id_booking)->get();
                            // if($review != null){
                            //     echo "<td></td>";
                            //     echo "<td></td>";
                            // }
                            // else {
                            //     if($take['status'] != "Canceled"){
                            //         echo '<td><a class="btn waves-effect waves-light" style="padding:0; width: 100px; text-transform:none;" href="'.URL::to("/review", $nama->id_booking).'">Review</a></td>';
                            //         echo "<td><a class='btn waves-effect waves-light' style='padding:0; width: 100px; text-transform:none;' href='".URL::to('/cancelbooking', $nama->id_booking)."'>Batalkan</a></td>";
                            //     }
                            // }
                            echo '</tr>';
                        }
                    } 
               ?>
            </tbody>
        </table>
    </div>
</div>
<div class="row">
    <div class="center-align">
        @if (Session::get('role') == 'admin')
        <button class="btn waves-effect waves-light" type="submit" name="action">Lihat History Keseluruhan</button>
        @endif
    </div>
</div>

	
	

@endsection