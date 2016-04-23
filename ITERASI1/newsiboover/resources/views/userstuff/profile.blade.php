@extends('layouts.newapp')

@section('title', 'Profile')

@section('content')
<nav>
    <div class="nav-wrapper" style="padding-left:10px;">
        <div class="col s12">
            <a href="<?=URL::route('profile');?>" class="breadcrumb">YOUR PROFILE</a>
        </div>
    </div>
</nav>

<div class="row" style="padding-top: 30px;">
    {!! Form::open(array('url' => '/profile', 'files' => true, 'action' => 'post')) !!}
        <div class="col s3 offset-s1">
            <div class="row center-align">
                <img src="avatar.png" style="width: 200px; height: 200px;">
            </div>
            <div class="row">
                <p>Pilih foto:</p>
                <div class="file-field input-field">
                    <div class="btn">
                        <span>File</span>
                        {!! Form::file('file') !!}
                    </div>
                    <div class="file-path-wrapper">
                        {!! Form::text('path', '', ['class' => 'file-path validate']) !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="col s3 offset-s1">
            
                <div class="row">
                    <div style="background-color: #66ff66;">
                        @if (!empty($success))
                        {{$success}}
                        @endif
                    </div>
                    <div class="input-field">
                        <input id="nama" type="text" class="validate" name="name" value="">
                        <label for="nama">Nama</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field">
                        <input id="nohp" type="number" class="validate" name="phone" value="">
                        <label for="nohp">No. Handphone</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field">
                        <input id="email" type="email" class="validate" name="email" value="">
                        <label for="email">Email</label>
                    </div>
                </div>
                <div class="right-align">
                    <button class="btn waves-effect waves-light" type="submit" name="action">Simpan</button>
                </div>
            
        </div>
    {!! Form::close() !!}
</div>
@endsection