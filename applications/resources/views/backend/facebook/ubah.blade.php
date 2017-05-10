@extends('backend.layout.master')

@section('title')
  <title>Gofress | Facebook App</title>
@endsection

@section('headscript')
<link href="{{ asset('backend/vendors/pnotify/dist/pnotify.css') }}" rel="stylesheet">
<link href="{{ asset('backend/vendors/pnotify/dist/pnotify.nonblock.css') }}" rel="stylesheet">
@endsection

@section('content')

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
          <a href="{{ route('facebook.index') }}" class="btn btn-primary btn-sm"> Kembali</a>
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
            <form class="" action="{{ route('facebook.edit') }}" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="id" value="{{ $getFacebook->id }}">
            <tr>
              <td>Page ID</td>
              <td><input type="text" class="form-control col-md-3 col-xs-12" name="page_id" value="{{ old('page_id', $getFacebook->page_id) }}">
                @if($errors->has('page_id'))
                  <code><span style="color:red; font-size:12px;">{{ $errors->first('page_id')}}</span></code>
                @endif</td>
            </tr>
            <tr>
              <td>App ID</td>
              <td><input type="text" class="form-control col-md-3 col-xs-12" name="app_id" value="{{ old('app_id', $getFacebook->app_id) }}"></td>
            </tr>
            <tr>
              <td>App Secret</td>
              <td><input type="text" class="form-control col-md-3 col-xs-12" name="app_secret" value="{{ old('app_secret', $getFacebook->app_secret)}}"></td>
            </tr>
            <tr>
              <td>Default Access Token</td>
              <td><textarea name="default_access_token" class="form-control col-md-3 col-xs-12">{{ old('default_access_token', $getFacebook->default_access_token) }}</textarea></td>
            </tr>
            <tr>
              <td colspan="2" class="text-center"><a href="{{ route('facebook.index') }}" class="btn btn-primary">Cancel</a>
              <button type="submit" class="btn btn-success">Submit</button></td>
            </tr>
            </form>
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
