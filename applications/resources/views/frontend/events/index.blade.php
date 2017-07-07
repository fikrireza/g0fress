@extends('frontend._layouts.basic')

@section('head-title')
<title>Gofress - Program Events</title>
@endsection

@section('meta')
<meta name="title" content="Gofress - Program Events">
	@if($callAbout != null)
<meta name="description" content="Gofress - {{ strip_tags(Str::words($callAbout->deskripsi, 40)) }}">
	@endif
<meta name="keywords" content="Gofress, Permen Tipis, Candy"/>
@endsection

@section('head-style')
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/public-sub-page.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/events-list-item-normal.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/events-list-item-vidio.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/for-share-wrapper.css') }}">

	<link rel="stylesheet" href="{{ asset('plugin/owl-carousel/owl.carousel.css') }}">
	<link rel="stylesheet" href="{{ asset('plugin/owl-carousel/owl.theme.css') }}">
@endsection

@section('body-content')

<div class="wrapper-banner">
	<div class="banner" style="background-image: url(' {{ asset($forBanner) }}');">
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
					<label class="flag-title">
						@lang('front/publict.program')
					</label>
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
						<img class="thumnail" src="{{ asset('images/programEvent/'.$list->img_thumb) }}" alt="{{ $list->img_alt_thumb }}">
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
			<a class="btn-see-more" href="{{ route('frontend.program-event.events') }}">
				@lang('front/publict.see-more')
			</a>
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
					<label class="flag-title">
						@lang('front/publict.vidio')
					</label>
				</div>
				<div class="vertical-align-midle">
					<label class="circle-shape right"></label>
					<label class="circle-shape right"></label>
				</div>
			</div>
		</div>

		<div class="wrapper-vidio">
			@foreach($callProgramEventVidio as $list)
			@include('frontend.events.events-vidios-list-looping')
			@endforeach
		</div>

		<div class="clearfix"></div>

		<div class="for-btn-see-more">
			<a class="btn-see-more" href="{{ route('frontend.program-event.events-vidio') }}">
				@lang('front/publict.see-more')
			</a>
		</div>
	</div>
</div>

<div class="background-content background-content-first for-share-wrapper">
	<div class="content-wrapper">
		@include('frontend._include.share-on-social')
	</div>
</div>

@include('frontend.events.vidio-show')
@endsection

@section('footer-script')
<script src="{{ asset('plugin/bootstrap-3.3.7/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('plugin/owl-carousel/owl.carousel.js') }}"></script>
<script src="{{ asset('plugin/owl-carousel/owl.carousel.js') }}"></script>
<script src="{{ asset('frontend/js/events-index.js') }}"></script>
<script src="{{ asset('frontend/js/youtube-embed.js') }}"></script>

@endsection
