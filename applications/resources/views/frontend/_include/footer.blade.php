<div class="footer background-content background-content-second">
	<div class="content-wrapper wrapper-footer-link">
		<div class="float-left">
			<ul>
				<li>
					<a href="{{ route('frontend.home') }}">
						@lang('front/publict.home')
					</a>
				</li>
				<li>
					<a href="{{ route('frontend.about') }}">
						@lang('front/publict.about')
					</a>
				</li>
				<li>
					<a href="{{ route('frontend.contact') }}">
						@lang('front/publict.contact')
					</a>
				</li>
			</ul>
		</div>

		<div class="float-right">
			@foreach($callSosMed as $list)
			<a href="{{ $list->url_account }}">
				<img src="{{ asset('images/sosmed/'.$list->img_url) }}">
			</a>
			@endforeach
		</div>

		<div class="clearfix"></div>

		<p class="copy-right">@lang('front/publict.copy-right')</p>
	</div>
</div>