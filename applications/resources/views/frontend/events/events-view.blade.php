@extends('frontend._layouts.basic')

@section('head-title')
<title>Gofress - {{ $callProgramEvent->judul }}</title>
@endsection

@section('meta')
<meta name="title" content="Gofress - {{ $callProgramEvent->judul }}">
<meta name="description" content="{{ strip_tags(Str::words($callProgramEvent->deskripsi, 150)) }}">
@endsection

@section('head-style')
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/public-sub-page.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/events-view.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/for-share-wrapper.css') }}">

@endsection

@section('body-content')

<div class="wrapper-banner">
	<div class="banner" style="background-image: url(' {{ asset($forBanner) }}');">
	</div>
</div>

<div class="background-content background-content-first">
	<div class="content-wrapper">
		<div class="title-background">
			<div class="flag-title-wrapper color">
				<div class="vertical-align-midle">
					<label class="circle-shape left"></label>
					<label class="circle-shape left"></label>
				</div>
				<div class="vertical-align-midle">
					<label class="flag-title">{{ $callProgramEvent->judul }}</label>
				</div>
				<div class="vertical-align-midle">
					<label class="circle-shape right"></label>
					<label class="circle-shape right"></label>
				</div>
			</div>
		</div>

		<div class="time-publish">
			<i class="fa fa-clock-o" aria-hidden="true"></i> {{ date("d.m.Y",strtotime($callProgramEvent->tanggal_post)) }}
		</div>

		<div class="description">
			<img src="{{ asset('images/programEvent/'.$callProgramEvent->img_url) }}" alt="{{ $callProgramEvent->img_alt }}">
			{{ $callProgramEvent->deskripsi }}
		</div>

		@include('frontend._include.share-on-social')
	</div>
</div>

@endsection

@section('footer-script')
<script src="{{ asset('plugin/bootstrap-3.3.7/js/bootstrap.min.js') }}"></script>

@endsection

