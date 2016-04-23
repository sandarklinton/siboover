@extends('layouts.newapp')

@section('title', 'Review')

@section('content')
<nav>
    <div class="nav-wrapper" style="padding-left:10px;">
        <div class="col s12">
            <a href="<?=URL::route('history');?>" class="breadcrumb">HISTORY</a>
            <a href="<?=URL::route('review', $idbook);?>" class="breadcrumb">REVIEW</a>
        </div>
    </div>
</nav>
<div class="row" style="padding-top: 30px;">
    <div class="col s3">
        <img src="{{ asset('avatar.png') }}" style="width: 200px; height: 200px;">
    </div>
    <div class="col s3">
        <?php
            $nama = "".$info_driver[0]->Nama;
            $nohp = "".$info_driver[0]->NoHP;
            $email = "".$info_driver[0]->Email;

        ?>
        <p>{{$nama}}</p>
        <p>{{$nohp}}</p>
        <p>{{$email}}</p>
        <p>{{$rating}}</p>
    </div>
</div>
<form method="post" action = "<?=URL::route('review', $idbook);?>">
{{csrf_field()}}
<div class="row">
    <div class="col s4 offset-s1 center-align">
        <div class="row">
            <label>Ketepatan Waktu</label>
            <select name = "parameter1" required>
                <option value="" disabled selected>-</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
        </div>
        <div class="row">
            <label>Pelayanan yang Diberikan</label>
            <select name = "parameter2" required>
                <option value="" disabled selected>-</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
        </div>
        <div class="row">
            <label>Kewaspadaan dalam Berkendara</label>
            <select name = "parameter3" required>
                <option value="" disabled selected>-</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
        </div>
        <div class="row">
            <label>Ketersediaan saat Dibutuhkan</label>
            <select name = "parameter4" required>
                <option value="" disabled selected>-</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
        </div>
        <div class="row">
            <label>Keramahan Driver</label>
            <select name = "parameter5" required>
                <option value="" disabled selected>-</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
        </div>
    </div>
    <div class="col s4 offset-s1">
        <p>Review:</p>
        <div class="row">
            <label for="review">Review</label>
            <textarea id="review" name = "review" class="materialize-textarea"></textarea>
        </div>
        <div class="row">
            <div class="center-align">
                <button class="btn waves-effect waves-light" type="submit" name="action">Submit</button>
            </div>
        </div>
    </div>
</div>
<input type="hidden" value = "{{ $idbook }}" name = "idbook">
</form>
@endsection