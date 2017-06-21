<div class="background-content background-content-first">
	<div class="content-wrapper">
		<div class="wrapper-produk-show">
			<img class="produk-show" src="{{ asset('images/produk/'.$callProduk->img_url) }}" alt="{{ $callProduk->img_alt }}">
		</div>
	</div>
</div>
<div class="background-content background-content-second">
	<div class="content-wrapper">
		<div class="wrapper-produk-ditails-description">
			<div class="ditails-description left">
				<h2>
					@lang('front/produk.nutrition-information')
				</h2>
				<div class="ditails">
					{!! $callProduk->deskripsi !!}
				</div>
			</div>
			<div class="ditails-description right">
				<h2>
					@lang('front/produk.ingredients')
				</h2>
				<div class="ditails">
					{!! $callProduk->ingredient !!}
				</div>
			</div>
		</div>
		<div class="clearfix"></div>
		<div class="wrapper-produk-ditails-for-image">
			<img class="left" src="{{ asset('images/produk/'.$callProduk->img_url_kiri) }}" alt="{{ $callProduk->img_alt_kiri }}">
			<img class="right" src="{{ asset('images/produk/'.$callProduk->img_url_kanan) }}" alt="{{ $callProduk->img_alt_kanan }}">
		</div>
	</div>
</div>
