@extends('template.admin')

@section('title', 'Review')

@section('content')
<nav>
    <div class="nav-wrapper" style="padding-left:10px;">
        <div class="col s12">
            <a href="<?=URL::route('history');?>" class="breadcrumb">HISTORY</a>
            <a href="<?=URL::route('review');?>" class="breadcrumb">REVIEW</a>
        </div>
    </div>
</nav>
<div class="row" style="padding-top: 30px;">
    <div class="col s3">
        <img src="avatar.png" style="width: 200px; height: 200px;">
    </div>
    <div class="col s3">
        <p>Nama</p>
        <p>Nomor Handphone</p>
        <p>Email</p>
        <p>Rating</p>
    </div>
</div>
<div class="row">
    <div class="col s4 offset-s1 center-align">
        <div class="row">
            <label>Parameter 1</label>
            <select>
                <option value="" disabled selected>-</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
        </div>
        <div class="row">
            <label>Parameter 2</label>
            <select>
                <option value="" disabled selected>-</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
        </div>
        <div class="row">
            <label>Parameter 3</label>
            <select>
                <option value="" disabled selected>-</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
        </div>
        <div class="row">
            <label>Parameter 4</label>
            <select>
                <option value="" disabled selected>-</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
        </div>
        <div class="row">
            <label>Parameter 5</label>
            <select>
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
            <textarea id="review" class="materialize-textarea"></textarea>
        </div>
        <div class="row">
            <div class="center-align">
                <button class="btn waves-effect waves-light" type="submit" name="action">Submit</button>
            </div>
        </div>
    </div>
</div>
@endsection