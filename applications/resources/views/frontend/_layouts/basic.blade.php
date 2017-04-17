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
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend\css\footer.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend\font\1-font-family.css') }}">
    
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

	@yield('body-content')

	<script type="text/javascript" src="{{ asset('plugin\jquery\jquery-3.2.0.min.js') }}"></script>
	
	<script src="{{ asset('frontend\js\navbar.js') }}"></script>

	@yield('footer-script')

</body>
</html>