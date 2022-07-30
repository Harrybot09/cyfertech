<!doctype html>
<html lang="en">
    <head>
    
        <meta charset="utf-8">
        <title>Login | Admin CyferTech</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description">
        <meta content="Themesbrand" name="author">
       
        <link rel="shortcut icon" href="{{ url('public/assets/images/favicon.ico')}}">
    
        <link href="{{ url('public/assets/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css">

        <link href="{{ url('public/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css">
   
        <link href="{{ url('public/assets/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css">
        
        <style>
        .inpstyle{
    width: 100%;
    border-radius: 5px;
    padding:5px;
 
        }
        .btnstyle{
    border-radius: 5px;
    padding:10px;
    margin-left: 34%;
        }
        
       .card { background-color: #a6ddc8 !important;}
        </style>
    
    </head>

    <body>

            <div id="preloader"><div id="status"><div class="spinner"></div></div></div>
 
         <!--<div class="accountbg" style="background: url('public/assets/images/bg.jpg');background-size: cover;background-position: center;"></div>-->
  <div class="accountbg"></div>
        <div class="account-pages mt-5 pt-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-5 col-xl-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="text-center mt-4">
                                    <div class="mb-3">
                                        <img src="{{ url('public/assets/images/download.png')}}" alt="Logo" style="width:50% ;">
                                    </div>
                                </div>
                                <div class="p-3">
                                    <h4 class="font-size-18 mt-2 text-center">Welcome Back !</h4>
                                    <p class="text-muted text-center mb-4">Sign in to continue to CyferTech.</p>
    
                                            <form method="POST" action="{{ route('login') }}">
                                                @csrf
                                    
                                                <div>
                                                    <x-jet-label for="email" value="{{ __('Email') }}" /><br>
                                                    <x-jet-input id="email" class="block mt-1 inpstyle" type="email" name="email" :value="old('email')" placeholder="Enter Email" required autofocus />
                                                </div>
                                    
                                                <div class="mt-4">
                                                    <x-jet-label for="password" value="{{ __('Password') }}" /><br>
                                                    <x-jet-input id="password" class="block mt-1 inpstyle" type="password" name="password" placeholder="Enter Password" required autocomplete="current-password" />
                                                </div>
                                    
                                                <div class="block mt-4">
                                                    <label for="remember_me" class="flex items-center">
                                                        <x-jet-checkbox id="remember_me" name="remember" />
                                                        <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                                                    </label>
                                                </div>
                                    
                                                <div class="flex items-center justify-end mt-4">

                                                    <!--@if (Route::has('password.request'))-->
                                                    <!--    <a class="underline text-sm text-gray-600 hover:text-gray-900 underline" href="{{ route('password.request') }}" >-->
                                                    <!--        {{ __('Forgot your password?') }}-->
                                                    <!--    </a>-->
                                                    <!--@endif-->
                                                           <!--@if (Route::has('login'))-->
                                                      
                                                           <!-- @auth-->
                                                           <!--     <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>-->
                                                           <!-- @else-->
                                                           <!--     @if (Route::has('register'))-->
                                                           <!--         <a href="{{ route('register') }}" class="underline">Register</a>-->
                                                           <!--     @endif-->
                                                           <!-- @endauth-->
                                                        
                                                    @endif
                                                    <x-jet-button class="ml-4 btn-primary btnstyle">
                                                        {{ __('Log in') }}
                                                    </x-jet-button>
                                                    
                                                </div>
                                                  
                                            </form>
    
                                </div>
               
    
                            </div>
                        </div>
    
                    </div>
                </div>
            </div>
        </div>

                   
        <script src="{{ url('public/assets/libs/jquery/jquery.min.js')}}"></script>
        <script src="{{ url('public/assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{ url('public/assets/libs/metismenu/metisMenu.min.js')}}"></script>
        <script src="{{ url('public/assets/libs/simplebar/simplebar.min.js')}}"></script>
        <script src="{{ url('public/assets/libs/node-waves/waves.min.js')}}"></script>
        <script src="{{ url('public/assets/js/app.js')}}"></script>

    </body>
</html>