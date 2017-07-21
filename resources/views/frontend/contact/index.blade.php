@extends('frontend._layouts.basic')

@section('head-title')
<title>Gofress - Contact Us</title>
@endsection

@section('meta')
<meta name="title" content="Gofress - Contact Us">
	@if($callAbout != null)
<meta name="description" content="Gofress - {{ strip_tags(Str::words($callAbout->deskripsi, 40)) }}">
	@endif
<meta name="keywords" content="Gofress, Permen Tipis, Candy" />
@endsection

@section('head-style')
<link rel="stylesheet" type="text/css" href="{{ asset('amadeo/css/public-sub-page.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('amadeo/css/contact.css') }}">
@endsection

@section('body-content')

<div class="background-content background-content-second">
	<div class="content-wrapper">
	</div>
</div>

<div class="background-content background-content-first spaces-top">
	<div class="content-wrapper">

		<div class="flag-title-wrapper color">
			<div class="vertical-align-midle">
				<label class="circle-shape left"></label>
				<label class="circle-shape left"></label>
			</div>
			<div class="vertical-align-midle">
				<label class="flag-title">
					@lang('front/contact.contact-us')
				</label>
			</div>
			<div class="vertical-align-midle">
				<label class="circle-shape right"></label>
				<label class="circle-shape right"></label>
			</div>
		</div>

		<form method="post" action="{{ route('frontend.contact.post') }}">
			<div class="wrapper-content">
				<div class="odd-even">
					{{ csrf_field() }}
					<input type="text" class="form-control" name="nama" placeholder="@lang('front/contact.your-name')" value="{{ old('nama') }}">
					@if($errors->has('nama'))
						<code><span style="color:red; font-size:12px;">{{ $errors->first('nama')}}</span></code>
					@endif
					<input type="text" class="form-control" name="email" placeholder="@lang('front/contact.email-address')" value="{{ old('email') }}">
					@if($errors->has('email'))
						<code><span style="color:red; font-size:12px;">{{ $errors->first('email')}}</span></code>
					@endif
					<input type="text" class="form-control" name="telp" placeholder="@lang('front/contact.phone-number')" value="{{ old('telp') }}">
					@if($errors->has('telp'))
						<code><span style="color:red; font-size:12px;">{{ $errors->first('telp')}}</span></code>
					@endif
				</div>
				<div class="odd-even">
					<input type="text" class="form-control" name="subjek" placeholder="@lang('front/contact.subject')" value="{{ old('subjek') }}">
					@if($errors->has('subjek'))
						<code><span style="color:red; font-size:12px;">{{ $errors->first('subjek')}}</span></code>
					@endif
					<textarea class="form-control" rows="3" name="pesan" placeholder="@lang('front/contact.messages')">{{ old('pesan') }}</textarea>
					@if($errors->has('pesan'))
						<code><span style="color:red; font-size:12px;">{{ $errors->first('pesan')}}</span></code>
					@endif
				</div>
				<div class="clearfix"></div>
				<button class="submit" type="submit">
					Submit
				</button>
				<div class="clearfix"></div>
				@if(Session::has('berhasil'))
				<p class="info">
					{{ Session::get('berhasil') }}
				</p>
			@endif
			</div>
		</form>
	</div>
</div>

<div class="background-content background-content-first">
	<div class="wrapper-maps">
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.6903765769434!2d106.86181131476887!3d-6.1721943955314265!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNsKwMTAnMTkuOSJTIDEwNsKwNTEnNTAuNCJF!5e0!3m2!1sen!2s!4v1499846219004" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
		<!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2358.603627724047!2d106.86166611539522!3d-6.173223490512122!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f5aaf8ee5069%3A0x29f39907e21ab142!2sRuko+Indra+Sentral!5e0!3m2!1sid!2sid!4v1499825987975" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe> -->
		<!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.4499759798864!2d106.68074231476972!3d-6.335711195414996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69e504a69b23ab%3A0x3a02d749206e7d74!2sPT+Aquasolve+Sanaria!5e0!3m2!1sid!2sid!4v1493956624404" frameborder="0" scrolling="no" style="border:0" allowfullscreen></iframe> -->
	</div>

	<div class="content-wrapper">
		<div id="contact-ditails" class="wrapper-content">
			@if ($getKontak->isEmpty())
			<div class="odd-even">
				<h3 class="title">
					Title
				</h3>
				<div class="description">
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus in scelerisque massa, aliquam molestie lorem. Sed rhoncus, erat ac ornare cursus, tellus odio egestas urna, eu accumsan sapien sapien molestie nulla. Etiam dignissim malesuada vulputate. Nulla at nunc sapien. Proin mollis ligula sapien, in euismod nisl cursus ut. In at quam orci. Cras pharetra eros sed rhoncus feugiat. Nam ligula ante, consectetur eget sagittis at, eleifend vel tortor. Etiam varius faucibus arcu, ut posuere massa fermentum quis. Etiam eu ipsum convallis, aliquet elit ut, pellentesque purus. Curabitur in felis pulvinar, feugiat tellus eu, elementum enim. Curabitur accumsan eu mauris vel vulputate.
				</div>
				<p class="phone"><i class="fa fa-phone" aria-hidden="true"></i> 000-0000000</p>
			</div>
			<div class="odd-even">
				<h3 class="title">
					Title
				</h3>
				<div class="description">
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus in scelerisque massa, aliquam molestie lorem. Sed rhoncus, erat ac ornare cursus, tellus odio egestas urna, eu accumsan sapien sapien molestie nulla. Etiam dignissim malesuada vulputate. Nulla at nunc sapien. Proin mollis ligula sapien, in euismod nisl cursus ut. In at quam orci. Cras pharetra eros sed rhoncus feugiat. Nam ligula ante, consectetur eget sagittis at, eleifend vel tortor. Etiam varius faucibus arcu, ut posuere massa fermentum quis. Etiam eu ipsum convallis, aliquet elit ut, pellentesque purus. Curabitur in felis pulvinar, feugiat tellus eu, elementum enim. Curabitur accumsan eu mauris vel vulputate.
				</div>
				<p class="phone"><i class="fa fa-phone" aria-hidden="true"></i> 000-0000000</p>
			</div>
			@else
			<div>
				@foreach ($getKontak as $key)
				@if($key->flag_mancanegara == 0)
				<div class="odd-even">
					<h3 class="title">
						{{ $key->kantor_kategori}}
					</h3>
					<div class="description">
						{!! $key->alamat !!}
					</div>
					<p class="phone"><i class="fa fa-phone" aria-hidden="true"></i> {{ $key->no_telp }}</p>
				</div>
				@endif
				@endforeach
			<div class="clearfix"></div>
			</div>
			<div>
				@foreach ($getKontak as $key)
				@if($key->flag_mancanegara == 1)
				<div class="odd-even">
					<h3 class="title">
						{{ $key->kantor_kategori}}
					</h3>
					<div class="description">
						{!! $key->alamat !!}
					</div>
					<p class="phone"><i class="fa fa-phone" aria-hidden="true"></i> {{ $key->no_telp }}</p>
				</div>
				@endif
				@endforeach
			<div class="clearfix"></div>
			</div>
			@endif
		</div>
	</div>
</div>

@endsection

@section('footer-script')
<script src="{{ asset('plugin/bootstrap-3.3.7/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('amadeo/js/contact.js') }}"></script>
@endsection
