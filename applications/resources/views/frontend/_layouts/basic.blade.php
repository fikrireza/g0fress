<!DOCTYPE html>
<html>
<head>

	@yield('head-title')

	<meta charset="utf-8">
	<meta http-equiv="Content-Language" content="{{ App::getLocale() }}" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	@yield('meta')

	<meta name="google-site-verification" content="WoEFPm5mEA4IkWE-EDSpSDrG7zg1ETt3LppVMm5Y5Mg" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="robots" content="index, follow" />
	<meta name="googlebot" content="all" />


    <link rel="stylesheet" type="text/css" href="{{ asset('plugin/bootstrap-3.3.7/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugin/font-awesome/css/font-awesome.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/public.css') }}">
    
    @yield('head-style')

	<link rel="icon" type="image/png" href="{{ asset('public/image/default/icon-gofress.png') }}" />
	<link rel="image_src" href="" />

		<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

		  ga('create', 'UA-99240714-1', 'auto');
		  ga('send', 'pageview');

		</script>
		<script>(function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) return;
		  js = d.createElement(s); js.id = id;
		  js.src = "//connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v2.9&appId=317377078681880";
		  fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));</script>
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
