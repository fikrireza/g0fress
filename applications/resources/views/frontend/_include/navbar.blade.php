<div class="nav">
	<div class="containt">
		<div class="icon-nav">
			<div class="icon-nav-wrapper">
				<a href="{{ route('frontend.home') }}">
					<img src=" {{ asset('public/image/default/logo-gofress.png') }}">
				</a>
			</div>
			<div class="bar slide-navbar-for-mobile open">
				<i class="fa fa-bars" aria-hidden="true"></i>
			</div>
		</div>
		<div class="nav-link-list">
			<ul class="nav-link-list-ul">
				<li class="nav-link-list-li">
					<a href="">
						@lang('front/home.about')
					</a>
				</li>
				<li class="nav-link-list-li dropdown-hover">
					<a href="{{ route('frontend.produk') }}">
						@lang('front/home.product')
					</a>
					<div class="dropdown-hover-content">

						@foreach($navCallKategory as $list)
						<div class="list slide-hover">
							<a href="{{ route('frontend.produk.view', ['slug'=>$list->slug]) }}">
								{{ $list->nama_kategori }}
							</a>
							<label class="icon">
								<i class="fa fa-chevron-right" aria-hidden="true"></i>
								<i class="fa fa-chevron-right" aria-hidden="true"></i>
							</label>
							<div class="slide-hover-content">
								@foreach($navCallProduk as $listSub)
								@if($list->id == $listSub->kategori_id)
								<div class="list">
									<a href="{{ route('frontend.produk.view', ['slug'=>$listSub->slug]) }}">
										{{ $listSub->nama_produk }}
									</a>
								</div>
								@endif
								@endforeach
							</div>
						</div>
						@endforeach
					</div>
				</li>
				<li class="nav-link-list-li">
					<a href="{{ route('frontend.news') }}">
						@lang('front/home.news')
					</a>
				</li>
				<li class="nav-link-list-li">
					<a href="{{ route('frontend.program-event') }}">
						@lang('front/home.program')
					</a>
				</li>
				<li class="nav-link-list-li">
					<a href="">
						@lang('front/home.contact')
					</a>
				</li>
			</ul>
		</div>
		<div class="connect-social">
			<div class="social-wrapper">
				<a href="{!! url('bahasa/id') !!}"><img src="{{ asset('public/image/default/lang-id-icon.png') }}"></a>
				<a href="{!! url('bahasa/en') !!}"><img src="{{ asset('public/image/default/lang-en-icon.png') }}"></a>
			</div>
		</div>
	</div>
</div>