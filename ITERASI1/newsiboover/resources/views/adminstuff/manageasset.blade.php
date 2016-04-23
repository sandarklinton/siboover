@extends('layouts.newapp')

@section('title', 'Manage Asset')

@section('content')
<nav>
    <div class="nav-wrapper" style="padding-left:10px;">
        <div class="col s12">
            <a href="<?=URL::route('manageasset');?>" class="breadcrumb">MANAGE ASSET</a>
        </div>
    </div>
</nav>
<div class="row" style="padding-top: 30px;">
    <div class="col s6">
        <div class="center-align">
            <a class="waves-effect waves-light btn">Manage Driver</a>
        </div>
    </div>
    <div class="col s6">
        <div class="center-align">
            <a class="waves-effect waves-light btn" href="<?=URL::route('managevehicle');?>">Manage Vehicle</a>
        </div>
    </div>
</div>
@endsection