@extends('layouts.newapp')

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
                        <th data-field="driver">Status</th>
                        <th data-field="review"></th>
                        <th data-field="batal"></th>

                    </tr>
                </thead>
                <tbody>
                <?php  
                foreach ($tables as $nama ) {
                     $take = get_object_vars($nama);
                        if ($take['status'] == 'Ready' || $take['status'] == 'Warning' ){
                            echo '<tr>';
                            $dtime = strtotime($take['tanggal_waktu']);
                            $date = date('d-m-Y', $dtime);
                            $time = date('G:i:s', $dtime);
                            echo '<td>'.$date.'</td>';
                            echo '<td>'.$time.'</td>';
                            echo '<td>'.$take['tujuan'].'</td>';
                            $driver = DB::table('user')->where('username', '=', $take['username_driver'])->get();
                            echo '<td>'.$driver[0]->Nama.'</td>';
                            echo '<td>'.$take['status'].'</td>';
                            $now = strtotime(date("Y-m-d H:i", time()+25200));
                            if($now >= $dtime && $take['status'] != "Warning"){
                             echo '<td><a class="btn waves-effect waves-light" style="padding:0; width: 100px; text-transform:none;" href="'.URL::to("/review", $nama->id_booking).'">Review</a></td>';
                            } else {
                                echo "<td></td>";
                            }
                            
                            if($now < $dtime){
                                echo "<td><a class='btn waves-effect waves-light' style='padding:0; width: 100px; text-transform:none;' href='".URL::to('/cancelbooking', $nama->id_booking)."'>Batalkan</a></td>";
                            } else {
                                echo "<td></td>";
                            }

                            if($take['status'] == 'Warning'){
                                echo "<td><a class='btn waves-effect waves-light' style='padding:0; width: 100px; text-transform:none;' href='".URL::to('/bookingdetails', $take['id_booking'])."'>Detail</a></td>";
                                //URL::to('/bookingdetails', $nama->id_booking)
                            }
                            echo '<tr>';

                        }
               } ?>
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
                <form class="col s7 offset-s1" id= "formform"method="POST" onsubmit = "return alert(this);" action="{{ url('/pickdriver') }}">
                     {{ csrf_field() }}
                    <div class="row">
                        <div>
                            <label for="date">Tanggal</label>
                            <input id="date" name= "tanggal" type="date" required="required">
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field">
                            <input id="waktu" name = "waktu" type="text" class="validate" required="required">
                            <label for="waktu">Waktu</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field">
                            <input id="tujuan" name = "tujuan" idtype="text" class="validate" required="required">
                            <label for="tujuan">Tujuan</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field">
                            <textarea id="keperluan" name="keperluan" class="materialize-textarea" required="required"></textarea>
                            <label for="keperluan">Keperluan</label>
                        </div>
                    </div>
                    <div class="right-align">
                        <button class="btn waves-effect waves-light" type="submit" name="action" >Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    
function alert(form) {

    if (!confirm("Apakah data yang anda masukkan telah sesuai?") == true) {
        return false;
    } else{
        document.forms["formform"].submit();
    }
    
}</script>
<!-- 
 <select required="required">                              
                                <option value="8">8:00 AM</option>
                                <option value="9">9:00 AM</option>
                                <option value="10">10:00 AM</option>
                                <option value="11">11:00 AM</option>
                                <option value="12">12:00 PM</option>
                                <option value="13">1:00 PM</option>
                                <option value="14">2:00 PM</option>
                                <option value="15">3:00 PM</option>
                           </select> -->

@endsection

