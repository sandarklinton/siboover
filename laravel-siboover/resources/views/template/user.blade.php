<!DOCTYPE html>
<html>
    <head>
        <title>Home</title>
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="/siboover/laravel-siboover/public/materialize/css/materialize.css" rel="stylesheet" type="text/css">
        <!--<link href="materialize/css/login.css" rel="stylesheet" type="text/css">-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link rel="icon" type="image/png" href="/siboover/laravel-siboover/public/favicon.ico">
        <style>

        </style>
    </head>

    <body>
        <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script type="text/javascript" src="/siboover/laravel-siboover/public/materialize/js/materialize.js">
             $(".button-collapse").sideNav();
        </script>
        <div class="container">
            <div class="row">
                <!-- Dropdown Structure -->
                <ul id="dropdown1" class="dropdown-content">
                    <li><a href="#!">Logout</a></li>
                </ul>
                <nav>
                    <div class="nav-wrapper">
                        <a href="#!" class="brand-logo">Logo</a>
                        <ul class="right hide-on-med-and-down">
                            <!-- Dropdown Trigger -->
                            <li><a class="dropdown-button" href="#!" data-activates="dropdown1">John Doe<i class="material-icons right">arrow_drop_down</i></a></li>
                        </ul>
                    </div>
                </nav>
                <nav>
                    <ul class="right hide-on-med-and-down">
                        <li><a href="#!">First Sidebar Link</a></li>
                        <li><a href="#!">Second Sidebar Link</a></li>
                    </ul>
                    <ul id="slide-out" class="side-nav">
                        <li><a href="#!">First Sidebar Link</a></li>
                        <li><a href="#!">Second Sidebar Link</a></li>
                    </ul>
                    <a href="#" data-activates="slide-out" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
                </nav>
            </div>
        </div>
    </body>
</html>
