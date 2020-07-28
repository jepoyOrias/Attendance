<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Attendance</title>
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/logo.png') }}" />
        
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Lato|Nunito|Nunito+Sans&display=swap" rel="stylesheet">
        
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="{{ asset('js/flipclock.js') }}" defer></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script> 
        <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
 
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/flipclock.css') }}">

    </head>
    <style>
        .flip-clock-dot{
            background: #cccccc;
        }
    </style>
    <body>
    <div>
        <div class="container" >
            <img class="img-fluid p-0" src="{{asset('images/cipher.png') }}" alt="">  
        </div> 
         
        <h1 class="text-center text-monospace text-white">Welcome to Cipher Fusion <br>
            <small>Today is : {{Carbon\Carbon::today()->format('M d Y D.')}}</small>
        </h1>
            
        <div class="container clock" style="margin:2em;"></div>
    
         <form action="/home/time_in" method="POST">
            @csrf  
                <div class="container py-4">
                    <input type="password" name="id"
                    class="form-control text-center rounded-pill shadow p-0" placeholder="ID Number" id="input1">
                        <input type="hidden" name="time" value="{{Carbon\Carbon::now()}}"> 
                    
                </div>
            
                <div class="row justify-content-center">
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block btn-lg rounded-pill button"><i class="fas fa-user-clock"></i> <span>Time-in</span> </button>
                        </div>
                        <div class="col-4">
                            <button formaction="/home/time_out" class="btn btn-secondary btn-block btn-lg rounded-pill"><i class="fas fa-user-check"></i> <span>Time-out</span> </button>
                        </div>
                </div>
                    
            </div>
        </form>

        {{-- Scripts --}}
        <script type="text/javascript">
			var clock;
			
			$(document).ready(function() {
				clock = $('.clock').FlipClock({
					clockFace: 'TwelveHourClock'
				});
			});
        </script>
        
        @include('sweetalert::alert')
    </body>
</html>
