@extends('frontend._layouts.basic')

@section('head-title')
<title>Gofress - {{ $callProduk[0]['nama_kategori'] }}</title>
@endsection

@section('meta')
<meta name="title" content="Gofress - {{ $callProduk[0]['nama_kategori'] }}">
	@if($callAbout != null)
<meta name="description" content="Gofress - {{ strip_tags(Str::words($callAbout->deskripsi, 25)) }}">
	@endif
<meta name="keywords" content="{{ $callProduk[0]['nama_kategori'] }}, Gofress, Permen Tipis, Candy"/>
@endsection

@section('head-style')
<link rel="stylesheet" type="text/css" href="{{ mix('amadeo/css/mix/produk-view.css') }}">
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
					<label class="flag-title">{{ $callProduk[0]['nama_kategori'] }}</label>
				</div>
				<div class="vertical-align-midle">
					<label class="circle-shape right"></label>
					<label class="circle-shape right"></label>
				</div>
			</div>
		</div>

		<div class="produk-view-wrapper">
			@foreach($callProduk as $list)
			<div class="col-md-4 col-sm-6 col-xs-6">
				<div class="produk-item">
					<a class="callThisData" href="#thisLoadData" data-target="{{ route('frontend.produk.callData', ['id'=>$list->id_produk]) }}">
						<img class="produk-ditail" src="{{ asset('images/produk/'.$list->img_url_produk) }}" alt="{{ $list->img_alt_produk }}">
					</a>
				</div>
			</div>
			@endforeach
			<div class="clearfix"></div>
		</div>

		<div class="clearfix"></div>
	</div>
</div>

<div id="thisLoadData" class="wrapper-for-detail-produk">
</div>

<div class="background-content background-content-first for-share-wrapper">
	<div class="content-wrapper">
		@include('frontend._include.share-on-social')
	</div>
</div>

<div id="getSdSlug" data-slug="@if(isset($sdSlug)) {{ route('frontend.produk.callData', ['id'=>$sdSlug]) }} @endif" style="display: none;"></div>

@endsection

@section('footer-script')
<script src="{{ mix('amadeo/js/mix/produk-view.js') }}"></script>
@endsection
