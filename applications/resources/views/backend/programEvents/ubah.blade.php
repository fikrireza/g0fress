@extends('backend.layout.master')

@section('title')
  <title>Aquasolve | Ubah Program & Events</title>
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
        <h2>Ubah Program & Events<small></small></h2>
        <ul class="nav panel_toolbox">
          <a href="{{ route('programEvents.index') }}" class="btn btn-primary btn-sm">Kembali</a>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <form action="{{ route('programEvents.edit') }}" method="POST" class="form-horizontal form-label-left" enctype="multipart/form-data" novalidate>
          {{ csrf_field() }}
          <input type="hidden" name="id" value="{{ $getProgramEvents->id }}">
          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Program & Events Kategori <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <select id="program_events_kategori_id" name="program_events_kategori_id" class="form-control select2_single" required="required">
                <option value="">Pilih</option>
                @foreach ($getProgramEventsKategori as $key)
                  <option value="{{ $key->id }}" {{ $getProgramEvents->program_events_kategori_id == $key->id ? 'selected' : '' }}>{{ $key->judul_kategori_ID}}</option>
                @endforeach
              </select>
              @if($errors->has('program_events_kategori_id'))
                <code><span style="color:red; font-size:10px;">{{ $errors->first('program_events_kategori_id')}}</span></code>
              @endif
            </div>
          </div>
          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Judul ID <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="judul_promosi_ID" class="form-control col-md-7 col-xs-12" data-validate-length-range="1" name="judul_promosi_ID" placeholder="Contoh: Judul Program Events" required="required" type="text" value="{{ $getProgramEvents->judul_promosi_ID }}">
              @if($errors->has('judul_promosi_ID'))
                <code><span style="color:red; font-size:10px;">{{ $errors->first('judul_promosi_ID')}}</span></code>
              @endif
            </div>
          </div>
          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Judul EN <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="judul_promosi_EN" class="form-control col-md-7 col-xs-12" data-validate-length-range="1" name="judul_promosi_EN" placeholder="Eg: Program Events Title" required="required" type="text" value="{{ $getProgramEvents->judul_promosi_EN }}">
              @if($errors->has('judul_promosi_EN'))
                <code><span style="color:red; font-size:10px;">{{ $errors->first('judul_promosi_EN')}}</span></code>
              @endif
            </div>
          </div>
          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Deskripsi ID <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <textarea id="textarea" required="required" name="deskripsi_ID" class="form-control col-md-7 col-xs-12" placeholder="Contoh Deskripsi">{{ $getProgramEvents->deskripsi_ID }}</textarea>
            </div>
            @if($errors->has('deskripsi_ID'))
            <div class="alert">{{ $errors->first('deskripsi_ID')}}</div>
            @endif
          </div>
          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Deskripsi EN <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <textarea id="textarea" required="required" name="deskripsi_EN" class="form-control col-md-7 col-xs-12" placeholder="Eg Description">{{ $getProgramEvents->deskripsi_EN }}</textarea>
              @if($errors->has('deskripsi_EN'))
                <code><span style="color:red; font-size:10px;">{{ $errors->first('deskripsi_EN')}}</span></code>
              @endif
            </div>
          </div>
          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Gambar </label>
            <span style="color:red; font-size:10px;">Biarkan Kosong Jika Tidak Ingin Mengubah Gambar</span>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="img_url" class="form-control col-md-7 col-xs-12" data-validate-length-range="1" name="img_url" type="file">
              <span style="color:red; font-size:10px;">Width: 100px; Heigh: 100px</span>
              @if($errors->has('img_url'))
                <code><span style="color:red; font-size:10px;">{{ $errors->first('img_url')}}</span></code>
              @endif
            </div>
          </div>
          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Deskripsi Gambar  </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="img_alt" class="form-control col-md-7 col-xs-12" data-validate-length-range="1" name="img_alt" placeholder="Contoh: Nama Produk" type="text" value="{{ $getProgramEvents->img_alt }}">
              @if($errors->has('img_alt'))
                <code><span style="color:red; font-size:10px;">{{ $errors->first('img_alt')}}</span></code>
              @endif
            </div>
          </div>
          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Video URL </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="video_url" class="form-control col-md-7 col-xs-12" data-validate-length-range="1" name="video_url" placeholder="http://youtube.com/watch?=" type="text" value="{{ $getProgramEvents->video_url }}">
              @if($errors->has('video_url'))
                <code><span style="color:red; font-size:10px;">{{ $errors->first('video_url')}}</span></code>
              @endif
            </div>
          </div>
          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Show Home Page </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <label>
                <input type="checkbox" class="flat" name="show_homepage" {{ $getProgramEvents->show_homepage == 1 ? 'checked="checked"' : '' }} />
              </label>
            </div>
          </div>
          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal Publish <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="tanggal_post" name="tanggal_post" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text" value="{{ $getProgramEvents->tanggal_post }}">
              @if($errors->has('tanggal_post'))
                <code><span style="color:red; font-size:10px;">{{ $errors->first('tanggal_post')}}</span></code>
              @endif
            </div>
          </div>
          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Publish </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <label>
                <input type="checkbox" class="flat" name="flag_publish" {{ $getProgramEvents->flag_publish == 1 ? 'checked="checked"' : '' }} />
              </label>
            </div>
          </div>
          <div class="ln_solid"></div>
          <div class="form-group">
            <div class="col-md-6 col-md-offset-3">
              <a href="{{ route('programEvents.index') }}" class="btn btn-primary">Cancel</a>
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
    .on('blur', 'input[required], textarea, input.optional, select.required', validator.checkField)
    .on('change', 'select.required', validator.checkField)
    .on('keypress', 'input[required][pattern], textarea', validator.keypress);

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
