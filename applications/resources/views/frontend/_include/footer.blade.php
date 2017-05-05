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
					<a href="">
						@lang('front/publict.about')
					</a>
				</li>
				<li>
					<a href="">
						@lang('front/publict.contact')
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

		<p class="copy-right">@lang('front/publict.copy-right')</p>
	</div>
</div>