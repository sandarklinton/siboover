@extends('template.user')

@section('title', 'Profile')

@section('content')
<nav>
    <div class="nav-wrapper" style="padding-left:10px;">
        <div class="col s12">
            <a href="<?=URL::route('profileuser');?>" class="breadcrumb">YOUR PROFILE</a>
        </div>
    </div>
</nav>

<div class="row" style="padding-top: 30px;">
    <div class="col s3 offset-s1">
        <div class="row center-align">
            <img src="avatar.png" style="width: 200px; height: 200px;">
        </div>
        <div class="row">
            <form action="#">
                <div class="file-field input-field">
                    <div class="btn">
                        <span>File</span>
                        <input type="file">
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text">
                    </div>
                </div>
            </form>
        </div>
        <div class="row center-align">
            <a class="waves-effect waves-teal btn-flat" style="padding:0; text-transform:none;">Hapus Foto</a>
        </div>
    </div>
    <div class="col s3 offset-s1">
        <form>
            <div class="row">
                <div class="input-field">
                    <input id="nama" type="text" class="validate">
                    <label for="nama">Nama</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field">
                    <input id="nohp" type="text" class="validate">
                    <label for="nohp">No. Handphone</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field">
                    <input id="email" type="email" class="validate">
                    <label for="email">Email</label>
                </div>
            </div>
            <div class="right-align">
                <button class="btn waves-effect waves-light" type="submit" name="action">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection