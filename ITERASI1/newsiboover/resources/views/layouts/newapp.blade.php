<!DOCTYPE html>
<html>
    <head>
        <title>@yield('title')</title>
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
        <link href="{{URL::asset('materialize/css/materialize.css')}}" rel="stylesheet" type="text/css">
        <link href="{{URL::asset('materialize/css/adminblade.css')}}" rel="stylesheet" type="text/css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link rel="icon" type="image/png" href="favicon.ico">
        <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script type="text/javascript" src="{{URL::asset('materialize/js/materialize.js')}}"></script>
    </head>

    <body>
        <header> 
            <ul id="dropdown1" class="dropdown-content">
                <li><a href="{{url('/logout')}}">Logout</a></li>
            </ul>
            <div class="top-nav">
                <nav>
                    <div class="nav-wrapper">
                        <ul class="right hide-on-med-and-down">
                            <li><a class="dropdown-button" href="#!" data-activates="dropdown1"><?php echo Session::get('username'); ?><i class="material-icons right">arrow_drop_down</i></a></li>
                        </ul>
                    </div>
                </nav>
            </div>
            
            <nav style="height: 1px; background-color:black;">
                <ul id="staggered-list" class="side-nav fixed">
                    @if (Session::get('role') == 'customer')
                    <li class="center-align" style="height: 70px;"><img src="{{asset('logo-header.png')}}"></li>
                    <li><a href="<?=URL::route('customer');?>">HOME</a></li>
                    <li><a href="{{url('booking')}}">BOOKING</a></li>
                    <li><a href="<?=URL::route('profile');?>">PROFILE</a></li>
                    <li><a href="{{url('history')}}">HISTORY</a></li>
                    @elseif(Session::get('role') == 'admin')
                    <li class="center-align" style="height: 70px;"><img src="logo-header.png"></li>
                    <li><a href="<?=URL::route('admin');?>">HOME</a></li>
                    <li><a href="<?=URL::route('booking');?>">BOOKING</a></li>
                    <li><a href="<?=URL::route('profile');?>">PROFILE</a></li>
                    <li><a href="{{url('history')}}?>">HISTORY</a></li>
                    <li><a href="<?=URL::route('managebooking');?>">MANAGE BOOKING</a></li>
                    <li><a href="<?=URL::route('manageasset');?>">MANAGE ASSET</a></li>
                    <li><a href="<?=URL::route('manageaccount');?>">MANAGE USER ACCOUNT</a></li>
                    @elseif(Session::get('role') == 'finance')
                    <li class="center-align" style="height: 70px;"><img src="logo-header.png"></li>
                    <li><a href="<?=URL::route('finance');?>">HOME</a></li>
                    <li><a href="<?=URL::route('booking');?>">BOOKING</a></li>
                    <li><a href="<?=URL::route('profile');?>">PROFILE</a></li>
                    <li><a href="{{url('history')}}">HISTORY</a></li>
                    <li><a href="<?=URL::route('managevehicle');?>">MANAGE VEHICLE</a></li>
                    @elseif(Session::get('role') == 'driver')
                    <li class="center-align" style="height: 70px;"><img src="logo-header.png"></li>
                    <li><a href="<?=URL::route('drivers');?>">HOME</a></li>
                    <li><a href='<?=URL::route('trips');?>'>TRIPS</a></li>
                    <li><a href="<?=URL::route('profile');?>">PROFILE</a></li>
                    <li><a href="<?=URL::route('driverutility');?>">DRIVER</a></li>
                    @endif
                </ul>
            </nav>
        </header>

        <div class="content" style="padding-left:240px;">
            @yield('content')
        </div>
        <script>
            $(document).ready(function() {
                $('select').material_select();
            });
            $('.datepicker').pickadate({
                selectYears: 15
            });
            $(".button-collapse").sideNav();
        </script>
    </body>
</html>

