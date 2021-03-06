@extends('frontend._layouts.basic')

@section('head-title')
<title>Gofress - News</title>
@endsection

@section('meta')
<meta name="title" content="Gofress - News">
	@if($callAbout != null)
<meta name="description" content="Gofress - {{ strip_tags(Str::words($callAbout->deskripsi, 40)) }}">
	@endif
<meta name="keywords" content="Gofress, Permen Tipis, Candy"/>
@endsection

@section('head-style')
<link rel="stylesheet" type="text/css" href="{{ mix('amadeo/css/mix/news-index.css') }}">
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
				@foreach($callSosMed as $list)
				<a href="{{ $list->url_account }}">
					<img src="{{ asset('images/sosmed/'.$list->img_url) }}">
				</a>
				@endforeach
			</div>
			<div class="wrapper-sub-col">
				<h2 class="title">
					@lang('front/news-index.archive')
				</h2>
				<ul id="accordionList">

				@foreach($callNewsListDate as $listDate)
					<li class="costume-list-style">
						<label class="click-collapse" data-toggle="collapse" data-parent="#accordionList" href="#{{ str_slug($listDate->date, '_') }}">
							{{ date("F Y",strtotime('01-'.str_slug($listDate->date, '-'))) }}
						</label>
						<div id="{{ str_slug($listDate->date, '_') }}" class="collapse">
							@foreach($callNewsList as $list)
							@if($list->date == $listDate->date)
							<div>
								<label>
									<a href="{{ route('frontend.news.view', ['slug'=>$list->slug]) }}">
										{{ $list->judul }}
									</a>
								</label>
							</div>
							@endif
							@endforeach
						</div>
					</li>
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
@endsection
