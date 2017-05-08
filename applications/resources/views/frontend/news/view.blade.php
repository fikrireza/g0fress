@extends('frontend._layouts.basic')

@section('head-title')
<title>Go Fress - News</title>
@endsection

@section('head-style')
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/public-sub-page.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/news-view.css') }}">
@endsection

@section('body-content')

<div class="wrapper-banner">
	<div class="banner" style="background-image: url(' {{ asset($forBanner) }}');">
	</div>
</div>

<div class="background-content background-content-first">
	<div class="content-wrapper content-wrapper-just-for-news-index">

		<div class="title-background">
			<div class="flag-title-wrapper color">
				<div class="vertical-align-midle">
					<label class="circle-shape left"></label>
					<label class="circle-shape left"></label>
				</div>
				<div class="vertical-align-midle">
					<label class="flag-title">
						{{ $callNews->judul }}
					</label>
				</div>
				<div class="vertical-align-midle">
					<label class="circle-shape right"></label>
					<label class="circle-shape right"></label>
				</div>
			</div>
		</div>

		<div class="time-publish">
			<i class="fa fa-clock-o" aria-hidden="true"></i> {{ date("d.m.Y",strtotime($callNews->tanggal_post)) }}
		</div>

		<div class="description">
			<img src="{{ asset('images/news').'/'.$callNews->img_url }}" alt="{{ $callNews->img_alt }}">
			{!! $callNews->deskripsi !!}
		</div>

		<div class="clearfix"></div>

		@include('frontend._include.share-on-social')

	</div>
</div>

@endsection

@section('footer-script')
@endsection
