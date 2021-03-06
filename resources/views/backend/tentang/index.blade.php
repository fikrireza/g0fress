@extends('backend.layout.master')

@section('title')
  <title>Gofress | Tentang</title>
@endsection

@section('headscript')
<link href="{{ asset('backend/vendors/pnotify/dist/pnotify.css') }}" rel="stylesheet">
<link href="{{ asset('backend/vendors/pnotify/dist/pnotify.nonblock.css') }}" rel="stylesheet">
@endsection

@section('content')

@if(Session::has('berhasil'))
<script>
  window.setTimeout(function() {
    $(".alert-success").fadeTo(700, 0).slideUp(700, function(){
        $(this).remove();
    });
  }, 5000);
</script>
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="alert alert-success alert-dismissible fade in" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
      </button>
      <strong>{{ Session::get('berhasil') }}</strong>
    </div>
  </div>
</div>
@endif

<div class="page-title">
  <div class="title_left">
    <h3>Tentang <small>Visi & Misi</small></h3>
  </div>
</div>

<div class="clearfix"></div>
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Tentang</h2>
        <ul class="nav panel_toolbox">
          @if ($getTentang->isEmpty())
          <a href="{{ route('tentang.tambah') }}" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Tambah</a>
          @else
          <a href="{{ route('tentang.ubah', $getTentang[0]->id) }}" class="btn btn-large btn-warning btn-sm pull-right"><i class="fa fa-pencil"></i> Ubah</a>
          @endif
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content table-responsive">
        @if($getTentang->isEmpty())

        @else
        <div class="col-md-8 col-lg-8 col-sm-7">
          <blockquote>
            {!! $getTentang[0]->visi_deskripsi_ID!!}
            <footer>Visi ID</footer>
          </blockquote>

          <blockquote class="blockquote-reverse">
            {!! $getTentang[0]->visi_deskripsi_EN !!}
            <footer>Visi EN</footer>
          </blockquote>
            <hr>
          <blockquote>
            {!! $getTentang[0]->misi_deskripsi_ID!!}
            <footer>Misi ID</footer>
          </blockquote>

          <blockquote class="blockquote-reverse">
            {!! $getTentang[0]->misi_deskripsi_EN !!}
            <footer>Misi EN</footer>
          </blockquote>
        </div>
        <div class="col-md-4 col-lg-4 col-sm-5">
          Deskripsi ID
          <b>{!! $getTentang[0]->deskripsi_ID !!}</b>
          <hr>
          Deskripsi EN
          <b>{!! $getTentang[0]->deskripsi_EN !!}</b>
        </div>

        <div class="clearfix"></div>
        <hr>
        <div class="col-md-12">
          <a href="{{ route('tentang.ubah', $getTentang[0]->id) }}" class="btn btn-large btn-warning btn-sm pull-right"><i class="fa fa-pencil"></i> Ubah</a>
        </div>

        @endif
      </div>
    </div>
  </div>
</div>
@endsection

@section('script')
<script src="{{ asset('backend/vendors/pnotify/dist/pnotify.js') }}"></script>
<script src="{{ asset('backend/vendors/pnotify/dist/pnotify.nonblock.js') }}"></script>
@endsection
