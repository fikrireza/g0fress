@extends('backend.layout.master')

@section('title')
  <title>Gofress | Kontak</title>
@endsection

@section('headscript')

@endsection

@section('content')

<div class="row">
  <div class="page-title">
    <div class="title_left">
      <h3>Kontak <small></small></h3>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Kontak </h2>
        <ul class="nav panel_toolbox">
          @if ($getKontak->count() <= 1)
          <a href="{{ route('kontak.tambah') }}" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Tambah Kontak</a>
          @endif
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
      @foreach ($getKontak as $key)
        <div class="col-md-6 col-sm-6 col-xs-12 profile_details">
          <div class="well profile_view">
            <div class="col-sm-12">
              <h4 class="brief"><b>{{ $key->kantor_kategori }}</b></h4>
              <div class="ln_solid"></div>
              <div class="form-horizontal">
                <div class="item form-group">
                  <label class="col-md-4 col-sm-4 col-xs-12"><i class="fa fa-envelope"></i> Email </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    {{ $key->email}}
                  </div>
                </div>
                <div class="item form-group">
                  <label class="col-md-4 col-sm-4 col-xs-12"><i class="fa fa-building"></i> Address </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    {!! $key->alamat !!}
                  </div>
                </div>
                <div class="item form-group">
                  <label class="col-md-4 col-sm-4 col-xs-12"><i class="fa fa-phone"></i> Phone </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    {{ $key->no_telp }}
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xs-12 bottom text-center">
              <div class="col-xs-12">
                <a href="{{ route('kontak.ubah', ['id' => $key->id]) }}" class="btn btn-xs btn-warning btn-sm pull-right">
                  <i class="fa fa-pencil"> </i> Ubah
                </a>
              </div>
            </div>
          </div>
        </div>
      @endforeach
      </div>
    </div>
  </div>
</div>

@endsection

@section('script')

@endsection
