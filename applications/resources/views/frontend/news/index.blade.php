@extends('frontend._layouts.basic')

@section('head-title')
<title>Go Fress - News</title>
@endsection

@section('head-style')
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/public-sub-page.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/news-index.css') }}">
@endsection

@section('body-content')

<div class="wrapper-banner">
	<div class="banner" style="background-image: url(' {{ asset('picture/firstCampaign/background-rainbow.png') }}');">

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
						@lang('front/news-index.berita-dan-info')
					</label>
				</div>
				<div class="vertical-align-midle">
					<label class="circle-shape right"></label>
					<label class="circle-shape right"></label>
				</div>
			</div>
		</div>

		<div class="sub-col">
			<div class="wrapper-sub-col">
				<h2 class="title">
					@lang('front/news-index.follow-us-on')
				</h2>
				<img src="{{ asset('public/image/default/socmed-logo-fb.png') }}">
				<img src="{{ asset('public/image/default/socmed-logo-twit.png') }}">
				<img src="{{ asset('public/image/default/socmed-logo-insta.png') }}">
			</div>
			<div class="wrapper-sub-col">
				<h2 class="title">
					@lang('front/news-index.archive')
				</h2>
				<ul id="accordionList">
				@php
					$month = '';
					$monthOld = '';
				@endphp
				@foreach($callNewsList as $list)
				@php
					$month = date("F",strtotime($list->tanggal_post));
					$year = date("Y",strtotime($list->tanggal_post));
				@endphp
					@if($month != $monthOld)
					<li class="costume-list-style">
						<label class="click-collapse" data-toggle="collapse" data-parent="#accordionList" href="#{{ $month }}">
							{{ $month }} {{ $year}}
						</label>
						<div id="{{ $month }}" class="collapse">
					@endif
							<div>
								<label>
									<a href="{{ route('frontend.news.view', ['slug'=>$list->slug]) }}">
										{{ $list->judul }}
									</a>
								</label>
							</div>
					@if($month == $monthOld)
						</div>
					</li>
					@endif
				@php
					$monthOld = date("F",strtotime($list->tanggal_post));
				@endphp
				@endforeach
				</ul>
			</div>
		</div>
		<div class="main-col">
			@foreach($callNews as $list)
			<div class="wrapper-news">
				<div class="picture">
					<img src="{{ asset('images/news').'/'.$list->img_url }}" alt="{{ $list->img_alt }}">
				</div>
				<div class="content">
					<h2 class="title">{{ $list->judul }}</h2>

					<p class="time"><i class="fa fa-clock-o" aria-hidden="true"></i> {{ $list->tanggal_post }}</p>

					<div class="description">
						{!! Str::words($list->deskripsi, 20, " ...") !!}
					</div>
					<br>
					<a class="btn-read-more" href="{{ route('frontend.news.view', ['slug'=>$list->slug]) }}">
						@lang('front/publict.read-more')
					</a>
				</div>
				<div class="clearfix"></div>
			</div>
			@endforeach

			{{ $callNews->links('frontend.vendor.pagination-custom') }}

		</div>

		<div class="clearfix"></div>
	</div>
</div>

@endsection

@section('footer-script')
<script src="{{ asset('plugin/bootstrap-3.3.7/js/bootstrap.min.js') }}"></script>
@endsection
