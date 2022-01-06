<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('frontendtittle') - {{ config('app.name', 'Laravel') }}</title>

    <!-- css -->
	<link href="{{asset('frontend/css/bootstrap.min.css')}}" rel="stylesheet" />
	<link href="{{asset('frontend/css/fancybox/jquery.fancybox.css')}}" rel="stylesheet">
	<link href="{{asset('frontend/css/jcarousel.css')}}" rel="stylesheet" />
	<link href="{{asset('frontend/css/flexslider.css')}}" rel="stylesheet" />
	<link href="{{asset('frontend/css/style.css')}}" rel="stylesheet" />

	<!-- Theme skin -->
	<link href="{{asset('frontend/skins/default.css')}}" rel="stylesheet" />
	<link rel="shortcut icon" href="{{asset('storage/logo/index.jpg')}}" type="image/x-icon">

</head>

<body>
    <div id="wrapper">
        <x-frontend.header/>

        @yield('content')
        <x-frontend.footer/>
    </div>
	<a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>    

  <!-- javascript
    ================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="{{asset('frontend/js/jquery.js')}}"></script>
	<script src="{{asset('frontend/js/jquery.easing.1.3.js')}}"></script>
	<script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('frontend/js/jquery.fancybox.pack.js')}}"></script>
	<script src="{{asset('frontend/js/jquery.fancybox-media.js')}}"></script>
	<script src="{{asset('frontend/js/google-code-prettify/prettify.js')}}"></script>
	<script src="{{asset('frontend/js/portfolio/jquery.quicksand.js')}}"></script>
	<script src="{{asset('frontend/js/portfolio/setting.js')}}"></script>
	<script src="{{asset('frontend/js/jquery.flexslider.js')}}"></script>
	<script src="{{asset('frontend/js/animate.js')}}"></script>
	<script src="{{asset('frontend/js/custom.js')}}"></script>

</body>

</html>
      
    </body>
  </html>
  