<!DOCTYPE html>
<html>
<head>

	@yield('head-title')

	<meta charset="utf-8">
	<meta http-equiv="Content-Language" content="{{ App::getLocale() }}" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	@yield('meta')

	<meta name="google-site-verification" content="" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="robots" content="index, follow" />
	<meta name="googlebot" content="all" />


    <link rel="stylesheet" type="text/css" href="{{ asset('plugin/bootstrap-3.3.7/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugin/font-awesome/css/font-awesome.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/public.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/font/1-font-family.css') }}">

    @yield('head-style')

	<link rel="icon" type="image/png" href="{{ asset('public/image/default/logo-gofress.png') }}" />
	<link rel="image_src" href="" />

    <script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	  ga('create', 'USER_ID', 'gofress.co.id');
	  ga('require', 'linkid', 'linkid.js');
	  ga('send', 'pageview');
    </script>
</head>
<body>

	@include('frontend._include.navbar')

	@yield('body-content')

	@include('frontend._include.footer')

	<script type="text/javascript" src="{{ asset('plugin/jquery/jquery-3.2.0.min.js') }}"></script>

	<script src="{{ asset('frontend/js/navbar.js') }}"></script>

	@yield('footer-script')

</body>
</html>
