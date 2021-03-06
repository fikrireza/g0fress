@extends('backend.layout.master')

@section('title')
  <title>Gofress | Tambah Program & Events Kategori</title>
@endsection

@section('headscript')
<link href="{{ asset('backend/vendors/select2/dist/css/select2.min.css') }}" rel="stylesheet">
<link href="{{ asset('backend/vendors/iCheck/skins/flat/green.css')}}" rel="stylesheet">
<link href="{{ asset('backend/vendors/switchery/dist/switchery.min.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Tambah Program & Events Kategori<small></small></h2>
        <ul class="nav panel_toolbox">
          <a href="{{ route('programEventsKategori.index') }}" class="btn btn-primary btn-sm">Kembali</a>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <form action="{{ route('programEventsKategori.store') }}" method="POST" class="form-horizontal form-label-left" enctype="multipart/form-data" novalidate>
          {{ csrf_field() }}
          <div class="item form-group {{ $errors->has('judul_kategori_ID') ? 'has-error' : ''}}">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Judul Kategori ID <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="judul_kategori_ID" class="form-control col-md-7 col-xs-12" data-validate-length-range="1" name="judul_kategori_ID" placeholder="Contoh: Judul Program Events Kategori" required="required" type="text" value="{{ old('judul_kategori_ID') }}">
              @if($errors->has('judul_kategori_ID'))
                <code><span style="color:red; font-size:12px;">{{ $errors->first('judul_kategori_ID')}}</span></code>
              @endif
            </div>
          </div>
          <div class="item form-group  {{ $errors->has('judul_kategori_EN') ? 'has-error' : ''}}">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Judul Kategori EN <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="judul_kategori_EN" class="form-control col-md-7 col-xs-12" data-validate-length-range="1" name="judul_kategori_EN" placeholder="Eg: Program Events Category Title" required="required" type="text" value="{{ old('judul_kategori_EN') }}">
              @if($errors->has('judul_kategori_EN'))
                <code><span style="color:red; font-size:12px;">{{ $errors->first('judul_kategori_EN')}}</span></code>
              @endif
            </div>
          </div>
          <div class="ln_solid"></div>
          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Publish </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <label>
                <input type="checkbox" class="flat" name="flag_publish" checked />
              </label>
            </div>
          </div>
          <div class="ln_solid"></div>
          <div class="form-group">
            <div class="col-md-6 col-md-offset-3">
              <a href="{{ route('programEventsKategori.index') }}" class="btn btn-primary">Cancel</a>
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
<script src="{{ asset('backend/vendors/validator/validator.min.js') }}"></script>
<script src="{{ asset('backend/vendors/select2/dist/js/select2.full.min.js')}}"></script>
<script src="{{ asset('backend/vendors/iCheck/icheck.min.js')}}"></script>
<script src="{{ asset('backend/vendors/switchery/dist/switchery.min.js')}}"></script>
<script src="{{ asset('backend/js/moment/moment.min.js') }}"></script>
<script src="{{ asset('backend/js/datepicker/daterangepicker.js') }}"></script>
<script>
  $(".select2_single").select2({
    placeholder: "Pilih Kategori",
    allowClear: true
  });
</script>
@endsection
