@extends('backend.layout.master')

@section('title')
  <title>Gofress | Ubah Distribution Maps</title>
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
        <h2>Ubah Distribution Maps<small></small></h2>
        <ul class="nav panel_toolbox">
          <a href="{{ route('distribution.index') }}" class="btn btn-primary btn-sm">Kembali</a>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <form action="{{ route('distribution.edit') }}" method="POST" class="form-horizontal form-label-left">
          {{ csrf_field() }}
          <div class="item form-group {{ $errors->has('id_provinsi') ? 'has-error' : ''}}">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Provinsi <span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="hidden" name="id" value="{{ $getDistribution->id }}">
              <select class="form-control select2_single" name="id_provinsi">
                <option value="">Pilih</option>
                @foreach ($getKota as $key)
                  <option value="{{ $key->id }}" {{ $key->id == old('id_provinsi', $getDistribution->id_provinsi) ? 'selected' : '' }}>{{ $key->nama_kota }}</option>
                @endforeach
              </select>
              @if($errors->has('id_provinsi'))
                <code><span style="color:red; font-size:12px;">{{ $errors->first('id_provinsi')}}</span></code>
              @endif
            </div>
          </div>
          <div class="item form-group {{ $errors->has('nama_kota') ? 'has-error' : ''}}">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nama Kota <span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="nama_kota" class="form-control" name="nama_kota" placeholder="Contoh: " required="required" type="text" value="{{ old('nama_kota', $getDistribution->nama_kota) }}">
              @if($errors->has('nama_kota'))
                <code><span style="color:red; font-size:12px;">{{ $errors->first('nama_kota')}}</span></code>
              @endif
            </div>
          </div>
          <div class="ln_solid"></div>
          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Publish <span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <label>
                <input type="checkbox" class="flat" name="flag_publish" {{ $getDistribution->flag_publish == 1 ? 'checked' : ''}} />
              </label>
            </div>
          </div>
          <div class="ln_solid"></div>
          <div class="form-group">
            <div class="col-md-6 col-md-offset-3">
              <a href="{{ route('distribution.index') }}" class="btn btn-primary">Cancel</a>
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
<script src="{{ asset('backend/vendors/iCheck/icheck.min.js')}}"></script>
<script src="{{ asset('backend/vendors/switchery/dist/switchery.min.js')}}"></script>
<script type="text/javascript">
$(".select2_single").select2({
  placeholder: "Pilih Provinsi",
  allowClear: true
});
</script>
@endsection
