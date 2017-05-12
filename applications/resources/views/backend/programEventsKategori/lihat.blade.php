@extends('backend.layout.master')

@section('title')
  <title>Gofress | Lihat Program & Events Kategori</title>
@endsection

@section('headscript')
<link href="{{ asset('backend/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('backend/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="page-title">
  <div class="title_left">
    <h3></h3>
  </div>
</div>

<div class="clearfix"></div>

<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2></h2>
        <ul class="nav panel_toolbox">
          <a href="{{ route('programEventsKategori.ubah', $getProgramEventsKategori->id) }}" class="btn btn-warning btn-sm">Ubah</a><a href="{{ route('programEventsKategori.index') }}" class="btn btn-primary btn-sm">Kembali</a>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content table-responsive">
        <table class="table table-hover">
          <thead>
            <tr>
              <th colspan="3"><h2>{{ $getProgramEventsKategori->judul_kategori_ID }}</h2></th>
            </tr>
          </thead>
          <tbody>
          <tr>
            <td><strong>Judul ID</strong></td>
            <td>:</td>
            <td>{{ $getProgramEventsKategori->judul_kategori_ID }}</td>
          </tr>
          <tr>
            <td><strong>Judul EN</strong></td>
            <td>:</td>
            <td>{{ $getProgramEventsKategori->judul_kategori_EN }}</td>
          </tr>
          <tr>
            <td><strong>Gambar</strong></td>
            <td>:</td>
            <td>@if ($getProgramEventsKategori->img_url != null)
              <img src="{{ asset('images/programEvent/').'/'.$getProgramEventsKategori->img_url }}" /> @else - @endif</td>
          </tr>
          <tr>
            <td><strong>Gambar alt</strong></td>
            <td>:</td>
            <td>{{ ($getProgramEventsKategori->img_alt != null) ? $getProgramEventsKategori->img_alt : '-' }}</td>
          </tr>
          <tr>
            <td><strong>Publish</strong></td>
            <td>:</td>
            <td>@if ($getProgramEventsKategori->flag_publish == 1) <span class='label label-success'><i class="fa fa-thumbs-o-up"></i></span> @else <span class='label label-danger'><i class="fa fa-thumbs-o-down"></i></span> @endif</td>
          </tr>
        </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

@endsection
