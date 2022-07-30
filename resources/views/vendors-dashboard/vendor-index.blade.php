<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <title>Dashboard | Travel Fox</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="csrf-token" content="content">
    <meta content="Themesbrand" name="author">
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- C3 Chart css -->
    <link href="{{ url('assets/libs/c3/c3.min.css')}}" rel="stylesheet" type="text/css">

    <!-- Bootstrap Css -->
    <link href="{{ url('assets/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css">
    <!-- Icons Css -->
    <link href="{{ url('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css">
    <!-- App Css-->
    <link href="{{ url('assets/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css">
   
</head>

<body data-sidebar="dark">

<div id="layout-wrapper">

@include('vendors-dashboard/incs/vendor-header')
@include('vendors-dashboard/incs/vendor-sidebar')
<div class="main-content">
@yield('contents')
@include('vendors-dashboard/incs/vendor-footer')
 </div>
</div>


    <!-- JAVASCRIPT -->
    <script src="{{ url('assets/libs/jquery/jquery.min.js')}}"></script>
    <script src="{{ url('assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ url('assets/libs/metismenu/metisMenu.min.js')}}"></script>
    <script src="{{ url('assets/libs/simplebar/simplebar.min.js')}}"></script>
    <script src="{{ url('assets/libs/node-waves/waves.min.js')}}"></script>


    <!-- Peity chart-->
    <script src="{{ url('assets/libs/peity/jquery.peity.min.js')}}"></script>

    <!--C3 Chart-->
    <script src="{{ url('assets/libs/d3/d3.min.js')}}"></script>
    <script src="{{ url('assets/libs/c3/c3.min.js')}}"></script>

    <script src="{{ url('assets/libs/jquery-knob/jquery.knob.min.js')}}"></script>

    <script src="{{ url('assets/js/pages/dashboard.init.js')}}"></script>

    <script src="{{ url('assets/js/app.js')}}"></script>
   
    <script src="{{ url('assets/js/pages/form-validation.init.js')}}"></script>
    <!--tinymce js-->
    <script src="{{ url('assets/libs/tinymce/tinymce.min.js')}}"></script>

    <!-- init js -->
    <script src="{{ url('assets/js/pages/form-editor.init.js')}}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    

</body>

</html>