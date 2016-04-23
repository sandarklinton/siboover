@extends('layouts.newapp')

@section('title', 'Upload')

@section('content')
<div class="center-align row" style="padding-top: 30px;">
    <div class="col s8 offset-s2">
        <h5>Upload Invoice Di Sini</h5>
        <br>
    <form method="post" enctype="multipart/form-data" action = "{{URL::to('doupload', $idmaintenance)}}">
        {{csrf_field()}}
        <div class="file-field input-field">
            <div class="btn">
                <span>File</span>
                {!! Form::file('file') !!}
            </div>
            <div class="file-path-wrapper">
                {!! Form::text('path', '', ['class' => 'file-path validate']) !!}
            </div>
        </div>
        {!! Form::token() !!}
        <br>
        <div class="btn waves-effect waves-light">
            {!! Form::submit('Upload') !!}
        </div>
    </form>
    </div>
</div>
@endsection
