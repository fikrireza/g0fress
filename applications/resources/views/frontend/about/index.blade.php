@extends('frontend._layouts.basic')

@section('head-title')
<title>Gofress - About</title>
@endsection

@section('meta')
<meta name="title" content="Gofress - About">
	@if($callAbout != null)
<meta name="description" content="Gofress - {{ strip_tags(Str::words($callAbout->deskripsi, 40)) }}">
	@endif
<meta name="keywords" content="Gofress, Permen Tipis, Candy"/>
@endsection

@section('head-style')
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/public-sub-page.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/for-share-wrapper.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/about.css') }}">
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
					<label class="flag-title">
						@lang('front/home.about-go-fress')
					</label>
				</div>
				<div class="vertical-align-midle">
					<label class="circle-shape right"></label>
					<label class="circle-shape right"></label>
				</div>
			</div>
		</div>

		<div class="wrapper-about-description">
			@if($callAbout != null)
			{!! $callAbout->deskripsi !!}
			@endif
		</div>

		<div class="wrapper-vision-mision">
			<div class="wrapper-item">
				<div class="wrapper-content">
					<div class="wrapper-description">
						<div class="content">
							<h1 class="title">
								@lang('front/about.our-vission')
							</h1>
							<div class="description">
								@if($callAbout != null)
								{!! $callAbout->visi !!}
								@endif
							</div>
						</div>
					</div>
					<img src="{{ asset('public/image/default/wrapper-vision-mision.png') }}">
				</div>
			</div>

			<div class="wrapper-item">
				<div class="wrapper-content">
					<div class="wrapper-description">
						<div class="content">
							<h1 class="title">
								@lang('front/about.our-mission')
							</h1>
							<div class="description">
								@if($callAbout != null)
								{!! $callAbout->misi !!}
								@endif
							</div>
						</div>
					</div>
					<img src="{{ asset('public/image/default/wrapper-vision-mision.png') }}">
				</div>
			</div>

			<div class="clearfix"></div>
		</div>

		<div class="wrapper-show-image">
			<h2 class="title">
				@lang('front/about.certifications')
			</h2>
			@foreach($callImg as $list)
			@if($list->cer_ach == 1)
			<img src="{{ asset('images/tentang/'.$list->img_url) }}" alt="{{ $list->img_alt }}">
			@endif
			@endforeach
		</div>

		<div class="wrapper-show-image">
			<h2 class="title">
				@lang('front/about.achievements')
			</h2>
			@foreach($callImg as $list)
			@if($list->cer_ach == 0)
			<img src="{{ asset('images/tentang/'.$list->img_url) }}" alt="{{ $list->img_alt }}">
			@endif
			@endforeach
		</div>

		<div class="wrapper-show-image">
			<h2 class="title">
				@lang('front/about.distribution-map')
			</h2>
		</div>

	</div>
</div>

<div class="wrapper-map">
	<img class="img-map" src="{{ asset('images/tentang/maps.png') }}">
	@foreach($callProv as $list)
	@if($list->count_city != 0)
	<div id="maps-prov-{{$list->id}}" class="pin-wrapper">
		<img src="{{ asset('images/tentang/pin.png') }}">
		<div class="description">
			<h4>Prov. {{ $list->nama_kota }}</h4>
			@foreach($callCity as $listSub)
			@if($list->id == $listSub->id_provinsi)
			<p>{{ $listSub->nama_kota }}</p>
			@endif
			@endforeach
			<div class="clearfix"></div>
		</div>
	</div>
	@endif
	@endforeach
</div>



<div class="background-content background-content-first for-share-wrapper">
	<div class="content-wrapper">
		@include('frontend._include.share-on-social')
	</div>
</div>

@endsection

@section('footer-script')
@endsection
