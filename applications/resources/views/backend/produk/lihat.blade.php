@extends('backend.layout.master')

@section('title')
  <title>Aquasolve | Lihat Produk</title>
@endsection

@section('headscript')
<link href="{{ asset('backend/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('backend/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="page-title">
  <div class="title_left">
    <h3>{{ $getProdukKategori->nama_kategori }} - {{ $getProduk->nama_produk }}</h3>
  </div>
</div>

<div class="clearfix"></div>

<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>{{ $getProduk->nama_produk }}</h2>
        <ul class="nav panel_toolbox">
          <a href="{{ route('produk.ubah', $getProduk->id) }}" class="btn btn-warning btn-sm">Ubah</a><a href="{{ route('produk.index') }}" class="btn btn-primary btn-sm">Kembali</a>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <table class="table table-hover">
          <tbody>

          <tr>
            <td><strong>Kategori Produk</strong></td>
            <td>:</td>
            <td>{{ $getProdukKategori->nama_kategori }}</td>
          </tr>
          <tr>
            <td><strong>Nama Produk</strong></td>
            <td>:</td>
            <td>{{ $getProduk->nama_produk }}</td>
          </tr>
          <tr>
            <td><strong>Deskripsi ID</strong></td>
            <td>:</td>
            <td>{!! $getProduk->deskripsi_ID !!}</td>
          </tr>
          <tr>
            <td><strong>Deskripsi EN</strong></td>
            <td>:</td>
            <td>{!! $getProduk->deskripsi_EN !!}</td>
          </tr>
          <tr>
            <td><strong>Ingredient</strong></td>
            <td>:</td>
            <td>{!! $getProduk->ingredient !!}</td>
          </tr>
          <tr>
            <td><strong>Nutrition Fact</strong></td>
            <td>:</td>
            <td>{!! $getProduk->nutrition_fact !!}</td>
          </tr>
          <tr>
            <td><strong>Gambar Produk Utama</strong></td>
            <td>:</td>
            <td><img src="{{ asset('images/produk').'/'.$getProduk->img_url }}"/></td>
          </tr>
          <tr>
            <td><strong>Deskripsi Gambar Utama</strong></td>
            <td>:</td>
            <td>{{ $getProduk->img_alt }}</td>
          </tr>
          <tr>
            <td><strong>Gambar Produk Kanan</strong></td>
            <td>:</td>
            <td><img src="{{ asset('images/produk').'/'.$getProduk->img_url_kanan }}"/></td>
          </tr>
          <tr>
            <td><strong>Deskripsi Gambar Kanan</strong></td>
            <td>:</td>
            <td>{{ $getProduk->img_alt_kanan }}</td>
          </tr>
          <tr>
            <td><strong>Gambar Produk Kiri</strong></td>
            <td>:</td>
            <td><img src="{{ asset('images/produk').'/'.$getProduk->img_url_kiri }}"/></td>
          </tr>
          <tr>
            <td><strong>Deskripsi Gambar Kiri</strong></td>
            <td>:</td>
            <td>{{ $getProduk->img_alt_kiri }}</td>
          </tr>
          <tr>
            <td><strong>Tanggal Post</strong></td>
            <td>:</td>
            <td>{!! ($getProduk->tanggal_post <= date('Y-m-d')) ? "<span class='label label-success'>$getProduk->tanggal_post</span>" : "<span class='label label-danger'>$getProduk->tanggal_post</span>" !!}</td>
          </tr>
          <tr>
            <td><strong>Publish</strong></td>
            <td>:</td>
            <td>@if ($getProduk->flag_publish == 1) <span class='label label-success'><i class="fa fa-thumbs-o-up"></i></span> @else <span class='label label-danger'><i class="fa fa-thumbs-o-down"></i></span> @endif</td>
          </tr>
        </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

@endsection
