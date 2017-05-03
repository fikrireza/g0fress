@foreach($callProgramEventVidio as $list)
@php
	$url 			= $list->video_url;
	$step1			= explode('v=', $url);
	$step2 			= explode('&',$step1[1]);
	$vedio_id 		= $step2[0];
	$thumbnail 		= 'http://img.youtube.com/vi/'.$vedio_id.'/0.jpg';
@endphp
<div class="vidio-content">
	<div class="thumnail-vidio" style="background-image: url('{{ $thumbnail }}');">
		<div class="wrapper-icon">
			<a href="{{ route('frontend.program-event.view', ['slug'=>$list->slug]) }}">
				<img src="{{ asset('public/image/default/icon-youtube.png') }}">
			</a>
		</div>
	</div>
	<div class="description">
		<h2>{{ $list->judul }}</h2>
		<p>{!! Str::words($list->deskripsi, 20, "") !!}</p>
	</div>
</div>
@endforeach