@extends('backend.layout.master')

@section('title')
  <title>Gofress | Tambah Afiliasi</title>
@endsection

@section('headscript')
<link href="{{ asset('backend/vendors/iCheck/skins/flat/green.css')}}" rel="stylesheet">
<link href="{{ asset('backend/vendors/switchery/dist/switchery.min.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Tambah Afiliasi<small></small></h2>
        <ul class="nav panel_toolbox">
          <a href="{{ route('afiliasi.index') }}" class="btn btn-primary btn-sm">Kembali</a>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <form action="{{ route('afiliasi.store') }}" method="POST" class="form-horizontal form-label-left" enctype="multipart/form-data" novalidate>
          {{ csrf_field() }}
          <div class="item form-group {{ $errors->has('nama_afiliasi') ? 'has-error' : ''}}">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Afiliasi <span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="nama_afiliasi" class="form-control col-md-7 col-xs-12" name="nama_afiliasi" placeholder="Contoh: Alfamart" required="required" type="text" value="{{ old('nama_afiliasi') }}">
              @if($errors->has('nama_afiliasi'))
                <code><span style="color:red; font-size:12px;">{{ $errors->first('nama_afiliasi')}}</span></code>
              @endif
            </div>
          </div>
          <div class="item form-group">
            <label class="col-md-3"></label>
            <div class="col-md-6">
              <span style="color:blue; font-size:11px;">Width: 39px; Heigh: 39px</span>
            </div>
          </div>
          <div class="item form-group {{ $errors->has('img_url') ? 'has-error' : ''}}">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Gambar <span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="img_url" class="form-control col-md-7 col-xs-12" name="img_url" required="required" type="file">
              @if($errors->has('img_url'))
                <code><span style="color:red; font-size:12px;">{{ $errors->first('img_url')}}</span></code>
              @endif
            </div>
          </div>
          <div class="item form-group {{ $errors->has('img_alt') ? 'has-error' : ''}}">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Deskripsi Gambar <span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="img_alt" class="form-control col-md-7 col-xs-12" name="img_alt" placeholder="Contoh: Nama Afiliasi" required="required" type="text" value="{{ old('img_alt') }}">
              @if($errors->has('img_alt'))
                <code><span style="color:red; font-size:12px;">{{ $errors->first('img_alt')}}</span></code>
              @endif
            </div>
          </div>
          <div class="item form-group {{ $errors->has('link_url') ? 'has-error' : ''}}">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Link Afiliasi <span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="link_url" class="form-control col-md-7 col-xs-12" name="link_url" placeholder="Contoh: http://facebook.com/amadeo.id" required="required" type="text" value="{{ old('link_url') }}">
              @if($errors->has('link_url'))
                <code><span style="color:red; font-size:12px;">{{ $errors->first('link_url')}}</span></code>
              @endif
            </div>
          </div>
          <div class="ln_solid"></div>
          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Publish <span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <label>
                <input type="checkbox" class="flat" name="flag_publish" checked />
              </label>
            </div>
          </div>
          <div class="ln_solid"></div>
          <div class="form-group">
            <div class="col-md-6 col-md-offset-3">
              <a href="{{ route('afiliasi.index') }}" class="btn btn-primary">Cancel</a>
              <button id="send" type="submit" class="btn btn-success">Submit</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection



@section('script')
<script src="{{ asset('backend/vendors/iCheck/icheck.min.js')}}"></script>
<script src="{{ asset('backend/vendors/switchery/dist/switchery.min.js')}}"></script>
@endsection
