@php
	$url 			= $list->video_url;
	$step1			= explode('v=', $url);
	$step2 			= explode('&',$step1[1]);
	$vedio_id 		= $step2[0];
	
	$thumbnail 		= 'http://img.youtube.com/vi/'.$vedio_id.'/0.jpg';
	$vedio_embed 		= 'http://www.youtube.com/embed/'.$vedio_id;
@endphp
<div class="vidio-content" data-title="{{ $list->judul }}" data-url="{{ $vedio_embed }}" data-description="{!! $list->deskripsi !!}">
	<div class="thumnail-vidio" style="background-image: url('{{ $thumbnail }}');">
		<div class="wrapper-icon">
			<?php
			/*<a href="{{ route('frontend.program-event.view', ['slug'=>$list->slug]) }}">*/
			?>
				<img src="{{ asset('public/image/default/icon-youtube.png') }}">
			<?php
			/*</a>*/
			?>
		</div>
	</div>
	<div class="description">
		<h2>{{ $list->judul }}</h2>
		<p>{!! Str::words($list->deskripsi, 20, "") !!}</p>
	</div>
</div>