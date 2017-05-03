@extends('frontend._layouts.basic')

@section('head-title')
<title>Go Fress - Program Events</title>
@endsection

@section('head-style')
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/public-sub-page.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/events-public.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/events-list-item-normal.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/events-list-item-vidio.css') }}">

<link rel="stylesheet" href="{{ asset('plugin/owl-carousel/owl.carousel.css') }}">
<link rel="stylesheet" href="{{ asset('plugin/owl-carousel/owl.theme.css') }}">
@endsection

@section('body-content')

<div class="wrapper-banner">
	<div class="banner" style="background-image: url(' {{ asset('picture/firstCampaign/background-rainbow.png') }}');">
		
	</div>
</div>

<div class="background-content background-content-second">
	<div class="content-wrapper">

		<div class="title-background">
			<div class="flag-title-wrapper white">
				<div class="vertical-align-midle">
					<label class="circle-shape left"></label>
					<label class="circle-shape left"></label>
				</div>
				<div class="vertical-align-midle">
					<label class="flag-title">Program & Events</label>
				</div>
				<div class="vertical-align-midle">
					<label class="circle-shape right"></label>
					<label class="circle-shape right"></label>
				</div>
			</div>
		</div>

		<div class="slider-second">
			@foreach($callProgramEvent as $list)
			<div class="item">
				<div class="wrapper-item">
					<div class="wrapper-thumnail">
						<img class="thumnail" src="{{ asset($list->img_url) }}" alt="{{ $list->img_alt }}">
						<div class="wrapper-title">
							<a href="{{ route('frontend.program-event.view', ['slug'=>$list->slug]) }}">
								<label class="title">{{ $list->judul }}</label>
							</a>
						</div>
					</div>
					<label class="description">{!! Str::words($list->deskripsi, 20," <a href=".route('frontend.program-event.view', ['slug'=>$list->slug]) .">Read More</a>")  !!}</label>
				</div>
			</div>
			@endforeach
		</div>

		<div class="for-btn-see-more">
			<a class="btn-see-more" href="{{ route('frontend.program-event.events') }}">@lang('front/home.See-More')</a>
		</div>

		<div class="clearfix"></div>
	</div>
</div>

<div class="background-content background-content-first for-spase-wrapper">
	<div class="content-wrapper">
	</div>
</div>

<div class="background-content background-content-second">
	<div class="content-wrapper">
		<div class="title-background">
			<div class="flag-title-wrapper white">
				<div class="vertical-align-midle">
					<label class="circle-shape left"></label>
					<label class="circle-shape left"></label>
				</div>
				<div class="vertical-align-midle">
					<label class="flag-title">Vidio</label>
				</div>
				<div class="vertical-align-midle">
					<label class="circle-shape right"></label>
					<label class="circle-shape right"></label>
				</div>
			</div>
		</div>

		<div class="wrapper-vidio">
			@for($x=0; $x<=3; $x++)
			<div class="vidio-content">
				<div class="thumnail-vidio" style="background-image: url('{{ asset('public/image/default/gofss.png') }}');">
					<div class="wrapper-icon">
						<img src="{{ asset('public/image/default/icon-youtube.png') }}">
					</div>
				</div>
				<div class="description">
					<h2>Title {{ $x }}</h2>
					<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
				</div>
			</div>
			@endfor
		</div>

		<div class="clearfix"></div>

		<div class="for-btn-see-more">
			<a class="btn-see-more" href="">@lang('front/home.See-More')</a>
		</div>
		
	</div>
</div>

<div class="background-content background-content-first for-share-wrapper">
	<div class="content-wrapper">
		<div class="wrapper-share">
			<div class="flag-title-wrapper color costume-light-blue">
				<div class="vertical-align-midle">
					<label class="circle-shape left"></label>
					<label class="circle-shape left"></label>
				</div>
				<div class="vertical-align-midle">
					<label class="flag-title">Share With Your Friend!</label>
				</div>
				<div class="vertical-align-midle">
					<label class="circle-shape right"></label>
					<label class="circle-shape right"></label>
				</div>
			</div>
		</div>
		<div class="wrapper-share">
			<img src="{{ asset('public/image/default/socmed-logo-fb.png') }}">
			<img src="{{ asset('public/image/default/socmed-logo-twit.png') }}">
			<img src="{{ asset('public/image/default/socmed-logo-insta.png') }}">
		</div>
	</div>
</div>

@endsection

@section('footer-script')
<script src="{{ asset('plugin/bootstrap-3.3.7/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('plugin/owl-carousel/owl.carousel.js') }}"></script>
<script src="{{ asset('plugin/owl-carousel/owl.carousel.js') }}"></script>
<script src="{{ asset('frontend/js/events-index.js') }}"></script>

@endsection

