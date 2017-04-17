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
								<label class="icon">
									<i class="fa fa-chevron-right" aria-hidden="true"></i>
									<i class="fa fa-chevron-right" aria-hidden="true"></i>
								</label>
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
								<label class="icon">
									<i class="fa fa-chevron-right" aria-hidden="true"></i>
									<i class="fa fa-chevron-right" aria-hidden="true"></i>
								</label>
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
					<img src="{{ asset('public\image\default\lang-id-icon.png') }}">
					<img src="{{ asset('public\image\default\lang-en-icon.png') }}">
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
				<img class="pic-gofress" src="{{ asset('public\image\default\gofss.png') }}">
			</div>

			<div class="flag-title-wrapper color">
				<div class="vertical-align-midle">
					<label class="circle-shape left"></label>
					<label class="circle-shape left"></label>
				</div>
				<div class="vertical-align-midle">
					<label class="flag-title">About Go Fress</label>
				</div>
				<div class="vertical-align-midle">
					<label class="circle-shape right"></label>
					<label class="circle-shape right"></label>
				</div>
			</div>

			<div class="content-description">
				<label>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus in scelerisque massa, aliquam molestie lorem. Sed rhoncus, erat ac ornare cursus, tellus odio egestas urna, eu accumsan sapien sapien molestie nulla. Etiam dignissim malesuada vulputate. Nulla at nunc sapien. Proin mollis ligula sapien, in euismod nisl cursus ut. In at quam orci. Cras pharetra eros sed rhoncus feugiat. Nam ligula ante, consectetur eget sagittis at, eleifend vel tortor. Etiam varius faucibus arcu, ut posuere massa fermentum quis. Etiam eu ipsum convallis, aliquet elit ut, pellentesque purus. Curabitur in felis pulvinar, feugiat tellus eu, elementum enim. Curabitur accumsan eu mauris vel vulputate.</label>
			</div>

			<div class="flag-title-wrapper color">
				<div class="vertical-align-midle">
					<label class="circle-shape left"></label>
					<label class="circle-shape left"></label>
				</div>
				<div class="vertical-align-midle">
					<label class="flag-title">Go Fress Product</label>
				</div>
				<div class="vertical-align-midle">
					<label class="circle-shape right"></label>
					<label class="circle-shape right"></label>
				</div>
			</div>

			<div class="slider-product">
				@for($u=0; $u<=5; $u++)
				<div class="item">
					<div class="wrapper-product">
						<div class="front slider-product-front-animate">
							<div class="vertical-align-middle">
								<img class="this-run-animate" src="{{ asset('public\image\default\pic-1.png') }}">
							</div>
						</div>
						<div class="back slider-product-back-animate">
							<div class="vertical-align-middle">
								@for($i=0; $i<=5; $i++)
								<div class="col col-md-4">
									<img src="{{ asset('public\image\default\pic-1.png') }}">
								</div>
								@endfor
							</div>
						</div>
					</div>
				</div>
				@endfor
			</div>

			<div class="for-btn-see-more">
				<a class="btn-see-more" href="">See More</a>
			</div>
		</div>
	</div>

	<div class="background-content background-content-second">
		<div class="title-background">
			<div class="flag-title-wrapper white">
				<div class="vertical-align-midle">
					<label class="circle-shape left"></label>
					<label class="circle-shape left"></label>
				</div>
				<div class="vertical-align-midle">
					<label class="flag-title">Promotion</label>
				</div>
				<div class="vertical-align-midle">
					<label class="circle-shape right"></label>
					<label class="circle-shape right"></label>
				</div>
			</div>
		</div>

		<div class="content-wrapper">
			<div class="slider-second">
				@for($i=0; $i<=15; $i++)
				<div class="item">
					<div class="wrapper-item">
						<div class="wrapper-thumnail">
							<img class="thumnail" src="{{ asset('public\image\default\promosion.png') }}">
							<div class="wrapper-title">
								<label class="title">SOME TEXT IN HERE BLA BLA BLA</label>
							</div>
						</div>
						<label class="description">Lorem ipsum dolor sit amet  varius faucibus arcu, ut posuere massa fermentum quis. Etiam eu ipsum</label>
					</div>
				</div>
				@endfor
			</div>

			<div class="for-btn-see-more">
				<a class="btn-see-more" href="">See More</a>
			</div>

		</div>
	</div>

	<div class="background-content background-content-first">
		<div class="title-background">
			<div class="flag-title-wrapper white">
				<div class="vertical-align-midle">
					<label class="circle-shape left"></label>
					<label class="circle-shape left"></label>
				</div>
				<div class="vertical-align-midle">
					<label class="flag-title">Lates News</label>
				</div>
				<div class="vertical-align-midle">
					<label class="circle-shape right"></label>
					<label class="circle-shape right"></label>
				</div>
			</div>
		</div>

		<div class="content-wrapper">
			<div class="lates-news-wrapper">
				@for($i=0; $i<=2; $i++)
				<div class="col-md-4">
					<div class="wrapper-news">
						<h3>Title</h3>
						<label>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus in scelerisque massa, aliquam molestie lorem. Sed rhoncus, erat ac ornare cursus, tellus odio egestas urna, eu accumsan sapien sapien ipsum convallis, aliquet elit ut, pellentesque purus.... <a href="">Read More</a></label>
					</div>		
				</div>
				@endfor
				<div class="clearfix"></div>
			</div>

			<div class="for-btn-see-more">
				<a class="btn-see-more" href="">See More</a>
			</div>

		</div>
	</div>

	<div class="background-content background-content-second">

		<div class="title-background">
			<div class="flag-title-wrapper white">
				<div class="vertical-align-midle">
					<label class="circle-shape left"></label>
					<label class="circle-shape left"></label>
				</div>
				<div class="vertical-align-midle">
					<label class="flag-title">Stay Connected</label>
				</div>
				<div class="vertical-align-midle">
					<label class="circle-shape right"></label>
					<label class="circle-shape right"></label>
				</div>
			</div>
		</div>

		<div class="content-wrapper">

			<div class="for-btn-see-more">
				<a class="btn-see-more" href="">Connect With Us</a>
			</div>

			<div style="text-align: center;">
				<img src="{{ asset('public\image\default\facebook-white.png') }}">
				<img src="{{ asset('public\image\default\twitter-white.png') }}">
				<img src="{{ asset('public\image\default\instagram-white.png') }}">
			</div>

		</div>
	</div>

	<div class="background-content background-content-first">

		<div class="content-wrapper" style="padding-top: 60px;">
			<div class="flag-title-wrapper color">
				<div class="vertical-align-midle">
					<label class="circle-shape left"></label>
					<label class="circle-shape left"></label>
				</div>
				<div class="vertical-align-midle">
					<label class="flag-title">Where to Find Us</label>
				</div>
				<div class="vertical-align-midle">
					<label class="circle-shape right"></label>
					<label class="circle-shape right"></label>
				</div>
			</div>

			<img src="{{ asset('public\image\default\toko.png') }}" style="width: 100%; margin-top: 60px;">

			<div class="for-btn-see-more">
				<a class="btn-see-more" href="">More Location</a>
			</div>
		</div>
	</div>

	<div class="footer background-content background-content-second">
		<div class="content-wrapper wrapper-footer-link">
			<div class="float-left">
				<ul>
					<li>
						<a href="">
							Home
						</a>
					</li>
					<li>
						<a href="">
							About
						</a>
					</li>
					<li>
						<a href="">
							Contact
						</a>
					</li>
				</ul>
			</div>

			<div class="float-right">
				<img src="{{ asset('public\image\default\facebook-white.png') }}">
				<img src="{{ asset('public\image\default\twitter-white.png') }}">
				<img src="{{ asset('public\image\default\instagram-white.png') }}">
			</div>

			<div class="clearfix"></div>

			<p class="copy-right">© 2017 Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore<br>magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.</p>
		</div>
	</div>

	@yield('body-content')

	<script type="text/javascript" src="{{ asset('plugin\jquery\jquery-3.2.0.min.js') }}"></script>
	<script src="{{ asset('plugin/owl-carousel/owl.carousel.js') }}"></script>
	<script src="{{ asset('plugin/owl-carousel/owl.carousel.js') }}"></script>

	@yield('footer-script')
	<script src="{{ asset('frontend\js\navbar.js') }}"></script>
	<script src="{{ asset('frontend\js\home.js') }}"></script>

</body>
</html>