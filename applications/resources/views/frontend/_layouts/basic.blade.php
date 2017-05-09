<!DOCTYPE html>
<html>
<head>

	@yield('head-title')

	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php /* CSRF Token */ ?>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @yield('meta')

    <link rel="stylesheet" type="text/css" href="{{ asset('plugin/bootstrap-3.3.7/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugin/font-awesome/css/font-awesome.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/public.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/navbar.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/footer.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/font/1-font-family.css') }}">

    @yield('head-style')
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
