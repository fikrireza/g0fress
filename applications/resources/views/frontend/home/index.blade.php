@extends('frontend._layouts.basic')

@section('head-title')
<title>Go Fress</title>
@endsection

@section('head-style')
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/home.css') }}">

<link rel="stylesheet" href="{{ asset('plugin/owl-carousel/owl.carousel.css') }}">
<link rel="stylesheet" href="{{ asset('plugin/owl-carousel/owl.theme.css') }}">
@endsection

@section('body-content')
<div class="slider">
	<div class="item">
		<div class="img" style="background-image: url('{{ asset('picture/firstCampaign/background-rainbow.png') }}');">
		</div>
	</div>
	<div class="item">
		<div class="img" style="background-image: url('{{ asset('picture/firstCampaign/background-rainbow.png') }}');">
		</div>
	</div>
	<div class="item">
		<div class="img" style="background-image: url('{{ asset('picture/firstCampaign/background-rainbow.png') }}');">
		</div>
	</div>
</div>

<div class="scroldown-wrapper">
	<div class="position">
		<div class="wrapper-content">
			<label class="circle-shape left"></label>
			<label class="wrapper-shape scroldown">
				scroll down for more!
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
				<label class="flag-title">About Go Fress</label>
			</div>
			<div class="vertical-align-midle">
				<label class="circle-shape right"></label>
				<label class="circle-shape right"></label>
			</div>
		</div>

		<div class="content-description">
			<label>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus in scelerisque massa, aliquam molestie lorem. Sed rhoncus, erat ac ornare cursus, tellus odio egestas urna, eu accumsan sapien sapien molestie nulla. Etiam dignissim malesuada vulputate. Nulla at nunc sapien. Proin mollis ligula sapien, in euismod nisl cursus ut. In at quam orci. Cras pharetra eros sed rhoncus feugiat. Nam ligula ante, consectetur eget sagittis at, eleifend vel tortor. Etiam varius faucibus arcu, ut posuere massa fermentum quis. Etiam eu ipsum convallis, aliquet elit ut, pellentesque purus. Curabitur in felis pulvinar, feugiat tellus eu, elementum enim. Curabitur accumsan eu mauris vel vulputate.</label>
		</div>

		<div class="flag-title-wrapper color">
			<div class="vertical-align-midle">
				<label class="circle-shape left"></label>
				<label class="circle-shape left"></label>
			</div>
			<div class="vertical-align-midle">
				<label class="flag-title">Go Fress Product</label>
			</div>
			<div class="vertical-align-midle">
				<label class="circle-shape right"></label>
				<label class="circle-shape right"></label>
			</div>
		</div>

		<div class="slider-product">
			@php ( $callKategory = App\Models\ProdukKategori::all() )

			@foreach($callKategory as $listKategory)
			<div class="item">
				<div class="wrapper-product">
					<div class="front slider-product-front-animate">
						<div class="vertical-align-middle">
							<img class="this-run-animate" src="{{ asset('images/produk') }}/{!! $listKategory->img_url !!}">
						</div>
					</div>
				</div>
			</div>
			@endforeach
		</div>

		<div class="for-btn-see-more">
			<a class="btn-see-more" href="">See More</a>
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
				<label class="flag-title">Promotion</label>
			</div>
			<div class="vertical-align-midle">
				<label class="circle-shape right"></label>
				<label class="circle-shape right"></label>
			</div>
		</div>
	</div>

	<div class="content-wrapper">
		<div class="slider-second">
			@for($i=0; $i<=15; $i++)
			<div class="item">
				<div class="wrapper-item">
					<div class="wrapper-thumnail">
						<img class="thumnail" src="{{ asset('public/image/default/promosion.png') }}">
						<div class="wrapper-title">
							<label class="title">SOME TEXT IN HERE BLA BLA BLA</label>
						</div>
					</div>
					<label class="description">Lorem ipsum dolor sit amet  varius faucibus arcu, ut posuere massa fermentum quis. Etiam eu ipsum</label>
				</div>
			</div>
			@endfor
		</div>

		<div class="for-btn-see-more">
			<a class="btn-see-more" href="">See More</a>
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
				<label class="flag-title">Latest News</label>
			</div>
			<div class="vertical-align-midle">
				<label class="circle-shape right"></label>
				<label class="circle-shape right"></label>
			</div>
		</div>
	</div>

	<div class="content-wrapper">
		<div class="lates-news-wrapper">
			@for($i=0; $i<=2; $i++)
			<div class="col-md-4 col-sm-12 col-xs-12">
				<div class="wrapper-news">
					<h3>Title</h3>
					<label>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus in scelerisque massa, aliquam molestie lorem. Sed rhoncus, erat ac ornare cursus, tellus odio egestas urna, eu accumsan sapien sapien ipsum convallis, aliquet elit ut, pellentesque purus.... <a href="">Read More</a></label>
				</div>		
			</div>
			@endfor
			<div class="clearfix"></div>
		</div>

		<div class="for-btn-see-more">
			<a class="btn-see-more" href="">See More</a>
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
				<label class="flag-title">Stay Connected</label>
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
						<a href="{{ $item['link'] }}">View</a>
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
			<a class="btn-see-more" href="">Connect With Us</a>
		</div>

		<div style="text-align: center;">
			<img src="{{ asset('public/image/default/facebook-white.png') }}">
			<img src="{{ asset('public/image/default/twitter-white.png') }}">
			<img src="{{ asset('public/image/default/instagram-white.png') }}">
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
				<label class="flag-title">Where to Find Us</label>
			</div>
			<div class="vertical-align-midle">
				<label class="circle-shape right"></label>
				<label class="circle-shape right"></label>
			</div>
		</div>

		<img src="{{ asset('public/image/default/toko.png') }}" style="width: 100%; margin-top: 60px;">

		<div class="for-btn-see-more">
			<a class="btn-see-more" href="">More Location</a>
		</div>
	</div>
</div>

<div class="footer background-content background-content-second">
	<div class="content-wrapper wrapper-footer-link">
		<div class="float-left">
			<ul>
				<li>
					<a href="">
						Home
					</a>
				</li>
				<li>
					<a href="">
						About
					</a>
				</li>
				<li>
					<a href="">
						Contact
					</a>
				</li>
			</ul>
		</div>

		<div class="float-right">
			<img src="{{ asset('public/image/default/facebook-white.png') }}">
			<img src="{{ asset('public/image/default/twitter-white.png') }}">
			<img src="{{ asset('public/image/default/instagram-white.png') }}">
		</div>

		<div class="clearfix"></div>

		<p class="copy-right">© 2017 Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore<br>magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.</p>
	</div>
</div>
@endsection

@section('footer-script')
<script src="{{ asset('plugin/owl-carousel/owl.carousel.js') }}"></script>
<script src="{{ asset('plugin/owl-carousel/owl.carousel.js') }}"></script>
<script src="{{ asset('frontend/js/home.js') }}"></script>
@endsection

