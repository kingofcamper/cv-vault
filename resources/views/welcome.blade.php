<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Letter - Simple Sign Up Form</title>
<!-- 

Letter Template 

https://templatemo.com/tm-510-letter



Template Re-distribution is NOT allowed.

-->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400">  <!-- Google web font "Open Sans" -->
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  
  <link rel="stylesheet" href="css/demo.css" />
  <link rel="stylesheet" href="css/templatemo-style.css">
  <style>   
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
</style>    
  
  <script type="text/javascript" src="js/modernizr.custom.86080.js"></script>
        
    </head>

    <body>

            <div id="particles-js"></div>
        
            <ul class="cb-slideshow">
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
            </ul>

            <div class="container-fluid">
                <div class="row cb-slideshow-text-container ">
                    <div class= "tm-content col-xl-6 col-sm-8 col-xs-8 ml-auto section ">
                    <P class="mb-5">Add a Cv library containing experience, formation, competence and project for recruiters to facilitate their job</P>
                    </div>
                    <header class="mb-5"><h3>
                        <div class="tm-content flex-center position-ref full-height " style="" >
                        @if (Route::has('login'))
                                <div class="top-right">
                                    @auth
                                        <a href="{{ url('/cvs') }}">Mes CV</a>
                                    @else
                                        <a href="{{ route('login') }}">Login</a> &nbsp;&nbsp;

                                    @if (Route::has('register'))
                                               &nbsp; <a href="{{ route('register') }}">Register</a>
                                    @endif
                                    @endauth
                                </div>
                            @endif
                        </div>
                    </h3></header>
                
                    
                    
                            
                    
                    
                    </div>
                </div>  
                <div class="footer-link">
                    <p>Copyright © 2020 Recruitement App 
                    
                    - Design: Belghith Bilel</p>
                </div>
            </div>  
    </body>

    <script type="text/javascript" src="js/particles.js"></script>
    <script type="text/javascript" src="js/aapp.js"></script>
</html>