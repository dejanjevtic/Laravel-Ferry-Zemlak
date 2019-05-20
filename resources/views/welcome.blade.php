<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
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

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
         <script>
         $(document).ready(function() { 
             $('#tokenform').submit(function(e){ 
                e.preventDefault();
              $.ajax({
                type: 'post',
                url: 'api/getToken',
                data: {                    
                    'email': $('#email_address').val(),   
                    'password': $('#password').val()
                },
  
                success: function(data) {
                    obj = JSON.parse(data);
                    localStorage.token = obj.token;
                   console.log(localStorage.token); 
                }
              });
            });
            });
          
           $(document).ready(function() { 
             $('#getData').submit(function(e){ 
                
                e.preventDefault();
              $.ajax({
                type: 'get',                
                 url: 'api/getData',
                headers: {
                    'Authorization': 'Bearer '+localStorage.token,
                    'Access-Control-Allow-Origin': '*'
                },
                
                success: function(data) {
                  console.log(data); //console the elements of data
                   if(data) {
                        
                  }
                }
              });
            });
            });
          </script>
          </script>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Clinic Ferry Zemrak
                </div>

                <div class="links">
                    Log in with email <b>zlindgren@yahoo.com</b> and password <b>Tap!M3d1cal</b> and then pull data into database

            <form class="form-horizontal" id="tokenform" role="form"  >

            {{ csrf_field() }}
            <div class='form-row'>

                <!--div class='col-xs-12 form-group name required'>

                    <label class='control-label'>Name</label>

                    <input id="name" autocomplete='off' class='form-control name' size='20' type='text' name="name">

                </div-->
            </div>

            <div class='form-row'>

                <div class='col-xs-12 form-group city required'>

                    <label class='control-label'>Email Address</label>

                    <input id="email_address" autocomplete='off' class='form-control email_address' size='20' type='text' name="email_address">

                </div>
            </div>

           
            <div class='form-row'>

                <div class='col-xs-12 form-group phone required'>

                    <label class='control-label'>Password</label>

                    <input id="password" autocomplete='off' class='form-control password' size='20' type='password' name="password">

                </div>

            </div>

          
            
            
            <div class='form-row'>

                <div class='col-md-12 form-group'>
                    <button class='form-control btn btn-success submit-button' type='submit'>Log In</button>

                </div>

            </div>

            
            </form>

            <form class="form-horizontal" id="getData" role="form"  >

            
            
            <div class='form-row'>

                <div class='col-md-12 form-group'>
                    <button class='form-control btn btn-success submit-button' type='submit'>Store Data into DB</button>

                </div>

            </div>

            
            </form>
                </div>

            </div>
        </div>
    </body>
</html>
