@extends('frontend._layouts.basic')

@section('head-title')
<title>Gofress</title>
@endsection

@section('meta')
<meta name="title" content="Gofress">
@if($callAbout != null)
<meta name="description" content="{{ strip_tags(Str::words($callAbout->deskripsi, 150)) }}">
@endif
@endsection

@section('head-style')
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/home.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/events-list-item-normal.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/produk-slider-category.css') }}">

<link rel="stylesheet" href="{{ asset('plugin/owl-carousel/owl.carousel.css') }}">
<link rel="stylesheet" href="{{ asset('plugin/owl-carousel/owl.theme.css') }}">
@endsection

@section('body-content')

<div class="slider">
	@foreach($callSlider as $list)
	<div class="item">
		<div class="img" style="background-image: url('{{ asset('images/slider/'.$list->img_url) }}');" title="{{ $list->img_alt }}">
		</div>
	</div>
	@endforeach
</div>

<div class="scroldown-wrapper">
	<div class="position">
		<div class="wrapper-content">
			<label class="circle-shape left"></label>
			<label class="wrapper-shape scroldown">
				@lang('front/home.scroll-down')
			</label>
			<label class="circle-shape right"></label>
		</div>
	</div>
</div>

<div class="background-content background-content-first">
	<div class="content-wrapper">
		<div class="text-center">
			<img id="scroll-to-here" class="pic-gofress" src="{{ asset('public/image/default/gofss.png') }}">
		</div>

		<div class="flag-title-wrapper color">
			<div class="vertical-align-midle">
				<label class="circle-shape left"></label>
				<label class="circle-shape left"></label>
			</div>
			<div class="vertical-align-midle">
				<label class="flag-title">@lang('front/home.about-go-fress')</label>
			</div>
			<div class="vertical-align-midle">
				<label class="circle-shape right"></label>
				<label class="circle-shape right"></label>
			</div>
		</div>

		<div class="content-description">
			@if($callAbout != null)
			{!! $callAbout->deskripsi !!}
			@endif
		</div>

		<div class="flag-title-wrapper color">
			<div class="vertical-align-midle">
				<label class="circle-shape left"></label>
				<label class="circle-shape left"></label>
			</div>
			<div class="vertical-align-midle">
				<label class="flag-title">@lang('front/home.go-fress-product')</label>
			</div>
			<div class="vertical-align-midle">
				<label class="circle-shape right"></label>
				<label class="circle-shape right"></label>
			</div>
		</div>

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
						</div>
					</div>
				</div>
			</div>
			@endif
			@endforeach
		</div>

		<div class="for-btn-see-more">
			<a class="btn-see-more" href="{{ route('frontend.produk') }}">@lang('front/publict.see-more')</a>
		</div>
	</div>
</div>

<div class="background-content background-content-second">
	<div class="title-background">
		<div class="flag-title-wrapper white">
			<div class="vertical-align-midle">
				<label class="circle-shape left"></label>
				<label class="circle-shape left"></label>
			</div>
			<div class="vertical-align-midle">
				<label class="flag-title">@lang('front/home.promotion')</label>
			</div>
			<div class="vertical-align-midle">
				<label class="circle-shape right"></label>
				<label class="circle-shape right"></label>
			</div>
		</div>
	</div>

	<div class="content-wrapper">
		<div class="slider-second">
			@foreach($callProgramEvent as $list)
			<div class="item">
				<div class="wrapper-item">
					<div class="wrapper-thumnail">
						<img class="thumnail" src="{{ asset('images/programEvent/'.$list->img_url) }}" alt="{{ $list->img_alt }}">
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
			<a class="btn-see-more" href="{{ route('frontend.program-event') }}">
				@lang('front/publict.see-more')
			</a>
		</div>

	</div>
</div>

