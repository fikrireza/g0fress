@extends('backend.layout.master')

@section('title')
  <title>Gofress | Facebook App</title>
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
  }, 5000);
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


<div class="page-title">
  <div class="title_left">
    <h3>Facebook App <small></small></h3>
  </div>
</div>

<div class="clearfix"></div>
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Facebook Fanpage <small>Analytics</small></h2>
        <ul class="nav panel_toolbox">
          <a href="{{ route('facebook.ubah', $getFacebook->id) }}" class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="top" title="Ubah"><i class="fa fa-pencil"></i> Ubah</a>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content table-responsive">
        <table class="table table-striped table-bordered no-footer">
          <thead>
            <tr role="row">
              <th>Object</th>
              <th>Value</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Page ID</td>
              <td><input type="text" class="form-control col-md-3 col-xs-12" value="{{ $getFacebook->page_id}}" readonly=""></td>
            </tr>
            <tr>
              <td>App ID</td>
              <td><input type="text" class="form-control col-md-3 col-xs-12" value="{{ $getFacebook->app_id}}" readonly=""></td>
            </tr>
            <tr>
              <td>App Secret</td>
              <td><input type="text" class="form-control col-md-3 col-xs-12" value="{{ $getFacebook->app_secret}}" readonly=""></td>
            </tr>
            <tr>
              <td>Default Access Token</td>
              <td><textarea class="form-control col-md-3 col-xs-12" readonly="">{{ $getFacebook->default_access_token }}</textarea></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

@endsection

@section('script')
<script src="{{ asset('backend/vendors/pnotify/dist/pnotify.js') }}"></script>
<script src="{{ asset('backend/vendors/pnotify/dist/pnotify.nonblock.js') }}"></script>
@endsection
