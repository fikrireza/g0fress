@extends('frontend._layouts.basic')

@section('head-title')
<title>Go Fress - Contact Us</title>
@endsection

@section('head-style')
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/public-sub-page.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/for-share-wrapper.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/about.css') }}">
@endsection

@section('body-content')

<div class="wrapper-banner">
	<div class="banner" style="background-image: url(' {{ asset('picture/firstCampaign/background-rainbow.png') }}');">
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
			Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus in scelerisque massa, aliquam molestie lorem. Sed rhoncus, erat ac ornare cursus, tellus odio egestas urna, eu accumsan sapien sapien molestie nulla. Etiam dignissim malesuada vulputate. Nulla at nunc sapien. Proin mollis ligula sapien, in euismod nisl cursus ut. In at quam orci. Cras pharetra eros sed rhoncus feugiat. Nam ligula ante, consectetur eget sagittis at, eleifend vel tortor. Etiam varius faucibus arcu, ut posuere massa fermentum quis. Etiam eu ipsum convallis, aliquet elit ut, pellentesque purus. Curabitur in felis pulvinar, feugiat tellus eu, elementum enim. Curabitur accumsan eu mauris vel vulputate.
		</div>

		<div class="wrapper-vision-mision">
			@for($Q=0; $Q<=1; $Q++)
			<div class="wrapper-item">
				<div class="wrapper-content">
					<div class="wrapper-description">
						<div class="content">
							<h1 class="title">
								OUR Mission
							</h1>
							<div class="description">
								Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus in scelerisque massa, aliquam molestie lorem. Sed rhoncus, erat ac ornare cursus, tellus odio egestas urna, eu accumsan sapien sapien molestie nulla. Etiam dignissim malesuada vulputate. Nulla at nunc sapien. Proin mollis ligula sapien, in euismod nisl cursus ut. In at quam orci. Cras pharetra eros sed rhoncus feugiat. Nam ligula ante, consectetur eget sagittis at, eleifend vel tortor.
							</div>
						</div>
					</div>
					<img src="{{ asset('public/image/default/wrapper-vision-mision.png') }}">
				</div>
			</div>
			@endfor
			<div class="clearfix"></div>
		</div>

		<div class="wrapper-show-image">
			<h2 class="title">
				certifications
			</h2>
			<img src="{{ asset('public/image/default/toko.png') }}" style="width: 100%; margin-top: 40px;">
		</div>
		
		<div class="wrapper-show-image">
			<h2 class="title">
				achievements
			</h2>
			<img src="{{ asset('public/image/default/toko.png') }}" style="width: 100%; margin-top: 40px;">
		</div>

		<div class="wrapper-show-image">
			<h2 class="title">
				distribution map
			</h2>
		</div>

	</div>
</div>

	<img src="{{ asset('public/image/default/distribution-map.png') }}" style="width: 100%;">

<div class="background-content background-content-first for-share-wrapper">
	<div class="content-wrapper">
		@include('frontend._include.share-on-social')
	</div>
</div>

@endsection

@section('footer-script')
@endsection
