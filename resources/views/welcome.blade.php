<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Cv Managment</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body{
                background: linear-gradient(rgba(0,0,0,0.6),rgba(0,0,0,0.6)), url("/assets/background.jpg");
                background-size: cover;
                background-attachment: fixed;
                background-position: center center;
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
                position: relative;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .wrapper{
                width: 1170px;
                margin :auto;
            }

            .nav-area{
                float:right;
                list-style: none;
                margin-top: 30px;
            }

            .nav-area li{
                display:inline-block;
            }

            .nav-area li a{
                color: #fff;
                text-decoration: none;  
                padding: 5px 20px;
                font-family: poppins;
                font-size: 14px;
            }

            .nav-area li a:hover{
                color: #333;
                background: #fff;
            }

            .logo img{
                width: 100px;
                float: left;
                height: 50px;
                padding: 22px 0 0 0;
            }

            .welcome-text{
                position: absolute;
                width: 600px;
                height: 300px;
                margin: 20% 30%;
                text-align: center;
            }

            .welcome-text h1{
                text-align: center;
                color: #fff;
                text-transform: uppercase;
                font-size: 60px;
            }

            .welcome-text a{
                border: 1px solid #fff;
                padding: 10px 15px;
                text-decoration: none;
                text-transform: uppercase;
                font-size: 14px;
                margin-top: 20px;
                display:inline-block;
                color: #fff;
            }

            .welcome-text a:hover{
                background: #fff;
                color: #333;
            }
        </style>
    </head>
        
    <body>
        <div class="container">
        <div class="wrapper">
            <div class="logo"><img src="/assets/logo.svg" alt=""></div>
            <ul class="nav-area">
                 @if (Route::has('login'))
                
                    @auth
                        <li><a href="{{ url('/cvs') }}">Mes CV</a></li>
                    @else
                        <li><a href="{{ route('login') }}">Login</a></li>

                        @if (Route::has('register'))
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @endif
                    @endauth
                
            @endif
            </ul>
        </div>
        <div class="welcome-text">
            <h1>We are creative</h1>
            <a href="#">Contact Us</a>
        </div>
</div>
           
    </body>
</html>
