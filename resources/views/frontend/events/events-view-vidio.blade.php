@extends('frontend._layouts.basic')

@section('head-title')
<title>Gofress - {{ $callProgramEvent->judul }}</title>
@endsection

@section('meta')
<meta name="title" content="Gofress - {{ $callProgramEvent->judul }}">
	<meta name="description" content="Gofress - {{ strip_tags(Str::words($callProgramEvent->deskripsi, 25)) }}">
	<meta name="keywords" content="Gofress, Permen Tipis, Candy" />
@endsection

@section('head-style')
<link rel="stylesheet" type="text/css" href="{{ asset('amadeo/css/public-sub-page.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('amadeo/css/events-view-vidio.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('amadeo/css/for-share-wrapper.css') }}">

	<meta property="og:type" content="Article" />
	<meta property="og:site_name" content="gofress.co.id">
	<meta property="og:title" content="{{ $callProgramEvent->judul }}">
	<meta property="og:url" content="{{ route('frontend.program-event.view', ['slug' => $callProgramEvent->slug])}} ">
	<meta property="og:description" content="{{ strip_tags(Str::words($callProgramEvent->deskripsi, 35)) }}">

	<script>
		(function(d, s, id) {
			var js, fjs = d.getElementsByTagName(s)[0];
			if (d.getElementById(id)) return;
			js = d.createElement(s); js.id = id;
			js.src = "//connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v2.5";
			fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));
	</script>
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
					<label class="flag-title">@lang('front/publict.vidio')</label>
				</div>
				<div class="vertical-align-midle">
					<label class="circle-shape right"></label>
					<label class="circle-shape right"></label>
				</div>
			</div>
		</div>

		<div class="time-publish">
			{{ $callProgramEvent->judul }}
		</div>

		<div class="description">
			@php
				$url = $callProgramEvent->video_url;
				$step1=explode('v=', $url);
				$step2 =explode('&',$step1[1]);
				$vedio_id = $step2[0];
			@endphp
			<iframe class="youtube-embed" src="http://www.youtube.com/embed/{{ $vedio_id }}" frameborder="0" allowfullscreen></iframe>
			<br>
			{!! $callProgramEvent->deskripsi !!}
		</div>
	</div>
</div>

<div class="background-content background-content-first for-share-wrapper">
	<div class="content-wrapper">
		@include('frontend._include.share-on-social')
	</div>
</div>

@endsection

@section('footer-script')
<script src="{{ asset('plugin/bootstrap-3.3.7/js/bootstrap.min.js') }}"></script>

@endsection
