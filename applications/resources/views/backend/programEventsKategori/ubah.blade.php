@extends('backend.layout.master')

@section('title')
  <title>Aquasolve | Ubah Program & Events Kategori</title>
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
        <h2>Ubah Program & Events Kategori<small></small></h2>
        <ul class="nav panel_toolbox">
          <a href="{{ route('programEventsKategori.index') }}" class="btn btn-primary btn-sm">Kembali</a>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <form action="{{ route('programEventsKategori.edit') }}" method="POST" class="form-horizontal form-label-left" enctype="multipart/form-data" novalidate>
          {{ csrf_field() }}
          <input type="hidden" name="id" value="{{ $getProgramEventsKategori->id }}">
          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Judul ID <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="judul_promosi_ID" class="form-control col-md-7 col-xs-12" data-validate-length-range="1" name="judul_kategori_ID" placeholder="Contoh: Judul Program Events Kategori" required="required" type="text" value="{{ old('judul_kategori_ID', $getProgramEventsKategori->judul_kategori_ID) }}">
              @if($errors->has('judul_kategori_ID'))
                <code><span style="color:red; font-size:12px;">{{ $errors->first('judul_kategori_ID')}}</span></code>
              @endif
            </div>
          </div>
          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Judul EN <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="judul_promosi_EN" class="form-control col-md-7 col-xs-12" name="judul_kategori_EN" placeholder="Eg: Program Events Category Title" required="required" type="text" value="{{ old('judul_kategori_EN', $getProgramEventsKategori->judul_kategori_EN) }}">
              @if($errors->has('judul_kategori_EN'))
                <code><span style="color:red; font-size:12px;">{{ $errors->first('judul_kategori_EN')}}</span></code>
              @endif
            </div>
          </div>
          <div class="ln_solid"></div>
          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Gambar </label>
            <span style="color:red; font-size:10px;">Biarkan Kosong Jika Tidak Ingin Mengubah Gambar</span>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="img_url" class="form-control col-md-7 col-xs-12" name="img_url" type="file">
              <span style="color:red; font-size:10px;">Width: 100px; Heigh: 100px</span>
              @if($errors->has('img_url'))
                <code><span style="color:red; font-size:12px;">{{ $errors->first('img_url')}}</span></code>
              @endif
            </div>
          </div>
          @if ($getProgramEventsKategori->img_url != null)
          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Hapus Gambar </label>
            <div class="col-md-1 col-sm-1 col-xs-12">
              <label></label><input type="checkbox" class="flat" name="remove_image"/></label>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <img src="{{ asset('images/programEvent/').'/'.$getProgramEventsKategori->img_url }}" alt="" class="thumbnail">
            </div>
          </div>
          @endif
          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Deskripsi Gambar  </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="img_alt" class="form-control col-md-7 col-xs-12" name="img_alt" placeholder="Contoh: Judul Kategori" type="text" value="{{ old('img_alt', $getProgramEventsKategori->img_alt) }}">
              @if($errors->has('img_alt'))
                <code><span style="color:red; font-size:12px;">{{ $errors->first('img_alt')}}</span></code>
              @endif
            </div>
          </div>
          <div class="ln_solid"></div>
          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Publish </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <label>
                <input type="checkbox" class="flat" name="flag_publish" @if(old('flag_publish', $getProgramEventsKategori->flag_publish)) checked @endif />
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

  $('#tanggal_post').daterangepicker({
    singleDatePicker: true,
    calender_style: "picker_3",
    format: 'YYYY-MM-DD',
  });
</script>
@endsection
