<!DOCTYPE html>
<html>
<head>
	<title>Hello #Gofress Yourself</title>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

	<link rel="stylesheet" type="text/css" href="{{ asset('plugin/bootstrap-3.3.7/css/bootstrap.min.css') }}" />
	<link rel="stylesheet" href="{{ asset('plugin/font-awesome/css/font-awesome.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('font/1-font-family.css') }}" />
	@yield('style')

</head>
<body style="margin: 0; padding: 0;">
	<div class="background-rainbow">
		<div class="background-left">
			<img src="{{ asset('picture/firstCampaign/background-left.png')}}">
		</div>
		<div class="background-right">
			<img src="{{ asset('picture/firstCampaign/background-right.png')}}">
		</div>
	</div>

	<style type="text/css">
		.background-rainbow{
			width: 100%;
			height: 100vh;
			position: fixed;
			top: 0;
			left: 0;
			z-index: -1;
			background-image: url('{{ asset('picture/firstCampaign/background-rainbow.png') }}');
			background-size: cover;
			background-repeat: no-repeat;
		}
		.background-rainbow .background-left{
			position: fixed;
			bottom: -5px;
			left: 0;
		}
		.background-rainbow .background-left img{
			width: 580px;
		}
		.background-rainbow .background-right{
			position: fixed;
			bottom: -5px;
			right: 0;
		}
		.background-rainbow .background-right img{
			width: 365px;
		}

		@media (max-width: 480px) {
			.background-rainbow{
				position: relative;
				width: 100%;
				height: 50vh;
			}
			.background-rainbow .background-left{
				position: absolute;
			}
			.background-rainbow .background-left img{
				width: 320px;
			}
			.background-rainbow .background-right{
				position: absolute;
			}
			.background-rainbow .background-right img{
				width: 200px;
			}

		}
	</style>

	@yield('content')

	<script src="{{ asset ('plugin/jquery/jquery-3.2.0.min.js') }}"></script>
	<script src="{{ asset('plugin/bootstrap-3.3.7/js/bootstrap.min.js') }}"></script>
	@yield('script')

</body>
</html>
