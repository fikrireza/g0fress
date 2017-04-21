<!DOCTYPE html>
<html>
<head>

	@yield('head-title')

	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php /* CSRF Token */ ?>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('plugin/bootstrap-3.3.7/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugin/font-awesome/css/font-awesome.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/navbar.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/footer.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/font/1-font-family.css') }}">

    @yield('head-style')
</head>
<body>

	<div class="nav">
		<div class="containt">
			<div class="icon-nav">
				<div class="icon-nav-wrapper">
					<a href="{{ route('frontend.home') }}">
						<img src=" {{ asset('public/image/default/logo-gofress.png') }}">
					</a>
				</div>
				<div class="bar slide-navbar-for-mobile open">
					<i class="fa fa-bars" aria-hidden="true"></i>
				</div>
			</div>
			<div class="nav-link-list">
				<ul class="nav-link-list-ul">
					<li class="nav-link-list-li">
						<a href="">
							@lang('front/home.about')
						</a>
					</li>
					<li class="nav-link-list-li dropdown-hover">
						<a href="{{ route('frontend.produk') }}">
							@lang('front/home.product')
						</a>
						<div class="dropdown-hover-content">

							@foreach($navCallKategory as $list)
							<div class="list slide-hover">
								<a href="{{ route('frontend.produk') }}#{{ $list->slug }}">
									{{ $list->nama_kategori }}
								</a>
								<label class="icon">
									<i class="fa fa-chevron-right" aria-hidden="true"></i>
									<i class="fa fa-chevron-right" aria-hidden="true"></i>
								</label>
								<div class="slide-hover-content">
									@foreach($navCallProduk as $listSub)
									@if($list->id == $listSub->kategori_id)
									<div class="list">
										<a href="{{ route('frontend.produk.view', ['slug'=>$listSub->slug]) }}">
											{{ $listSub->nama_produk }}
										</a>
									</div>
									@endif
									@endforeach
								</div>
							</div>
							@endforeach
						</div>
					</li>
					<li class="nav-link-list-li">
						<a href="">
							@lang('front/home.news')
						</a>
					</li>
					<li class="nav-link-list-li">
						<a href="">
							@lang('front/home.program')
						</a>
					</li>
					<li class="nav-link-list-li">
						<a href="">
							@lang('front/home.contact')
						</a>
					</li>
				</ul>
			</div>
			<div class="connect-social">
				<div class="social-wrapper">
					<a href="{!! url('bahasa/id') !!}"><img src="{{ asset('public/image/default/lang-id-icon.png') }}"></a>
					<a href="{!! url('bahasa/en') !!}"><img src="{{ asset('public/image/default/lang-en-icon.png') }}"></a>
				</div>
			</div>
		</div>
	</div>

	@yield('body-content')

	<div class="footer background-content background-content-second">
		<div class="content-wrapper wrapper-footer-link">
			<div class="float-left">
				<ul>
					<li>
						<a href="{{ route('frontend.home') }}">
							@lang('front/home.home')
						</a>
					</li>
					<li>
						<a href="">
							@lang('front/home.about')
						</a>
					</li>
					<li>
						<a href="">
							@lang('front/home.contact')
						</a>
					</li>
				</ul>
			</div>

			<div class="float-right">
				<img src="{{ asset('public/image/default/facebook-white.png') }}">
				<img src="{{ asset('public/image/default/twitter-white.png') }}">
				<img src="{{ asset('public/image/default/instagram-white.png') }}">
			</div>

			<div class="clearfix"></div>

			<p class="copy-right">@lang('front/home.copy-right')</p>
		</div>
	</div>

	<script type="text/javascript" src="{{ asset('plugin/jquery/jquery-3.2.0.min.js') }}"></script>

	<script src="{{ asset('frontend/js/navbar.js') }}"></script>

	@yield('footer-script')

</body>
</html>
