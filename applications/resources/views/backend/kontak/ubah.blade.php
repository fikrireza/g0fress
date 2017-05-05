@extends('backend.layout.master')

@section('title')
<title>Gofress | Ubah Kontak</title>
@endsection

@section('headscript')
<script src="{{asset('backend/vendors/ckeditor/ckeditor.js')}}"></script>
@endsection

@section('content')
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Ubah Kontak<small></small></h2>
        <ul class="nav panel_toolbox">
          <a href="{{ route('kontak.index') }}" class="btn btn-primary btn-sm">Kembali</a>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <form action="{{ route('kontak.edit') }}" method="POST" class="form-horizontal form-label-left">
          {{ csrf_field() }}
          <input type="hidden" name="id" value="{{ $getKontak->id }}">
          <div class="item form-group {{ $errors->has('kantor_kategori') ? 'has-error' : ''}}">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nama Kantor <span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="kantor_kategori" class="form-control col-md-7 col-xs-12" name="kantor_kategori" placeholder="Contoh: Head Office" type="text" value="{{ old('kantor_kategori', $getKontak->kantor_kategori) }}" required="required">
              @if($errors->has('kantor_kategori'))
                <code><span style="color:red; font-size:12px;">{{ $errors->first('kantor_kategori')}}</span></code>
              @endif
            </div>
          </div>
          <div class="item form-group {{ $errors->has('alamat') ? 'has-error' : ''}}">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Alamat</label>
            <div class="col-md-6">
              <textarea id="alamat" required="required" name="alamat">{{ old('alamat', $getKontak->alamat) }}</textarea>
              @if($errors->has('alamat'))
                <code><span style="color:red; font-size:12px;">{{ $errors->first('alamat')}}</span></code>
              @endif
            </div>
          </div>
          <div class="item form-group {{ $errors->has('email') ? 'has-error' : ''}}">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Email <span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" id="email" class="form-control col-md-7 col-xs-12" name="email" placeholder="Contoh: fikrirezaa@gmail.com" value="{{ old('email', $getKontak->email) }}" required="required">
              @if($errors->has('email'))
                <code><span style="color:red; font-size:12px;">{{ $errors->first('email')}}</span></code>
              @endif
            </div>
          </div>
          <div class="item form-group {{ $errors->has('no_telp') ? 'has-error' : ''}}">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">No. Telp <span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="no_telp" class="form-control col-md-7 col-xs-12" name="no_telp" placeholder="Contoh: +62 765 789 669" type="text" value="{{ old('no_telp', $getKontak->no_telp) }}" required="required">
              @if($errors->has('no_telp'))
                <code><span style="color:red; font-size:12px;">{{ $errors->first('no_telp')}}</span></code>
              @endif
            </div>
          </div>
          <div class="ln_solid"></div>
          <div class="form-group">
            <div class="col-md-6 col-md-offset-3">
              <a href="{{ route('kontak.index') }}" class="btn btn-primary">Cancel</a>
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
  <script language="javascript">
      CKEDITOR.replace('alamat', {
        toolbar: [
        { name: 'clipboard', groups: [ 'clipboard', 'undo' ], items: [ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ] },
        { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ], items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat' ] },
        { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ], items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl', 'Language' ] },
        { name: 'links', items: [ 'Link', 'Unlink', 'Anchor' ] },
        { name: 'styles', items: [ 'Styles', 'Format', 'Font', 'FontSize' ] },
        { name: 'colors', items: [ 'TextColor', 'BGColor' ] },
      ]
      });
      CKEDITOR.instances[alamat].getData();
    </script>
@endsection
