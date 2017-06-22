@extends('backend.layout.master')

@section('title')
<title>Gofress | Ubah Tentang</title>
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
        <h2>Ubah Tentang<small></small></h2>
        <ul class="nav panel_toolbox">
          <a href="{{ route('tentangGaleri.index') }}" class="btn btn-primary btn-sm">Kembali</a>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <form action="{{ route('tentangGaleri.edit') }}" method="POST" class="form-horizontal form-label-left" enctype="multipart/form-data" novalidate>
          {{ csrf_field() }}
          <input type="hidden" name="id" value="{{ $getTentangGaleri->id }}">
          <div class="item form-group {{ $errors->has('cer_ach') ? 'has-error' : ''}}">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Kategori Sertifikat <span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <select class="form-control select2_single" name="cer_ach">
                <option value=""></option>
                <option value="1" @if ($getTentangGaleri->cer_ach == 1) selected @endif>Certifications</option>
                <option value="0" @if ($getTentangGaleri->cer_ach == 2) selected @endif>Achievements</option>
              </select>
              @if($errors->has('cer_ach'))
                <code><span style="color:red; font-size:12px;">{{ $errors->first('cer_ach')}}</span></code>
              @endif
            </div>
          </div>
          <div class="item form-group">
            <label class="col-md-3"></label>
            <div class="col-md-6">
              <span style="color:blue; font-size:11px;">Biarkan Kosong Jika Tidak Ingin Mengubah Gambar</span>
            </div>
          </div>
          <div class="item form-group {{ $errors->has('img_url') ? 'has-error' : ''}}">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Gambar<span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="img_url" class="form-control col-md-7 col-xs-12" name="img_url" type="file">
              <span style="color:blue; font-size:10px;">Max Width: 160px</span>
              @if($errors->has('img_url'))
                <code><span style="color:red; font-size:12px;">{{ $errors->first('img_url')}}</span></code>
              @endif
            </div>
          </div>
          <div class="item form-group">
            <label class="col-md-3"></label>
            <div class="col-md-6">
              <img src="{{ asset('images/tentang/').'/'.$getTentangGaleri->img_url }}" alt="" class="thumbnail">
            </div>
          </div>
          <div class="item form-group {{ $errors->has('img_alt') ? 'has-error' : ''}}">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Deskripsi Gambar <span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="img_alt" class="form-control col-md-7 col-xs-12" name="img_alt" placeholder="Contoh: Penghargaan Satu" required="required" type="text" value="{{ old('img_alt', $getTentangGaleri->img_alt) }}">
              @if($errors->has('img_alt'))
                <code><span style="color:red; font-size:12px;">{{ $errors->first('img_alt')}}</span></code>
              @endif
            </div>
          </div>
          <div class="ln_solid"></div>
          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Publish <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <label>
                <input type="checkbox" class="flat" name="flag_publish" {{ $getTentangGaleri->flag_publish == 1 ? 'checked="checked"' : '' }}>
              </label>
            </div>
          </div>
          <div class="ln_solid"></div>
          <div class="form-group">
            <div class="col-md-6 col-md-offset-3">
              <a href="{{ route('tentangGaleri.index') }}" class="btn btn-primary">Cancel</a>
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
