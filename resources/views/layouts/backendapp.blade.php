<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Bootstrap -->
    <link href="{{ asset('backend/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('backend/css/font-awesome.min.css')}}" rel="stylesheet">
    

    @stack('backendcss')

    <!-- Custom Theme Style -->
    <link href="{{ asset('backend/css/custom.min.css')}}" rel="stylesheet">
</head>

<body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <x-backend.header/>

        @yield('content')
        <x-backend.footer/>
        </div>
      </div>
  
      <!-- jQuery -->
      <script src="{{ asset('backend/js/jquery.min.js')}}"></script>
      <!-- Bootstrap -->
      <script src="{{ asset('backend/js/bootstrap.bundle.min.js')}}"></script>
      @stack('backendjs')
      <!-- Dat.js')}} -->
      <script src="{{ asset('backend/js/date.js')}}"></script>
  
      <!-- bootstrap-daterangepicker -->
      <script src="{{ asset('backend/js/moment.min.js')}}"></script>
      <script src="{{ asset('backend/js/daterangepicker.js')}}"></script>
  
      <!-- Custom Theme Scripts -->
      <script src="{{ asset('backend/js/custom.min.js')}}"></script>
      
    </body>
  </html>
  