
<?php 
    
 ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Welcome</title>
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="materialize/css/materialize.css" rel="stylesheet" type="text/css">
        <link href="materialize/css/login.css" rel="stylesheet" type="text/css">
        <link rel="icon" type="image/png" href="favicon.ico">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

    <body>
        <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script type="text/javascript" src="materialize/js/materialize.js"></script>
        <div class="container">
            <div class="row">
                <div class="center-align">
                    <img style="margin-top: 5%;" src="logo-fix.png" width="300" height="300">
                </div>
                <div class="row">
                    
                   

                    <form class="col s4 offset-s4" role="form" method="POST" action="{{ url('/login') }}">
                    <div style="color: red"><?php 
                        if (Session::has('wrong')) {
                            echo "Username atau Password anda salah!";
                            Session::forget('wrong');
                             }
                     ?></div>
                    {!! csrf_field() !!}
                        <div class="row">
                            <div class="input-field">
                                <input id="username" name ="username" type="text" class="validate">
                                <label for="username">Username</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field">
                                <input id="password" type="password" name="password" class="validate">
                                <label for="password">Password</label>
                            </div>
                        </div>
                        <div class="right-align">
                            <button class="btn waves-effect waves-light" type="submit" name="action">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
