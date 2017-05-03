@extends('backend.layout.master')

@section('title')
  <title>Aquasolve | Lihat Produk Kategori</title>
@endsection

@section('headscript')
<link href="{{ asset('backend/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('backend/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="page-title">
  <div class="title_left">
    <h3>{{ $getProdukKategori->nama_kategori }}</h3>
  </div>
</div>

<div class="clearfix"></div>

<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>{{ $getProdukKategori->nama_kategori }}</h2>
        <ul class="nav panel_toolbox">
          <a href="{{ route('produkKategori.ubah', $getProdukKategori->id) }}" class="btn btn-warning btn-sm">Ubah</a><a href="{{ route('produkKategori.index') }}" class="btn btn-primary btn-sm">Kembali</a>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <table class="table table-hover">
          <tbody>

          <tr>
            <td><strong>Produk Kategori</strong></td>
            <td>:</td>
            <td>{{ $getProdukKategori->nama_kategori }}</td>
          </tr>
          <tr>
            <td><strong>Deskripsi ID</strong></td>
            <td>:</td>
            <td>{!! $getProdukKategori->deskripsi_ID !!}</td>
          </tr>
          <tr>
            <td><strong>Deskripsi EN</strong></td>
            <td>:</td>
            <td>{!! $getProdukKategori->deskripsi_EN !!}</td>
          </tr>
          <tr>
            <td><strong>Gambar Produk</strong></td>
            <td>:</td>
            <td><img src="{{ asset('images/produk').'/'.$getProdukKategori->img_url }}" /></td>
          </tr>
          <tr>
            <td><strong>Gambar alt</strong></td>
            <td>:</td>
            <td>{{ $getProdukKategori->img_alt }}</td>
          </tr>
          <tr>
            <td><strong>Tanggal Post</strong></td>
            <td>:</td>
            <td>{!! ($getProdukKategori->tanggal_post <= date('Y-m-d')) ? "<span class='label label-success'>$getProdukKategori->tanggal_post</span>" : "<span class='label label-danger'>$getProdukKategori->tanggal_post</span>" !!}</td>
          </tr>
          <tr>
            <td><strong>Publish</strong></td>
            <td>:</td>
            <td>@if ($getProdukKategori->flag_publish == 1) <span class='label label-success'><i class="fa fa-thumbs-o-up"></i></span> @else <span class='label label-danger'><i class="fa fa-thumbs-o-down"></i></span> @endif</td>
          </tr>
        </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

@endsection
