@extends('backend.layout.master')

@section('title')
  <title>Aquasolve | Ubah Produk</title>
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
        <h2>Ubah Produk<small></small></h2>
        <ul class="nav panel_toolbox">
          <a href="{{ route('produk.index') }}" class="btn btn-primary btn-sm">Kembali</a>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <form action="{{ route('produk.edit') }}" method="POST" class="form-horizontal form-label-left" enctype="multipart/form-data" novalidate>
          {{ csrf_field() }}
          <input type="hidden" name="id" value="{{ $getProduk->id }}">
          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Kategori Produk <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <select id="kategori_id" name="kategori_id" class="form-control select2_single" required="required">
                <option value="">Pilih</option>
                @foreach ($getProdukKategori as $key)
                  <option value="{{ $key->id }}" {{ $getProduk->kategori_id == $key->id ? 'selected="selected"' : '' }}>{{ $key->nama_kategori}}</option>
                @endforeach
              </select>
            </div>
            @if($errors->has('kategori_id'))
            <div class="alert">{{ $errors->first('kategori_id')}}</div>
            @endif
          </div>
          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nama Produk <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="1" name="nama_produk" placeholder="Contoh: Nama Produk" required="required" type="text" value="{{ $getProduk->nama_produk }}">
            </div>
            @if($errors->has('nama_produk'))
            <div class="alert">{{ $errors->first('nama_produk')}}</div>
            @endif
          </div>
          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Deskripsi EN <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <textarea id="textarea" required="required" name="deskripsi_en" class="form-control col-md-7 col-xs-12">{{ $getProduk->deskripsi_en }}</textarea>
            </div>
            @if($errors->has('deskripsi_en'))
            <div class="alert">{{ $errors->first('deskripsi_en')}}</div>
            @endif
          </div>
          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Deskripsi ID <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <textarea id="textarea" required="required" name="deskripsi_id" class="form-control col-md-7 col-xs-12">{{ $getProduk->deskripsi_id }}</textarea>
            </div>
            @if($errors->has('deskripsi_id'))
            <div class="alert">{{ $errors->first('deskripsi_id')}}</div>
            @endif
          </div>
          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Gambar Produk <span class="required">*</span>
            </label>
            <span style="color:red; font-size:10px;">Biarkan Kosong Jika Tidak Ingin Mengubah Gambar</span>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="img_url" class="form-control col-md-7 col-xs-12" name="img_url" type="file">
              <span style="color:red; font-size:10px;">Width: 100px; Heigh: 100px</span>
            </div>
            @if($errors->has('img_url'))
            <div class="alert">{{ $errors->first('img_url')}}</div>
            @endif
          </div>
          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Deskripsi Gambar <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="img_alt" class="form-control col-md-7 col-xs-12" data-validate-length-range="1" name="img_alt" placeholder="Contoh: Nama Produk" required="required" type="text" value="{{ $getProduk->img_alt }}">
            </div>
            @if($errors->has('img_alt'))
            <div class="alert">{{ $errors->first('img_alt')}}</div>
            @endif
          </div>
          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal Publish <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="tanggal_post" name="tanggal_post" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text" value="{{ $getProduk->tanggal_post }}">
            </div>
            @if($errors->has('tanggal_post'))
            <div class="alert">{{ $errors->first('tanggal_post')}}</div>
            @endif
          </div>
          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Publish <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <label>
                <input type="checkbox" class="flat" name="flag_publish" {{ $getProduk->flag_publish == 1 ? 'checked="checked"' : '' }}>
              </label>
            </div>
          </div>
          <div class="ln_solid"></div>
          <div class="form-group">
            <div class="col-md-6 col-md-offset-3">
              <a href="{{ route('produk.index') }}" class="btn btn-primary">Cancel</a>
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

  // initialize the validator function
  validator.message.date = 'not a real date';

  // validate a field on "blur" event, a 'select' on 'change' event & a '.reuired' classed multifield on 'keyup':
  $('form')
    .on('blur', 'input[required], input.optional, select.required', validator.checkField)
    .on('change', 'select.required', validator.checkField)
    .on('keypress', 'input[required][pattern]', validator.keypress);

  $('form').submit(function(e) {
    e.preventDefault();
    var submit = true;

    // evaluate the form using generic validaing
    if (!validator.checkAll($(this))) {
      submit = false;
    }

    if (submit)
      this.submit();

    return false;
  });
</script>
@endsection
