<div class="wrapper-share">
	<div class="flag-title-wrapper color costume-light-blue">
		<div class="vertical-align-midle">
			<label class="circle-shape left"></label>
			<label class="circle-shape left"></label>
		</div>
		<div class="vertical-align-midle">
			<label class="flag-title">
				@lang('front/publict.share-with-your-friend')
			</label>
		</div>
		<div class="vertical-align-midle">
			<label class="circle-shape right"></label>
			<label class="circle-shape right"></label>
		</div>
	</div>
</div>
<div class="wrapper-share">
	<a href="{{ Share::load(Request::fullUrl())->facebook() }}" target="_blank">
		<img class="share-icon" src="{{ asset('public/image/default/socmed-logo-fb.png') }}">
	</a>
	<a href="{{ Share::load(Request::fullUrl())->twitter() }}" target="_blank">
		<img class="share-icon" src="{{ asset('public/image/default/socmed-logo-twit.png') }}">
	</a>
</div>
