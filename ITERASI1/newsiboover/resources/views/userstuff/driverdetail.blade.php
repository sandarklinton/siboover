@extends('layouts.newapp')

@section('title', 'Driver Detail')

@section('content')


 
<nav>
    <div class="nav-wrapper" style="padding-left:10px;">
        <div class="col s12">
            <a href="#!" class="breadcrumb">YOUR BOOKING</a>
            <a href="#!" class="breadcrumb">PICK DRIVER</a>
            <a href="#!" class="breadcrumb">DRIVER DETAIL</a>
        </div>
    </div>
</nav>
<div class="row" style="padding-top: 30px;">
    <div class="col s3">
        <img src="{{asset('avatar.png')}}" style="width: 200px; height: 200px;">
    </div>
    <div class="col s3">
        <p>{{$username}}</p>
        <p>{{$nohp}}</p>
        <p>{{$email}}</p>
        <p>{{$rating}}</p>
    </div>
</div>
<div class="row">
    <div class="col s6 offset-s2">

        <p>Review:</p>
        @foreach ($review as $cetak)
        <?php $cetakk = get_object_vars($cetak) ?>
        <p>{{$cetakk['comment']}}</p>
        <!-- <p class="right-align">- {{$cetakk['username_customer']}}</p> -->
        @endforeach
    </div>
</div>
<div class="row">
    <div class="col s6 offset-s2 center-align">
    <form name="formkonfirmasi" method="POST" onsubmit = "return alert(this);" action="{{ URL::to('/booking' , $username) }}">
    {{csrf_field()}}
        <input type="hidden" name="drivervalue" value="{{$username}}">
        <button class="btn waves-effect waves-light" type="submit" name="action" >Konfirmasi Booking</button>  
    
    </form>
        
    </div>
</div>

<script type="text/javascript">
    
var back = "{{url('/pickdriver')}}";
var front = "{{url('/booking')}}";
function alert(form){
    if (confirm("Anda yakin ingin memesan driver ini?") == true) {
        confirm("Pemesanan Sukses!");
        document.forms["formkonfirmasi"].submit();
    } else{
        window.location.assign(back);
    }
}
</script>



@endsection