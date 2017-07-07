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
					<a href="{{ route('frontend.about') }}">
						@lang('front/publict.about')
					</a>
				</li>
				<li class="nav-link-list-li dropdown-hover">
					<a href="{{ route('frontend.produk') }}">
						@lang('front/publict.product')
					</a>
					<div class="dropdown-hover-content">

						@foreach($navCallKategory as $list)
						@if($list->count_kategori_id_and_flag_publish != 0)
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
									<a href="{{ route('frontend.produk.view.spesik', ['slug'=>$list->slug, 'sdSlug'=>$listSub->slug]) }}">
										{{ $listSub->nama_produk }}
									</a>
								</div>
								@endif
								@endforeach
							</div>
						</div>
						@endif
						@endforeach
					</div>
				</li>
				@if($countNews != 0)
				<li class="nav-link-list-li">
					<a href="{{ route('frontend.news') }}">
						@lang('front/publict.news')
					</a>
				</li>
				@endif
				<li class="nav-link-list-li">
					<a href="{{ route('frontend.program-event') }}">
						@lang('front/publict.program')
					</a>
				</li>
				<li class="nav-link-list-li">
					<a href="{{ route('frontend.contact') }}">
						@lang('front/publict.contact')
					</a>
				</li>
				<li class="nav-link-list-li">
					<div id="fb-root"></div>
					<a><div class="fb-like" data-href="https://www.facebook.com/Gofress" data-layout="button_count" data-action="like" data-size="small" data-show-faces="false" data-share="false"></div></a>
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