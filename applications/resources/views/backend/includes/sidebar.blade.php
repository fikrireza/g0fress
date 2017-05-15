<div class="col-md-3 left_col menu_fixed">
  <div class="left_col scroll-view">
    <div class="navbar nav_title" style="border: 0;">
      <a href="{{ route('admin.dashboard') }}" class="site_title"> <span>Gofress Dashboard</span></a>
    </div>

    <div class="clearfix"></div>

    <div class="profile">
      <div class="profile_pic">
        <img src="{{ asset('images/users').'/'.Auth::user()->avatar }}" alt="..." class="img-circle profile_img">
      </div>
      <div class="profile_info">
        <span>Hai,</span>
        <h2>{{ Auth::user()->name }}</h2>
      </div>
    </div>

    <br />

    <!-- sidebar menu -->
    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
      <div class="menu_section">
        <h3>General</h3>
        <ul class="nav side-menu">
          <li class="{{ Route::currentRouteNamed('admin.dashboard') ? 'active' : '' }}"><a href="{{ route('admin.dashboard') }}"><i class="fa fa-home"></i> Beranda </a></li>
          <li class="{{ Route::currentRouteNamed('produk.index') ? 'active' : '' }}{{ Route::currentRouteNamed('produk.tambah') ? 'active' : '' }}{{ Route::currentRouteNamed('produk.lihat') ? 'active' : '' }}{{ Route::currentRouteNamed('produk.ubah') ? 'active' : '' }}{{ Route::currentRouteNamed('produkKategori.index') ? 'active' : '' }}{{ Route::currentRouteNamed('produkKategori.tambah') ? 'active' : '' }}{{ Route::currentRouteNamed('produkKategori.lihat') ? 'active' : '' }}{{ Route::currentRouteNamed('produkKategori.ubah') ? 'active' : '' }}">
            <a>
              <i class="fa fa-beer"></i> Produk <span class="fa fa-chevron-down"></span>
            </a>
            <ul class="nav child_menu" style="{{ Route::currentRouteNamed('produk.index') ? 'display: block;' : '' }}{{ Route::currentRouteNamed('produk.tambah') ? 'display: block;' : '' }}{{ Route::currentRouteNamed('produk.lihat') ? 'display: block;' : '' }}{{ Route::currentRouteNamed('produk.ubah') ? 'display: block;' : '' }}{{ Route::currentRouteNamed('produkKategori.index') ? 'display: block;' : '' }}{{ Route::currentRouteNamed('produkKategori.tambah') ? 'display: block;' : '' }}{{ Route::currentRouteNamed('produkKategori.lihat') ? 'display: block;' : '' }}{{ Route::currentRouteNamed('produkKategori.ubah') ? 'display: block;' : '' }}">
              <li class="{{ Route::currentRouteNamed('produk.index') ? 'current-page' : '' }}{{ Route::currentRouteNamed('produk.tambah') ? 'current-page' : '' }}{{ Route::currentRouteNamed('produk.lihat') ? 'current-page' : '' }}{{ Route::currentRouteNamed('produk.ubah') ? 'current-page' : '' }}"><a href="{{ route('produk.index')}}">Produk</a></li>
              <li class="{{ Route::currentRouteNamed('produkKategori.index') ? 'current-page' : '' }}{{ Route::currentRouteNamed('produkKategori.tambah') ? 'current-page' : '' }}{{ Route::currentRouteNamed('produkKategori.lihat') ? 'current-page' : '' }}{{ Route::currentRouteNamed('produkKategori.ubah') ? 'current-page' : '' }}"><a href="{{ route('produkKategori.index')}}">Produk Kategori</a></li>
            </ul>
          </li>
          <li class="{{ Route::currentRouteNamed('news.index') ? 'active' : '' }}{{ Route::currentRouteNamed('news.tambah') ? 'active' : '' }}{{ Route::currentRouteNamed('news.lihat') ? 'active' : '' }}{{ Route::currentRouteNamed('news.ubah') ? 'active' : '' }}">
            <a href="{{ route('news.index') }}"><i class="fa fa-newspaper-o"></i> News </a>
          </li>
          <li class="{{ Route::currentRouteNamed('programEvents.index') ? 'active' : '' }}{{ Route::currentRouteNamed('programEvents.tambah') ? 'active' : '' }}{{ Route::currentRouteNamed('programEvents.lihat') ? 'active' : '' }}{{ Route::currentRouteNamed('programEvents.ubah') ? 'active' : '' }}{{ Route::currentRouteNamed('programEventsKategori.index') ? 'active' : '' }}{{ Route::currentRouteNamed('programEventsKategori.tambah') ? 'active' : '' }}{{ Route::currentRouteNamed('programEventsKategori.lihat') ? 'active' : '' }}{{ Route::currentRouteNamed('programEventsKategori.ubah') ? 'active' : '' }}">
            <a><i class="fa fa-calendar"></i> Program & Events <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu" style="{{ Route::currentRouteNamed('programEvents.index') ? 'display: block;' : '' }}{{ Route::currentRouteNamed('programEvents.tambah') ? 'display: block;' : '' }}{{ Route::currentRouteNamed('programEvents.lihat') ? 'display: block;' : '' }}{{Route::currentRouteNamed('programEvents.ubah') ? 'display: block;' : '' }}{{ Route::currentRouteNamed('programEventsKategori.index') ? 'display: block;' : '' }}{{ Route::currentRouteNamed('programEventsKategori.tambah') ? 'display: block;' : '' }}{{ Route::currentRouteNamed('programEventsKategori.lihat') ? 'display: block;' : '' }}{{ Route::currentRouteNamed('programEventsKategori.ubah') ? 'display: block;' : '' }}">
              <li class="{{ Route::currentRouteNamed('programEvents.index') ? 'current-page' : '' }}{{ Route::currentRouteNamed('programEvents.tambah') ? 'current-page' : '' }}{{ Route::currentRouteNamed('programEvents.lihat') ? 'current-page' : '' }}{{ Route::currentRouteNamed('programEvents.ubah') ? 'current-page' : '' }}"><a href="{{ route('programEvents.index') }}">Program & Events</a></li>
              <li class="{{ Route::currentRouteNamed('programEventsKategori.index') ? 'current-page' : '' }}{{ Route::currentRouteNamed('programEventsKategori.tambah') ? 'current-page' : '' }}{{ Route::currentRouteNamed('programEventsKategori.lihat') ? 'current-page' : '' }}{{ Route::currentRouteNamed('programEventsKategori.ubah') ? 'current-page' : '' }}"><a href="{{ route('programEventsKategori.index') }}">Program & Events Kategori</a></li>
            </ul>
          </li>
          <li class="{{ Route::currentRouteNamed('slider.index') ? 'active' : '' }}{{ Route::currentRouteNamed('slider.tambah') ? 'active' : '' }}{{ Route::currentRouteNamed('banner.index') ? 'active' : '' }}{{ Route::currentRouteNamed('banner.tambah') ? 'active' : '' }}{{ Route::currentRouteNamed('banner.ubah') ? 'active' : '' }}">
            <a><i class="fa fa-image"></i> Banner Slider <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li class="{{ Route::currentRouteNamed('slider.index') ? 'current-page' : '' }}{{ Route::currentRouteNamed('slider.tambah') ? 'current-page' : '' }}"><a href="{{ route('slider.index') }}">Home Slider</a></li>
              <li class="{{ Route::currentRouteNamed('banner.index') ? 'current-page' : '' }}{{ Route::currentRouteNamed('banner.tambah') ? 'current-page' : '' }}{{ Route::currentRouteNamed('banner.ubah') ? 'current-page' : '' }}"><a href="{{ route('banner.index') }}">Banner </a></li>
            </ul>

          </li>
          <li class="{{ Route::currentRouteNamed('kontak.index') ? 'active' : '' }}{{ Route::currentRouteNamed('kontak.tambah') ? 'active' : '' }}{{ Route::currentRouteNamed('kontak.ubah') ? 'active' : '' }}">
            <a href="{{ route('kontak.index')}}"><i class="fa fa-building-o"></i> Kontak </a>
          </li>
          <li class="{{ Route::currentRouteNamed('tentang.index') ? 'active' : '' }}{{ Route::currentRouteNamed('tentang.tambah') ? 'active' : '' }}{{ Route::currentRouteNamed('tentang.ubah') ? 'active' : '' }}">
            <a><i class="fa fa-bookmark"></i> Tentang <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li class="{{ Route::currentRouteNamed('tentang.index') ? 'current-page' : '' }}{{ Route::currentRouteNamed('tentang.tambah') ? 'current-page' : '' }}{{ Route::currentRouteNamed('tentang.ubah') ? 'current-page' : '' }}"><a href="{{ route('tentang.index') }}">Visi & Misi</a></li>
              <li class="{{ Route::currentRouteNamed('tentangGaleri.index') ? 'current-page' : '' }}{{ Route::currentRouteNamed('tentangGaleri.tambah') ? 'current-page' : '' }}{{ Route::currentRouteNamed('tentangGaleri.ubah') ? 'current-page' : '' }}"><a href="{{ route('tentangGaleri.index') }}">Certificate & Achievement </a></li>
            </ul>

          </li>
          <li class="{{ Route::currentRouteNamed('afiliasi.index') ? 'active' : '' }}"><a href="{{ route('afiliasi.index') }}"><i class="fa fa-inbox"></i> Afiliasi </a></li>
          <li class="{{ Route::currentRouteNamed('social.index') ? 'active' : '' }}{{ Route::currentRouteNamed('social.tambah') ? 'active' : '' }}{{ Route::currentRouteNamed('social.ubah') ? 'active' : '' }}"><a href="{{ route('social.index') }}"><i class="fa fa-share-alt"></i> Social Media </a></li>
        </ul>
      </div>
      <div class="menu_section">
        <h3>Extra</h3>
        <ul class="nav side-menu">
          <li class="{{ Route::currentRouteNamed('logAkses.index') ? 'active' : '' }}"><a href="{{ route('logAkses.index') }}"><i class="fa fa-inbox"></i> Akses Log </a></li>
          <li class="{{ Route::currentRouteNamed('hello.index') ? 'active' : '' }}"><a><i class="fa fa-windows"></i> Campaign <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="{{ route('hello.index') }}">Hello</a></li>
            </ul>
          </li>
          <li class="{{ Route::currentRouteNamed('facebook.index') ? 'active' : '' }}"><a href="{{ route('facebook.index') }}"><i class="fa fa-facebook"></i> Facebook Analytics </a></li>
          <li class="{{ Route::currentRouteNamed('users.index') ? 'active' : '' }}"><a href="{{ route('users.index') }}"><i class="fa fa-users"></i> Users </a></li>
        </ul>
      </div>

    </div>
    <!-- /sidebar menu -->

    <!-- /menu footer buttons -->
    <div class="sidebar-footer hidden-small">
      <a href="{{ route('users.index') }}" data-toggle="tooltip" data-placement="top" title="Users">
        <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
      </a>
      <a href="{{ route('inbox.index') }}" data-toggle="tooltip" data-placement="top" title="Inbox">
        <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
      </a>
      <a href="{{ route('profile.index') }}" data-toggle="tooltip" data-placement="top" title="Profile">
        <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
      </a>
      <a href="{{ route('logout') }}" data-toggle="tooltip" data-placement="top" title="Logout">
        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
      </a>
    </div>
    <!-- /menu footer buttons -->
  </div>
</div>
