@extends('backend.layout.master')

@section('title')
  <title>Aquasolve | Lihat News</title>
@endsection

@section('headscript')
<link href="{{ asset('backend/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('backend/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="page-title">
  <div class="title_left">
    <h3>News - {{ $getNews->judul_ID }}</h3>
  </div>
</div>

<div class="clearfix"></div>

<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>{{ $getNews->judul_ID }}</h2>
        <ul class="nav panel_toolbox">
          <a href="{{ route('news.ubah', $getNews->id) }}" class="btn btn-warning btn-sm">Ubah</a><a href="{{ route('news.index') }}" class="btn btn-primary btn-sm">Kembali</a>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <table class="table table-hover">
          <tbody>

          <tr>
            <td><strong>Judul ID</strong></td>
            <td>:</td>
            <td>{{ $getNews->judul_ID }}</td>
          </tr>
          <tr>
            <td><strong>Judul EN</strong></td>
            <td>:</td>
            <td>{{ $getNews->judul_EN }}</td>
          </tr>
          <tr>
            <td><strong>Deskripsi ID</strong></td>
            <td>:</td>
            <td>{!! $getNews->deskripsi_ID !!}</td>
          </tr>
          <tr>
            <td><strong>Deskripsi EN</strong></td>
            <td>:</td>
            <td>{!! $getNews->deskripsi_EN !!}</td>
          </tr>
          <tr>
            <td><strong>Gambar Produk</strong></td>
            <td>:</td>
            <td>@if (!$getNews->img_url) -
                @else <img src="{{ asset('images/news').'/'.$getNews->img_url }}"/> @endif</td>
          </tr>
          <tr>
            <td><strong>Gambar alt</strong></td>
            <td>:</td>
            <td>@if (!$getNews->img_alt) - @else {{ $getNews->img_alt }} @endif</td>
          </tr>
          <tr>
            <td><strong>Video URL</strong></td>
            <td>:</td>
            <td>@if (!$getNews->video_url) - @else {{ $getNews->video_url }} @endif <br>
              @if ($getNews->video_url != null)
                  @php
                    $url = $getNews->video_url;
                    $step1=explode('v=', $url);
                    $step2 =explode('&',$step1[1]);
                    $vedio_id = $step2[0];
                  @endphp
                  <iframe class="youtube-embed" src="http://www.youtube.com/embed/{{ $vedio_id }}" frameborder="0" allowfullscreen></iframe>
              @endif
            </td>
          </tr>
          <tr>
            <td><strong>Show Home Page</strong></td>
            <td>:</td>
            <td>@if ($getNews->show_homepage == 1) <span class='label label-success'><i class="fa fa-thumbs-o-up"></i></span> @else <span class='label label-danger'><i class="fa fa-thumbs-o-down"></i></span> @endif</td>
          </tr>
          <tr>
            <td><strong>Tanggal Post</strong></td>
            <td>:</td>
            <td>{!! ($getNews->tanggal_post <= date('Y-m-d')) ? "<span class='label label-success'>$getNews->tanggal_post</span>" : "<span class='label label-danger'>$getNews->tanggal_post</span>" !!}</td>
          </tr>
          <tr>
            <td><strong>Publish</strong></td>
            <td>:</td>
            <td>@if ($getNews->flag_publish == 1) <span class='label label-success'><i class="fa fa-thumbs-o-up"></i></span> @else <span class='label label-danger'><i class="fa fa-thumbs-o-down"></i></span> @endif</td>
          </tr>
        </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

@endsection
