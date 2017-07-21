@extends('backend.layout.master')

@section('title')
  <title>Gofress | Ubah Program & Events</title>
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
          <div class="item form-group {{ $errors->has('program_events_kategori_id') ? 'has-error' : ''}}">
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
                <code><span style="color:red; font-size:12px;">{{ $errors->first('program_events_kategori_id')}}</span></code>
              @endif
            </div>
          </div>
          <div class="item form-group {{ $errors->has('judul_promosi_ID') ? 'has-error' : ''}}">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Judul ID <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="judul_promosi_ID" class="form-control col-md-7 col-xs-12" data-validate-length-range="1" name="judul_promosi_ID" placeholder="Contoh: Judul Program Events" required="required" type="text" value="{{ old('judul_promosi_ID', $getProgramEvents->judul_promosi_ID )  }}">
              @if($errors->has('judul_promosi_ID'))
                <code><span style="color:red; font-size:12px;">{{ $errors->first('judul_promosi_ID')}}</span></code>
              @endif
            </div>
          </div>
          <div class="item form-group {{ $errors->has('judul_promosi_EN') ? 'has-error' : ''}}">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Judul EN <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="judul_promosi_EN" class="form-control col-md-7 col-xs-12" data-validate-length-range="1" name="judul_promosi_EN" placeholder="Eg: Program Events Title" required="required" type="text" value="{{ old('judul_promosi_EN', $getProgramEvents->judul_promosi_EN )  }}">
              @if($errors->has('judul_promosi_EN'))
                <code><span style="color:red; font-size:12px;">{{ $errors->first('judul_promosi_EN')}}</span></code>
              @endif
            </div>
          </div>
          <div class="ln_solid"></div>
          <div class="item form-group {{ $errors->has('deskripsi_ID') ? 'has-error' : ''}}">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Deskripsi ID <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <textarea id="deskripsi_ID" required="required" name="deskripsi_ID" class="form-control col-md-7 col-xs-12" placeholder="Contoh Deskripsi">{{ old('deskripsi_ID', $getProgramEvents->deskripsi_ID) }}</textarea>
              @if($errors->has('deskripsi_ID'))
                <code><span style="color:red; font-size:12px;">{{ $errors->first('deskripsi_ID')}}</span></code>
              @endif
            </div>
          </div>
          <div class="item form-group {{ $errors->has('deskripsi_EN') ? 'has-error' : ''}}">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Deskripsi EN <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <textarea id="deskripsi_EN" required="required" name="deskripsi_EN" class="form-control col-md-7 col-xs-12" placeholder="Eg Description">{{ old('deskripsi_EN', $getProgramEvents->deskripsi_EN) }}</textarea>
              @if($errors->has('deskripsi_EN'))
                <code><span style="color:red; font-size:12px;">{{ $errors->first('deskripsi_EN')}}</span></code>
              @endif
            </div>
          </div>
          <div class="ln_solid"></div>
          <div class="item form-group">
            <label class="col-md-3"></label>
            <div class="col-md-6">
              <span style="color:blue; font-size:11px;">Biarkan Kosong Jika Tidak Ingin Mengubah Gambar</span>
            </div>
          </div>
          <div class="item form-group {{ $errors->has('img_url') ? 'has-error' : ''}}">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Gambar </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="img_url" class="form-control col-md-7 col-xs-12" data-validate-length-range="1" name="img_url" type="file">
              <span style="color:blue; font-size:11px;">Width: 932px; Heigh: 350px</span>
              @if($errors->has('img_url'))
                <code><span style="color:red; font-size:12px;">{{ $errors->first('img_url')}}</span></code>
              @endif
            </div>
          </div>
          @if ($getProgramEvents->img_url != null)
          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Hapus Gambar </label>
            <div class="col-md-1 col-sm-1 col-xs-12">
              <label></label><input type="checkbox" class="flat" name="remove_image"/></label>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <img src="{{ asset('images/programEvent/').'/'.$getProgramEvents->img_url }}" alt="" class="thumbnail">
            </div>
          </div>
          @endif
          <div class="item form-group {{ $errors->has('img_alt') ? 'has-error' : ''}}">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Deskripsi Gambar  </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="img_alt" class="form-control col-md-7 col-xs-12" data-validate-length-range="1" name="img_alt" placeholder="Contoh: Nama Produk" type="text" value="{{ old('img_alt', $getProgramEvents->img_alt) }}">
              @if($errors->has('img_alt'))
                <code><span style="color:red; font-size:12px;">{{ $errors->first('img_alt')}}</span></code>
              @endif
            </div>
          </div>

          <div class="item form-group">
            <label class="col-md-3"></label>
            <div class="col-md-6">
              <span style="color:blue; font-size:11px;">Biarkan Kosong Jika Tidak Ingin Mengubah Thumbnail</span>
            </div>
          </div>
          <div class="item form-group {{ $errors->has('img_thumb') ? 'has-error' : ''}}">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Thumbnail </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="img_thumb" class="form-control col-md-7 col-xs-12" data-validate-length-range="1" name="img_thumb" type="file">
              <span style="color:blue; font-size:11px;">Width: 325px; Heigh: 413px</span>
              @if($errors->has('img_thumb'))
                <code><span style="color:red; font-size:12px;">{{ $errors->first('img_thumb')}}</span></code>
              @endif
            </div>
          </div>
          @if ($getProgramEvents->img_thumb != null)
          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12"> </label>
            {{-- <div class="col-md-1 col-sm-1 col-xs-12">
              <label></label><input type="checkbox" class="flat" name="remove_image"/></label>
            </div> --}}
            <div class="col-md-6 col-sm-6 col-xs-12">
              <img src="{{ asset('images/programEvent/').'/'.$getProgramEvents->img_thumb }}" alt="" class="thumbnail">
            </div>
          </div>
          @endif
          <div class="item form-group {{ $errors->has('img_alt_thumb') ? 'has-error' : ''}}">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Deskripsi Thumbnail  </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="img_alt_thumb" class="form-control col-md-7 col-xs-12" data-validate-length-range="1" name="img_alt_thumb" placeholder="Contoh: Nama Produk" type="text" value="{{ old('img_alt_thumb', $getProgramEvents->img_alt_thumb) }}">
              @if($errors->has('img_alt_thumb'))
                <code><span style="color:red; font-size:12px;">{{ $errors->first('img_alt_thumb')}}</span></code>
              @endif
            </div>
          </div>
          <div class="item form-group {{ $errors->has('video_url') ? 'has-error' : ''}}">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Video URL </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="video_url" class="form-control col-md-7 col-xs-12" data-validate-length-range="1" name="video_url" placeholder="Contoh: https://www.youtube.com/watch?v=aPdNFMN1unU" type="text" value="{{ old('video_url', $getProgramEvents->video_url) }}">
              @if($errors->has('video_url'))
                <code><span style="color:red; font-size:12px;">{{ $errors->first('video_url')}}</span></code>
              @endif
            </div>
          </div>
          @if ($getProgramEvents->video_url != null)
          <div class="item form-group">
            <label class="col-md-3"></label>
            <div class="col-md-6">
              @php
        				$url = $getProgramEvents->video_url;
        				$step1=explode('v=', $url);
        				$step2 =explode('&',$step1[1]);
        				$vedio_id = $step2[0];
        			@endphp
        			<iframe class="youtube-embed" src="http://www.youtube.com/embed/{{ $vedio_id }}" frameborder="0" allowfullscreen></iframe>
            </div>
          </div>
          @endif
          <div class="ln_solid"></div>
          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Show Home Page </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <label>
                <input type="checkbox" class="flat" name="show_homepage" @if(old('show_homepage', $getProgramEvents->show_homepage)) checked @endif />
              {{-- {{ $getProgramEvents->show_homepage == 1 ? 'checked="checked"' : '' }} /> --}}
              </label>
            </div>
          </div>
          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal Publish <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="tanggal_post" name="tanggal_post" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text" value="{{ old('tanggal_post', $getProgramEvents->tanggal_post) }}">
              @if($errors->has('tanggal_post'))
                <code><span style="color:red; font-size:12px;">{{ $errors->first('tanggal_post')}}</span></code>
              @endif
            </div>
          </div>
          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Publish </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <label>
                <input type="checkbox" class="flat" name="flag_publish" @if (old('flag_publish', $getProgramEvents->flag_publish)) checked @endif />
                {{-- {{ $getProgramEvents->flag_publish == 1 ? 'checked="checked"' : '' }} /> --}}
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
<script language="javascript">
  CKEDITOR.replace('deskripsi_ID', {
    toolbar: [
    { name: 'document', groups: [ 'mode', 'document', 'doctools' ], items: [ 'Source', '-', 'Save', 'NewPage', 'Preview', 'Print', '-', 'Templates' ] },
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
    { name: 'others', items: [ '-' ] },
    { name: 'about', items: [ 'About' ] }
  ]
  });
  CKEDITOR.replace('deskripsi_EN', {
    toolbar: [
    { name: 'document', groups: [ 'mode', 'document', 'doctools' ], items: [ 'Source', '-', 'Save', 'NewPage', 'Preview', 'Print', '-', 'Templates' ] },
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
    { name: 'others', items: [ '-' ] },
    { name: 'about', items: [ 'About' ] }
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
  });
</script>
@endsection
