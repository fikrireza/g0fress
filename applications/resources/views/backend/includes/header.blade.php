<!-- top navigation -->
<div class="top_nav">
  <div class="nav_menu">
    <nav class="" role="navigation">
      <div class="nav toggle">
        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
      </div>

      <ul class="nav navbar-nav navbar-right">
        <li class="">
          <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            <img src="{{ asset('images/users').'/'.Auth::user()->avatar }}" alt="">{{ Auth::user()->name }}
            <span class=" fa fa-angle-down"></span>
          </a>
          <ul class="dropdown-menu dropdown-usermenu pull-right">
            <li><a href="{{ route('profile.index') }}"> Profile</a></li>
            <li><a href="{{ route('logout') }}"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
          </ul>
        </li>

        @if ($getNotifInbox)
        <li role="presentation" class="dropdown">
          <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
            <i class="fa fa-envelope-o"></i>
            <span class="badge bg-green">{{ $getNotifInbox->count() }}</span>
          </a>
          <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
            @foreach ($getNotifInbox as $key)
            <li>
              <a>
                <span>
                  <span>{{ $key->nama }}</span>
                  @php
                  Carbon\Carbon::setLocale('id');
                  @endphp
                  <span class="time">{{ $key->created_at->diffForHumans() }}</span>
                </span>
                <span class="message">
                  {{ $key->pesan }}
                </span>
              </a>
            </li>
            @endforeach
            <li>
              <div class="text-center">
                <a href="{{ route('inbox.index') }}">
                  <strong>Lihat Semua</strong>
                  <i class="fa fa-angle-right"></i>
                </a>
              </div>
            </li>
          </ul>
        </li>
        @endif
      </ul>
    </nav>
  </div>
</div>
<!-- /top navigation -->
