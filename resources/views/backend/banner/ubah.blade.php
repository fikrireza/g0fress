@extends('backend.layout.master')

@section('title')
<title>Gofress | Ubah Banner</title>
@endsection

@section('headscript')
<link href="{{ asset('backend/vendors/select2/dist/css/select2.min.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Ubah Banner<small></small></h2>
        <ul class="nav panel_toolbox">
          <a href="{{ route('banner.index') }}" class="btn btn-primary btn-sm">Kembali</a>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <form action="{{ route('banner.edit') }}" method="POST" class="form-horizontal form-label-left" enctype="multipart/form-data" novalidate>
          {{ csrf_field() }}
          <input type="hidden" name="id" value="{{ $getBanner->id }}">
          <div class="item form-group">
            <label class="col-md-3"></label>
            <div class="col-md-6">
              <span style="color:blue; font-size:11px;">Biarkan Kosong Jika Tidak Ingin Mengubah Gambar</span>
            </div>
          </div>
          <div class="item form-group {{ $errors->has('img_url') ? 'has-error' : ''}}">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Gambar Slider</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="img_url" class="form-control col-md-7 col-xs-12" name="img_url" type="file">
              <span style="color:blue; font-size:11px;">Width: 1366px; Heigh: 494px</span>
              @if($errors->has('img_url'))
                <code><span style="color:red; font-size:12px;">{{ $errors->first('img_url')}}</span></code>
              @endif
            </div>
          </div>
          <div class="item form-group">
            <label class="col-md-3"></label>
            <div class="col-md-6">
              <img src="{{ url('images/banner/').'/'.$getBanner->img_url }}" alt="" class="thumbnail">
            </div>
          </div>
          <div class="item form-group {{ $errors->has('img_alt') ? 'has-error' : ''}}">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Deskripsi Gambar <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="img_alt" class="form-control col-md-7 col-xs-12" name="img_alt" placeholder="Contoh: Nama Produk Kategori" required="required" type="text" value="{{ old('img_alt', $getBanner->img_alt) }}">
              @if($errors->has('img_alt'))
                <code><span style="color:red; font-size:12px;">{{ $errors->first('img_alt')}}</span></code>
              @endif
            </div>
          </div>
          <div class="ln_solid"></div>
          <div class="item form-group {{ $errors->has('posisi') ? 'has-error' : ''}}">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Halaman <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <select class="form-control col-md-7 col-xs-12 select2" name="halaman" required="">
                <option value=""></option>
                <option value="tentang" {{ $getBanner->halaman == 'tentang' ? 'selected' : '' }}>Tentang</option>
                <option value="produk" {{ $getBanner->halaman == 'produk' ? 'selected' : '' }}>Produk</option>
                <option value="news" {{ $getBanner->halaman == 'news' ? 'selected' : '' }}>News</option>
                <option value="program-events" {{ $getBanner->halaman == 'program-events' ? 'selected' : '' }}>Program & Events</option>
              </select>
              @if($errors->has('posisi'))
                <code><span style="color:red; font-size:12px;">{{ $errors->first('posisi')}}</span></code>
              @endif
            </div>
          </div>
          <div class="ln_solid"></div>
          <div class="form-group">
            <div class="col-md-6 col-md-offset-3">
              <a href="{{ route('banner.index') }}" class="btn btn-primary">Cancel</a>
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
<script src="{{ asset('backend/vendors/select2/dist/js/select2.full.min.js')}}"></script>
<script>
  $(".select2").select2({
    placeholder: "Pilih Halaman",
    allowClear: true
  });
</script>
@endsection
