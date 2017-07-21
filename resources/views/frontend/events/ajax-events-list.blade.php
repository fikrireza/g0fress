@foreach($callProgramEvent as $list)
<div class="wrapper-item">
	<div class="wrapper-thumnail">
		<img class="thumnail" src="{{ asset('images/programEvent/'.$list->img_thumb) }}" alt="{{ $list->img_alt_thumb }}">
		<div class="wrapper-title">
			<a href="{{ route('frontend.program-event.view', ['slug'=>$list->slug]) }}">
				<label class="title">{{ $list->judul }}</label>
			</a>
		</div>
	</div>
	<label class="description">
		{!! Str::words($list->deskripsi, 20," <a href=".route('frontend.program-event.view', ['slug'=>$list->slug]) .">Read More</a>")  !!}
	</label>
</div>
@endforeach
