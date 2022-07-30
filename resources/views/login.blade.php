<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <title>Dashboard | Admiria - Admin & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="csrf-token" content="content">
    <meta content="Themesbrand" name="author">
    <!-- App favicon -->
    <link rel="shortcut icon" href="public/assets/images/favicon.ico">

    <!-- C3 Chart css -->
    <link href="{{ url('public/assets/libs/c3/c3.min.css')}}" rel="stylesheet" type="text/css">

    <!-- Bootstrap Css -->
    <link href="{{ url('public/assets/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css">
    <!-- Icons Css -->
    <link href="{{ url('public/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css">
    <!-- App Css-->
    <link href="{{ url('public/assets/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css">

<style>
    .formmargin{
        margin-top: 5rem;;
    }
</style>


</head>

<body data-sidebar="dark">
        <!-- Loader -->
            <div id="preloader"><div id="status"><div class="spinner"></div></div></div>

         <!-- Begin page -->
         <div class="accountbg" style="/*background: url('public/assets/images/travel2.jpg');background-size: cover;background-position: center;*/"></div>

        <div class="account-pages mt-5 pt-5 formmargin">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-5 col-xl-4 formmargin">
                        <div class="card">
                            <div class="card-body">
                                <div class="text-center mt-4">
                                    <div class="mb-3">
                                        <!-- <a href="index.html"><img src="assets/images/logo.png" height="30" alt="logo"></a> -->
                                        <h3>Travel Fox</h3>
                                    </div>
                                </div>
                                <div class="p-3">
                        
                                    <h6 class="text-muted text-center mb-4">Sign in to continue to Admin Panel.</h6>
    
                                    <form class="form-horizontal" action="{{url('home')}}">
    
                                        <div class="mb-3">
                                            <label class="form-label" for="email">email</label>
                                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email Address">
                                        </div>
    
                                        <div class="mb-3">
                                            <label class="form-label" for="password">Password</label>
                                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
                                        </div>
    
                                        <div class="row mt-4">
                                          
                                            <div class="col-md-8 text-end">
                                                <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Log In</button>
                                            </div>
                                        </div>

                                    </form>
    
                                </div>
    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        
    <!-- JAVASCRIPT -->
    <script src="{{ url('public/assets/libs/jquery/jquery.min.js')}}"></script>
    <script src="{{ url('public/assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ url('public/assets/libs/metismenu/metisMenu.min.js')}}"></script>
    <script src="{{ url('public/assets/libs/simplebar/simplebar.min.js')}}"></script>
    <script src="{{ url('public/assets/libs/node-waves/waves.min.js')}}"></script>


    <!-- Peity chart-->
    <script src="{{ url('public/assets/libs/peity/jquery.peity.min.js')}}"></script>

    <!--C3 Chart-->
    <script src="{{ url('public/assets/libs/d3/d3.min.js')}}"></script>
    <script src="{{ url('public/assets/libs/c3/c3.min.js')}}"></script>

    <script src="{{ url('public/assets/libs/jquery-knob/jquery.knob.min.js')}}"></script>

    <script src="{{ url('public/assets/js/pages/dashboard.init.js')}}"></script>

    <script src="{{ url('public/assets/js/app.js')}}"></script>
    <script src="{{ url('public/assets/js/pages/form-validation.init.js')}}"></script>
    <!--tinymce js-->
    <script src="{{ url('public/assets/libs/tinymce/tinymce.min.js')}}"></script>

    <!-- init js -->
    <script src="{{ url('public/assets/js/pages/form-editor.init.js')}}"></script>

    

</body>

</html>