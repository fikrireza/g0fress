@extends('backend.layout.master')

@section('title')
  <title>Aquasolve | Lihat Program & Events</title>
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
          <a href="{{ route('programEvents.ubah', $getProgramEvents->id) }}" class="btn btn-warning btn-sm">Ubah</a><a href="{{ route('programEvents.index') }}" class="btn btn-primary btn-sm">Kembali</a>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <table class="table table-hover">
          <thead>
            <tr>
              <th colspan="3"><h2>{{ $getProgramEvents->judul_promosi_ID }}</h2></th>
            </tr>
          </thead>
          <tbody>
          <tr>
            <td><strong>Kategori Program & Events</strong></td>
            <td>:</td>
            <td>{{ $getProgramEvents->judul_kategori_ID }}</td>
          </tr>
          <tr>
            <td><strong>Judul ID</strong></td>
            <td>:</td>
            <td>{{ $getProgramEvents->judul_promosi_ID }}</td>
          </tr>
          <tr>
            <td><strong>Judul EN</strong></td>
            <td>:</td>
            <td>{{ $getProgramEvents->judul_promosi_EN }}</td>
          </tr>
          <tr>
            <td><strong>Deskripsi ID</strong></td>
            <td>:</td>
            <td>{{ $getProgramEvents->deskripsi_ID }}</td>
          </tr>
          <tr>
            <td><strong>Deskripsi EN</strong></td>
            <td>:</td>
            <td>{{ $getProgramEvents->deskripsi_EN }}</td>
          </tr>
          <tr>
            <td><strong>Gambar Produk</strong></td>
            <td>:</td>
            <td><img src="{{ asset('').$getProgramEvents->img_url }}" /></td>
          </tr>
          <tr>
            <td><strong>Gambar alt</strong></td>
            <td>:</td>
            <td>{{ $getProgramEvents->img_alt }}</td>
          </tr>
          <tr>
            <td><strong>Show Home Page</strong></td>
            <td>:</td>
            <td>{{ ($getProgramEvents->flag_publish == 1) ? 'Ya' : 'Tidak' }}</td>
          </tr>
          <tr>
            <td><strong>Tanggal Post</strong></td>
            <td>:</td>
            <td>{{ $getProgramEvents->tanggal_post }}</td>
          </tr>
          <tr>
            <td><strong>Publish</strong></td>
            <td>:</td>
            <td>{{ ($getProgramEvents->flag_publish == 1) ? 'Ya' : 'Tidak'}}</td>
          </tr>
        </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

@endsection
