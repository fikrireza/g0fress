<!DOCTYPE html>
<html>
<head>
	
	@yield('head-title')

	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php /* CSRF Token */ ?>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('plugin\bootstrap-3.3.7\css\bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugin\font-awesome\css\font-awesome.min.css') }}">
    
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend\css\navbar.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend\css\home.css') }}">

	<link rel="stylesheet" href="{{ asset('plugin/owl-carousel/owl.carousel.css') }}">
	<link rel="stylesheet" href="{{ asset('plugin/owl-carousel/owl.theme.css') }}">
    @yield('head-style')
</head>
<body>

	<div class="nav">
		<div class="containt">
			<div class="icon-nav">
				<div class="icon-nav-wrapper">
					<img src=" {{ asset('public\image\default\logo-gofress.png') }}">
				</div>
			</div>
			<div class="nav-link-list">
				<ul class="nav-link-list-ul">
					<li class="nav-link-list-li">
						<a href="">
							About
						</a>
					</li>
					<li class="nav-link-list-li dropdown-hover">
						<a href="">
							Product
						</a>

						<div class="dropdown-hover-content">
							<div class="list slide-hover">
								<a href="">
									Fresh Strips
								</a>
								<div class="slide-hover-content">
									<div class="list">
										<a href="">
											Peppermint
										</a>
									</div>
									<div class="list">
										<a href="">
											Orange
										</a>
									</div>
									<div class="list">
										<a href="">
											Strawberry
										</a>
									</div>
									<div class="list">
										<a href="">
											Grape
										</a>
									</div>
									<div class="list">
										<a href="">
											Barley
										</a>
									</div>
									<div class="list">
										<a href="">
											Spearmint
										</a>
									</div>
									
								</div>
							</div>
							<div class="list slide-hover">
								<a href="">
									Fresh Strips
								</a>
								<div class="slide-hover-content">
									<div class="list">
										<a href="">
											Peppermint
										</a>
									</div>
									<div class="list">
										<a href="">
											Orange
										</a>
									</div>
									<div class="list">
										<a href="">
											Strawberry
										</a>
									</div>
									<div class="list">
										<a href="">
											Grape
										</a>
									</div>
									<div class="list">
										<a href="">
											Barley
										</a>
									</div>
									<div class="list">
										<a href="">
											Spearmint
										</a>
									</div>
									
								</div>
							</div>
							
						</div>
					</li>
					<li class="nav-link-list-li">
						<a href="">
							Berita & Info
						</a>
					</li>
					<li class="nav-link-list-li">
						<a href="">
							Program & Events
						</a>
					</li>
					<li class="nav-link-list-li">
						<a href="">
							Contact	
						</a>
					</li>
				</ul>
			</div>
			<div class="connect-social">
				<div class="social-wrapper">
					<p class="social-wrapper-label">connect with us</p>
					<img id="nav-social-icon-facebook" src="{{ asset('public\image\default\facebook-gray.png') }}">
					<img id="nav-social-icon-twitter" src="{{ asset('public\image\default\twitter-gray.png') }}">
					<img id="nav-social-icon-instagram" src="{{ asset('public\image\default\instagram-gray.png') }}">
				</div>
			</div>
		</div>	
	</div>

	<div class="slider">
		<div class="item">
			<div class="img" style="background-image: url('{{ asset('picture/firstCampaign/background-rainbow.png') }}');">
			</div>
		</div>
		<div class="item">
			<div class="img" style="background-image: url('{{ asset('picture/firstCampaign/background-rainbow.png') }}');">
			</div>
		</div>
		<div class="item">
			<div class="img" style="background-image: url('{{ asset('picture/firstCampaign/background-rainbow.png') }}');">
			</div>
		</div>
	</div>

	<div class="scroldown-wrapper">
		<div class="position">
			<div class="wrapper-content">

				<label class="circle-shape left"></label>
			
				<label class="wrapper-shape" onclick="scrollWin()">
					scroll down for more
				</label>
			
				<label class="circle-shape right"></label>
			</div>
		</div>
	</div>

	<div class="background-content background-content-first">
		<div class="content-wrapper">
			<div class="text-center">
				<img src=" {{ asset('public\image\default\gofss.png') }}" style="width: 75%;">
			</div>
		</div>
	</div>

<style type="text/css">
.background-content{
	width: 100%; 
	margin:0;
}
.background-content .content-wrapper{
	width: 60%; 
	margin:0 auto;
}
.background-content-first{
	background-color: rgb(255,239,211);
}

</style>
	@yield('body-content')

	<script type="text/javascript" src="{{ asset('plugin\jquery\jquery-3.2.0.min.js') }}"></script>
	<script src="{{ asset('plugin/owl-carousel/owl.carousel.js') }}"></script>
	<script src="{{ asset('plugin/owl-carousel/owl.carousel.js') }}"></script>

	@yield('footer-script')
	<script src="{{ asset('frontend\js\navbar.js') }}"></script>
	<script src="{{ asset('frontend\js\home.js') }}"></script>

</body>
</html>