<div class="background-content background-content-first">
	<div class="title-background">
		<div class="flag-title-wrapper white">
			<div class="vertical-align-midle">
				<label class="circle-shape left"></label>
				<label class="circle-shape left"></label>
			</div>
			<div class="vertical-align-midle">
				<label class="flag-title">@lang('front/home.latest-news')</label>
			</div>
			<div class="vertical-align-midle">
				<label class="circle-shape right"></label>
				<label class="circle-shape right"></label>
			</div>
		</div>
	</div>

	<div class="content-wrapper">
		<div class="lates-news-wrapper">
			@foreach($callNews as $list)
			<div class="col-md-4 col-sm-12 col-xs-12">
				<div class="wrapper-news">
					<h3>{{ $list->judul }}</h3>
					<label>{!! Str::words($list->deskripsi, 25," <a href=".route('frontend.news.view', ['slug'=>$list->slug]) .">Read More</a>")  !!}</label>
				</div>
			</div>
			@endforeach
			<div class="clearfix"></div>
		</div>

		<div class="for-btn-see-more">
			<a class="btn-see-more" href="">@lang('front/publict.see-more')</a>
		</div>

	</div>
</div>

<div class="background-content background-content-second">

	<div class="title-background">
		<div class="flag-title-wrapper white">
			<div class="vertical-align-midle">
				<label class="circle-shape left"></label>
				<label class="circle-shape left"></label>
			</div>
			<div class="vertical-align-midle">
				<label class="flag-title">@lang('front/home.stay-connected')</label>
			</div>
			<div class="vertical-align-midle">
				<label class="circle-shape right"></label>
				<label class="circle-shape right"></label>
			</div>
		</div>
	</div>

	<div class="content-wrapper">

		@if(!empty($items))
			@php ($insCount=0)
			@foreach($items as $key => $item)
		<div class="insta-wrapper col-md-4 col-sm-12 col-xs-12">
			<div class="insta-picture" style="background-image: url('{{ $item['images']['standard_resolution']['url'] }}');">
				<div class="insta-contain-wrapper">
					<div class="insta-contain">
						<p>{{ $item['likes']['count'] }} <i class="fa fa-heart" aria-hidden="true"></i> || {{ $item['comments']['count'] }} <i class="fa fa-comment" aria-hidden="true"></i></p>
						@if(isset($item['caption']['text']))
							<p>{{ $item['caption']['text'] }}</p>
						@endif
						<a href="{{ $item['link'] }}">@lang('front/publict.view')</a>
					</div>
				</div>
			</div>
		</div>
			@php
				$insCount++;
				if($insCount == 6){
					break;
				}
			@endphp
			@endforeach
		@else
		<h1>Nothing</h1>
		@endif

		<div class="clearfix"></div>

		<div class="for-btn-see-more">
			<label class="btn-see-more">
				@lang('front/home.connect-with-us')
			</label>
		</div>

		<div class="wrapper-connect-with-us">
			@foreach($callSosMed as $list)
			<a href="{{ $list->url_account }}">
				<img src="{{ asset('images/sosmed/'.$list->img_url) }}">
			</a>
			@endforeach
		</div>

	</div>
</div>

<div class="background-content background-content-first">

	<div class="content-wrapper" style="padding-top: 60px;">
		<div class="flag-title-wrapper color">
			<div class="vertical-align-midle">
				<label class="circle-shape left"></label>
				<label class="circle-shape left"></label>
			</div>
			<div class="vertical-align-midle">
				<label class="flag-title">@lang('front/home.where-to-find-us')</label>
			</div>
			<div class="vertical-align-midle">
				<label class="circle-shape right"></label>
				<label class="circle-shape right"></label>
			</div>
		</div>

		<div class="afiliasi-wrapper">
			@foreach($callAfiliasi as $list)
			<a href="{{ $list->link_url }}">
				<img src="{{ asset('images/afiliasi/'.$list->img_url) }}" title="{{ $list->nama_afiliasi }}" alt="{{ $list->img_alt }}">
			</a>
			@endforeach
		</div>
	</div>
</div>

@endsection

@section('footer-script')
<script src="{{ asset('plugin/owl-carousel/owl.carousel.js') }}"></script>
<script src="{{ asset('plugin/owl-carousel/owl.carousel.js') }}"></script>
<script src="{{ asset('frontend/js/home.js') }}"></script>
@endsection
