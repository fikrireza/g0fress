@extends('backend.layout.master')

@section('title')
  <title>Gofress | Tambah News</title>
@endsection

@section('headscript')
<link href="{{ asset('backend/vendors/select2/dist/css/select2.min.css') }}" rel="stylesheet">
<link href="{{ asset('backend/vendors/iCheck/skins/flat/green.css')}}" rel="stylesheet">
<link href="{{ asset('backend/vendors/switchery/dist/switchery.min.css') }}" rel="stylesheet">
<script src="{{asset('backend/vendors/ckeditor/ckeditor.js')}}"></script>
<script src="{{asset('backend/vendors/ckfinder/ckfinder.js')}}"></script>
@endsection

@section('content')
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Tambah News<small></small></h2>
        <ul class="nav panel_toolbox">
          <a href="{{ route('news.index') }}" class="btn btn-primary btn-sm">Kembali</a>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <form action="{{ route('news.store') }}" method="POST" class="form-horizontal form-label-left" enctype="multipart/form-data" novalidate>
          {{ csrf_field() }}
          <div class="item form-group {{ $errors->has('judul_ID') ? 'has-error' : ''}}">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Judul ID <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="judul_ID" class="form-control col-md-7 col-xs-12" name="judul_ID" placeholder="Contoh: Judul News" required="required" type="text" value="{{ old('judul_ID') }}">
              @if($errors->has('judul_ID'))
                <code><span style="color:red; font-size:12px;">{{ $errors->first('judul_ID')}}</span></code>
              @endif
            </div>
          </div>
          <div class="item form-group {{ $errors->has('judul_EN') ? 'has-error' : ''}}">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Judul EN <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="judul_EN" class="form-control col-md-7 col-xs-12" name="judul_EN" placeholder="Eg: News Title" required="required" type="text" value="{{ old('judul_EN') }}">
              @if($errors->has('judul_EN'))
                <code><span style="color:red; font-size:12px;">{{ $errors->first('judul_EN')}}</span></code>
              @endif
            </div>
          </div>
          <div class="ln_solid"></div>
          <div class="item form-group {{ $errors->has('deskripsi_ID') ? 'has-error' : ''}}">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Deskripsi ID <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <textarea id="deskripsi_ID" required="required" name="deskripsi_ID" placeholder="Deskripsi Indonesia">{{ old('deskripsi_ID') }}</textarea>
              @if($errors->has('deskripsi_ID'))
                <code><span style="color:red; font-size:12px;">{{ $errors->first('deskripsi_ID')}}</span></code>
              @endif
            </div>
          </div>
          <div class="item form-group {{ $errors->has('deskripsi_EN') ? 'has-error' : ''}}">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Deskripsi EN <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <textarea id="deskripsi_EN" required="required" name="deskripsi_EN" placeholder="English Description">{{ old('deskripsi_EN')}}</textarea>
              @if($errors->has('deskripsi_EN'))
                <code><span style="color:red; font-size:12px;">{{ $errors->first('deskripsi_EN')}}</span></code>
              @endif
            </div>
          </div>
          <div class="ln_solid"></div>
          <div class="item form-group {{ $errors->has('img_url') ? 'has-error' : ''}}">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Gambar
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="img_url" class="form-control col-md-7 col-xs-12" name="img_url" type="file">
              <span style="color:blue; font-size:11px;">Width: 100px; Heigh: 100px</span>
              @if($errors->has('img_url'))
                <code><span style="color:red; font-size:12px;">{{ $errors->first('img_url')}}</span></code>
              @endif
            </div>
          </div>
          <div class="item form-group {{ $errors->has('img_alt') ? 'has-error' : ''}}">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Deskripsi Gambar
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="img_alt" class="form-control col-md-7 col-xs-12" name="img_alt" placeholder="Contoh: Deskripsi Gambar" type="text" value="{{ old('img_alt') }}">
              @if($errors->has('img_alt'))
                <code><span style="color:red; font-size:12px;">{{ $errors->first('img_alt')}}</span></code>
              @endif
            </div>
          </div>
          <div class="item form-group {{ $errors->has('video_url') ? 'has-error' : ''}}">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Video URL
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="video_url" class="form-control col-md-7 col-xs-12" name="video_url" placeholder="Contoh: Video Url" type="text" value="{{ old('video_url') }}">
              @if($errors->has('video_url'))
                <code><span style="color:red; font-size:12px;">{{ $errors->first('video_url')}}</span></code>
              @endif
            </div>
          </div>
          <div class="ln_solid"></div>
          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Show Homepage
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <label>
                <input type="checkbox" class="flat" name="show_homepage" checked />
              </label>
            </div>
          </div>
          <div class="item form-group {{ $errors->has('tanggal_post') ? 'has-error' : ''}}">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal Publish <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="tanggal_post" name="tanggal_post" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text" value="{{ date('Y-m-d') }}">
              @if($errors->has('tanggal_post'))
                <code><span style="color:red; font-size:12px;">{{ $errors->first('tanggal_post')}}</span></code>
              @endif
            </div>
          </div>
          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Publish
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <label>
                <input type="checkbox" class="flat" name="flag_publish" checked />
              </label>
            </div>
          </div>
          <div class="ln_solid"></div>
          <div class="form-group">
            <div class="col-md-6 col-md-offset-3">
              <a href="{{ route('news.index') }}" class="btn btn-primary">Cancel</a>
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
<script type="text/javascript">
  CKEDITOR.replace('deskripsi_ID', {
    toolbar: [
    { name: 'document', groups: [ 'mode', 'document', 'doctools' ], items: [ 'Save', 'NewPage', 'Preview', 'Print', '-', 'Templates' ] },
    { name: 'clipboard', groups: [ 'clipboard', 'undo' ], items: [ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ] },
    { name: 'editing', groups: [ 'find', 'selection', 'spellchecker' ], items: [ 'Find', 'Replace', '-', 'SelectAll', '-', 'Scayt' ] },
    { name: 'forms', items: [ 'Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton', 'HiddenField' ] },
    { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ], items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat' ] },
    { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ], items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl', 'Language' ] },
    { name: 'links', items: [ 'Link', 'Unlink', 'Anchor' ] },
    { name: 'insert', items: [ 'Image', 'Flash', 'Table', 'HorizontalRule', 'Smiley', 'SpecialChar', 'PageBreak', 'Iframe' ] },
    { name: 'styles', items: [ 'Styles', 'Format', 'Font', 'FontSize' ] },
    { name: 'colors', items: [ 'TextColor', 'BGColor' ] },
    { name: 'tools', items: [ 'Maximize', 'ShowBlocks' ] },
    { name: 'others', items: [ '-' ] }
  ]
  });
  CKEDITOR.replace('deskripsi_EN', {
    toolbar: [
    { name: 'clipboard', groups: [ 'clipboard', 'undo' ], items: [ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ] },
    { name: 'editing', groups: [ 'find', 'selection', 'spellchecker' ], items: [ 'Find', 'Replace', '-', 'SelectAll', '-', 'Scayt' ] },
    { name: 'forms', items: [ 'Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton', 'HiddenField' ] },
    { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ], items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat' ] },
    { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ], items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl', 'Language' ] },
    { name: 'links', items: [ 'Link', 'Unlink', 'Anchor' ] },
    { name: 'insert', items: [ 'Image', 'Flash', 'Table', 'HorizontalRule', 'Smiley', 'SpecialChar', 'PageBreak', 'Iframe' ] },
    { name: 'styles', items: [ 'Styles', 'Format', 'Font', 'FontSize' ] },
    { name: 'colors', items: [ 'TextColor', 'BGColor' ] },
    { name: 'tools', items: [ 'Maximize', 'ShowBlocks' ] },
    { name: 'others', items: [ '-' ] }
  ]
  });

  CKFinder.setupCKEditor( null, { basePath : '{{url('/')}}/backend/vendors/ckfinder/'} );
  CKEDITOR.instances[deskripsi_ID].getData();
  CKEDITOR.instances[deskripsi_EN].getData();
</script>
<script>
  $(".select2_single").select2({
    placeholder: "Pilih Kategori",
    allowClear: true
  });

  $('#tanggal_post').daterangepicker({
    singleDatePicker: true,
    calender_style: "picker_3",
    format: 'YYYY-MM-DD',
    minDate: new Date(),
  });
</script>
@endsection
