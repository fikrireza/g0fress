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
			@if($callSosMed != null)
			@foreach($callSosMed as $list)
			<a href="{{ $list->url_account }}">
				<img src="{{ asset('images/sosmed/'.$list->img_url) }}">
			</a>
			@endforeach
			@endif
		</div>

		<div class="clearfix"></div>

		<p class="copy-right">@lang('front/publict.copy-right')</p>
	</div>
</div>
<div class="buy-now-wrapper">
	<div class="middle">
		<div class="content-buy-now">
			<div class="icon-cart-wrapper">
				<img class="icon-cart" src="{{ asset('images/afiliasi/cart.png') }}" title="buy now" alt="buy now">
			</div>
			@php($afiliasiBreak = 0)	
			@foreach($callAfiliasiForBuyNow as $list)
			<div class="buy-now-list">
				<a href="{{ $list->link_url }}">
					<img src="{{ asset('images/afiliasi/'.$list->img_url) }}" title="{{ $list->nama_afiliasi }}" alt="{{ $list->img_alt }}">
				</a>
			</div>
			@php($afiliasiBreak++)
			@if($afiliasiBreak == 10)
			@break
			@endif
			@endforeach
		</div>
	</div>
</div>