@extends('frontend._layouts.basic')

@section('head-title')
<title>Go Fress - News</title>
@endsection

@section('head-style')
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/home.css') }}">

@endsection

@section('body-content')

<style type="text/css">
.wrapper-banner{
	position: relative;
	width: 100%;
	height: 60vh;
}
.wrapper-banner .banner{
	width: 100%;
	height: 60vh;
	background-repeat: no-repeat;
	background-size: cover;
}
.background-content .content-wrapper.content-wrapper-just-for-news-index{
	width: 80%;
}
.background-content .content-wrapper .sub-col,
.background-content .content-wrapper .main-col{
	float: left;
	margin-top: 40px;
}
.background-content .content-wrapper .sub-col{
	width: 25%;
}
.background-content .content-wrapper .sub-col .wrapper-sub-col{
	position: relative;
	margin-bottom: 50px;
}
.background-content .content-wrapper .sub-col .wrapper-sub-col .title{
	color: rgb(112,123,123);
	text-transform: uppercase;
	border-bottom: 2px solid rgb(111,122,122);
}
.background-content .content-wrapper .sub-col .wrapper-sub-col ul li{
	list-style: none;
	font-size: 18px;
	color: rgb(112,123,123) !important;
}
.background-content .content-wrapper .sub-col .wrapper-sub-col ul li.costume-list-style:before{
	content: "\f138"; /* FontAwesome Unicode */
	font-family: FontAwesome;
	display: inline-block;
	margin-left: -20px; /* same as padding-left set on li */
	width: 13px; /* same as padding-left set on li */
}
.background-content .content-wrapper .sub-col .wrapper-sub-col ul li a{
	color: rgb(112,123,123) !important;
}
.background-content .content-wrapper .main-col{
	width: 75%;
	padding: 0px 10px;
}
.background-content .content-wrapper .main-col .wrapper-news{
	background-color: rgb(68,217,217); 
	margin-left:60px; 
	margin-bottom: 40px;
	padding: 20px;
	position: relative;
}
.background-content .content-wrapper .main-col .wrapper-news:after {
	right: 100%;
	top: 30px;
	border: solid transparent;
	content: " ";
	height: 0;
	width: 0;
	position: absolute;
	pointer-events: none;
	border-color: rgba(136, 183, 213, 0);
	border-right-color: rgb(68,217,217); 
	border-width: 20px;
	margin-top: -20px;
}
.background-content .content-wrapper .main-col .wrapper-news .picture,
.background-content .content-wrapper .main-col .wrapper-news .content{
	float: left;
	width: 50%;
	padding: 10px;
}
.background-content .content-wrapper .main-col .wrapper-news .picture img{
	width: 100%;
	height: auto;
}
.background-content .content-wrapper .main-col .wrapper-news .content .title{
	color: rgb(255,255,255);
	margin-top: 0px;	
}
.background-content .content-wrapper .main-col .wrapper-news .content .time{
	color: rgb(255,255,255);
}
.background-content .content-wrapper .main-col .wrapper-news .content .description{
	color: rgb(89,89,89);
}
.background-content .content-wrapper .main-col .wrapper-news .content .btn-read-more{
	color: rgb(255,255,255);
	padding: 10px 20px;
	border: 2px solid rgb(255,255,255);
	border-radius: 5px;
}
.background-content .content-wrapper .main-col ul.pagination{
	margin-left:60px;
}
</style>

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
					<label class="flag-title">Berita & Info</label>
				</div>
				<div class="vertical-align-midle">
					<label class="circle-shape right"></label>
					<label class="circle-shape right"></label>
				</div>
			</div>
		</div>

		<div class="sub-col">
			<div class="wrapper-sub-col">
				<h2 class="title">follow us on</h2>
				<img src="{{ asset('public/image/default/facebook-white.png') }}">
				<img src="{{ asset('public/image/default/twitter-white.png') }}">
				<img src="{{ asset('public/image/default/instagram-white.png') }}">
			</div>
			<div class="wrapper-sub-col">
				<h2 class="title">archive</h2>
				<ul>
				@for($x = 0; $x <= 2; $x++)
					<li class="costume-list-style">
						<label>Bulan {{ $x }}</label>
						@for($w = 0; $w <= 3; $w++)
						<div>
							<label>
								<a href="">
									title {{ $w }}
								</a>
							</label>
						</div>
						@endfor
					</li>
				@endfor
					<li>
						<label>
							<a href="">
								Viaw All
							</a>
						</label>
					</li>
				</ul>
			</div>
		</div>
		<div class="main-col">
			@foreach($callNews as $list)
			<div class="wrapper-news">
				<div class="picture">
					<img src="{{ asset($list->img_url) }}" alt="{{ $list->img_alt }}">
				</div>
				<div class="content">
					<h2 class="title">{{ $list->judul }}</h2>

					<p class="time"><i class="fa fa-clock-o" aria-hidden="true"></i> {{ $list->tanggal_post }}</p>

					<p class="description">{{ $list->deskripsi }}</p>
					<br>
					<a class="btn-read-more" href="{{ route('frontend.news.view', ['slug'=>$list->slug]) }}">
						read more
					</a>
				</div>
				<div class="clearfix"></div>
			</div>
			@endforeach

			@if ($callNews->hasPages())
			   <ul class="pagination">
			       {{-- Previous Page Link --}}
			       @if ($callNews->onFirstPage())
			           <li class="disabled"><span>&laquo;</span></li>
			       @else
			           <li><a href="{{ $callNews->previousPageUrl() }}" rel="prev">&laquo;</a></li>
			       @endif

			       {{-- Pagination Elements --}}
			       @foreach ($callNews as $element)
			           {{-- "Three Dots" Separator --}}
			           @if (is_string($element))
			               <li class="disabled"><span>{{ $element }}</span></li>
			           @endif

			           {{-- Array Of Links --}}
			           @if (is_array($element))
			               @foreach ($element as $page => $url)
			                   @if ($page == $callNews->currentPage())
			                       <li class="active"><span>{{ $page }}</span></li>
			                   @else
			                       <li><a href="{{ $url }}">{{ $page }}</a></li>
			                   @endif
			               @endforeach
			           @endif
			       @endforeach

			       {{-- Next Page Link --}}
			       @if ($callNews->hasMorePages())
			           <li><a href="{{ $callNews->nextPageUrl() }}" rel="next">&raquo;</a></li>
			       @else
			           <li class="disabled"><span>&raquo;</span></li>
			       @endif
			   </ul>
			@endif

		</div>

		<div class="clearfix"></div>
	</div>
</div>

@endsection

@section('footer-script')
<script src="{{ asset('') }}"></script>
@endsection

