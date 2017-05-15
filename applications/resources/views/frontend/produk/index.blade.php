@extends('frontend._layouts.basic')

@section('head-title')
<title>Gofress - Produk</title>
@endsection

@section('meta')
<meta name="title" content="Gofress - Produk">
	@if($callAbout != null)
<meta name="description" content="Gofress - {{ strip_tags(Str::words($callAbout->deskripsi, 40)) }}">
	@endif
<meta name="keywords" content="Gofress, Permen Tipis, Candy"/>
@endsection

@section('head-style')
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/public-sub-page.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/produk-slider-category.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/produk-index.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/for-share-wrapper.css') }}">

	<link rel="stylesheet" href="{{ asset('plugin/owl-carousel/owl.carousel.css') }}">
	<link rel="stylesheet" href="{{ asset('plugin/owl-carousel/owl.theme.css') }}">
@endsection

@section('body-content')

<div class="wrapper-banner">
	<div class="banner" style="background-image: url(' {{ asset($forBanner) }}');">
	</div>
</div>
<style type="text/css">

</style>
<div class="background-content background-content-first space-for-produk-owl">
	<div class="content-wrapper">

		<div class="title-background">
			<div class="flag-title-wrapper color">
				<div class="vertical-align-midle">
					<label class="circle-shape left"></label>
					<label class="circle-shape left"></label>
				</div>
				<div class="vertical-align-midle">
					<label class="flag-title">
						@lang('front/home.go-fress-product')
					</label>
				</div>
				<div class="vertical-align-midle">
					<label class="circle-shape right"></label>
					<label class="circle-shape right"></label>
				</div>
			</div>
		</div>


	</div>
</div>

<div class="background-content background-content-second space-for-produk-owl">
	<div class="content-wrapper">
	</div>
</div>

<div class="product-wrapper">
	<div class="product-wrapper-position">
		<div class="slider-product">
			@foreach($callKategory as $list)
			@if($list->count_kategori_id_and_flag_publish != 0)
			<div class="item">
				<div class="wrapper-product">
					<div class="front slider-product-front-animate">
						<div class="vertical-align-middle">
							<a href="{{ route('frontend.produk.view', ['slug'=>$list->slug]) }}">
								<img class="this-run-animate" src="{{ asset('images/produk/'.$list->img_url) }}" alt="{!! $list->img_alt !!}">
							</a>
							<div class="deskripsi">
								{!! $list->deskripsi !!}
							</div>
						</div>
					</div>
				</div>
			</div>
			@endif
			@endforeach
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
<script src="{{ asset('plugin/owl-carousel/owl.carousel.js') }}"></script>
<script src="{{ asset('plugin/owl-carousel/owl.carousel.js') }}"></script>
<script src="{{ asset('frontend/js/produk-index.js') }}"></script>

@endsection
