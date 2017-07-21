@extends('frontend._layouts.basic')

@section('head-title')
<title>Gofress - {{ $callNews->judul }}</title>
@endsection

@section('meta')
<meta name="title" content="Gofress - {{ $callNews->judul }}">
	<meta name="description" content="Gofress - {{ strip_tags(Str::words($callNews->deskripsi, 25)) }}">
	<meta name="keywords" content="{{ $callNews->judul }}, Gofress, Permen Tipis, Candy"/>
@endsection

@section('head-style')
<link rel="stylesheet" type="text/css" href="{{ mix('amadeo/css/mix/news-view.css') }}">

	<meta itemprop="thumbnailUrl" content="{{ asset('images/news/').'/'.$callNews->img_url }}"/>
	<meta itemprop="image" content="{{ asset('images/news/').'/'.$callNews->img_url }}" />

	<meta property="og:type" content="Article" />
	<meta property="og:site_name" content="gofress.co.id">
	<meta property="og:title" content="{{ $callNews->judul }}">
	<meta property="og:url" content="{{ url('news').'/'.$callNews->slug}} ">
	<meta property="og:description" content="{{ strip_tags(Str::words($callNews->deskripsi, 35)) }}">
	<meta property="og:image" content="{{ asset('images/news/').'/'.$callNews->img_url }}">

	<script>(function(d, s, id) {
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
