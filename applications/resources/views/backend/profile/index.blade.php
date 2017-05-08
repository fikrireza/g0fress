@extends('backend.layout.master')

@section('title')
  <title>Gofress | Profil</title>
@endsection

@section('headscript')
<link href="{{ asset('backend/vendors/pnotify/dist/pnotify.css') }}" rel="stylesheet">
<link href="{{ asset('backend/vendors/pnotify/dist/pnotify.nonblock.css') }}" rel="stylesheet">
@endsection

@section('content')
@if(Session::has('berhasil'))
<script>
  window.setTimeout(function() {
    $(".alert-success").fadeTo(700, 0).slideUp(700, function(){
        $(this).remove();
    });
  }, 7000);
</script>
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="alert alert-success alert-dismissible fade in" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
      </button>
      <strong>{{ Session::get('berhasil') }}</strong>
    </div>
  </div>
</div>
@endif

@if(Session::has('erroroldpass'))
<script>
  window.setTimeout(function() {
    $(".alert-danger").fadeTo(700, 0).slideUp(700, function(){
        $(this).remove();
    });
  }, 5000);
</script>
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="alert alert-danger alert-dismissible fade in" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
      </button>
      <strong>{{ Session::get('erroroldpass') }}</strong>
    </div>
  </div>
</div>
@endif

<div class="col-md-6 col-sm-6 col-xs-6">
  <div class="x_panel">
    <div class="x_title">
      <h2>Profile </h2>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">
      <form class="form-horizontal form-label-left" action="{{ route('profile.user') }}" method="post" novalidate enctype="multipart/form-data">
        {{ csrf_field() }}
        <input name="id" type="hidden" class="form-control" value="{{ Auth::user()->id }}">
        <div class="item form-group">
          <label class="control-label col-md-2 col-sm-2 col-xs-12">Nama</label>
          <div class="col-md-8 col-sm-8 col-xs-12">
            <input id="name" type="text" name="name" value="{{ $getUser->name }}" class="form-control col-md-7 col-xs-12" required="">
          </div>
        </div>
        <div class="item form-group">
          <label class="control-label col-md-2 col-sm-2 col-xs-12">Avatar</label>
          <div class="col-md-8 col-sm-8 col-xs-12">
            <span style="color:red; font-size:10px;">Biarkan Kosong Jika Tidak Ingin Mengubah Avatar</span><br />
            <input id="avatar" type="file" name="avatar" class="form-control col-md-7 col-xs-12">
            <span style="color:red; font-size:10px;">Width: 128px; Heigh: 128px</span>
          </div>
        </div>
        <div class="item form-group">
          <label class="control-label col-md-2 col-sm-2 col-xs-12"></label>
          <div class="col-md-8 col-sm-8 col-xs-12">
            <img src="{{ asset('images/users').'/'.$getUser->avatar }}" class="thumbnail">
          </div>
        </div>
        <div class="item form-group">
          <label class="control-label col-md-2 col-sm-2 col-xs-12">Email</label>
          <div class="col-md-8 col-sm-8 col-xs-12">
            <input id="email" type="email" name="email" value="{{ $getUser->email }}" class="form-control col-md-7 col-xs-12">
          </div>
        </div>
        <div class="box-footer">
          <button type="submit" class="btn bg-primary">Ubah Profile</button>
        </div>

      </form>
    </div>
  </div>
</div>
<div class="col-md-6 col-sm-6 col-xs-6">
  <div class="x_panel">
    <div class="x_title">
      <h2>Ganti Password </h2>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">
      <form class="form-horizontal form-label-left" action="{{ route('profile.password') }}" method="post" novalidate>
      {{ csrf_field() }}
        <div class="item form-group {{ $errors->has('oldpass') ? 'has-error' : '' }}">
          <label class="col-sm-3 control-label">Password Lama</label>
          <div class="col-sm-6">
            <input od="oldpass" name="oldpass" type="password" placeholder="Password Lama" class="form-control" required="required" @if(!$errors->has('oldpass'))
              value="{{ old('oldpass') }}"@endif>
            <input name="id" type="hidden" class="form-control" value="{{ Auth::user()->id }}">
            @if($errors->has('oldpass'))
              <code><span style="color:blue; font-size:12px;">{{ $errors->first('oldpass') }}</span></code>
            @endif
            @if(Session::has('erroroldpass'))
              <code><span style="color:blue; font-size:12px;">{{ Session::get('erroroldpass') }}</span></code>
            @endif
          </div>
        </div>
        <div class="item form-group {{ $errors->has('newpass') ? 'has-error' : '' }} ">
          <label class="col-sm-3 control-label">Password Baru</label>
          <div class="col-sm-6">
            <input name="newpass" type="password" class="form-control" required="required"  placeholder="Password Baru Minimal 8 Karakter" @if(!$errors->has('newpass'))
              value="{{ old('newpass') }}"@endif>
            @if($errors->has('newpass'))
              <code><span style="color:blue; font-size:12px;">{{ $errors->first('newpass') }}</span></code>
            @endif
          </div>
        </div>
        <div class="item form-group {{ $errors->has('newpass_confirmation') ? 'has-error' : '' }}">
          <label class="col-sm-3 control-label">Konfirmasi Password Baru</label>
          <div class="col-sm-6">
            <input name="newpass_confirmation" type="password" class="form-control" required="required" placeholder="Konfirmasi Password Baru"
            @if(!$errors->has('newpass_confirmation'))
              value="{{ old('newpass_confirmation') }}"@endif>
            @if($errors->has('newpass_confirmation'))
              <code><span style="color:blue; font-size:12px;">{{ $errors->first('newpass_confirmation') }}</span></code>
            @endif
          </div>
        </div>
        <div class="box-footer">
          <button type="submit" class="btn bg-primary">Ubah Password</button>
        </div>
    </form>
    </div>
  </div>
</div>

@endsection
