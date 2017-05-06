@extends('backend.layout.master')

@section('title')
  <title>Gofress | Lihat Program & Events</title>
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
      <div class="x_content table-responsive">
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
            <td>{!! $getProgramEvents->deskripsi_ID !!}</td>
          </tr>
          <tr>
            <td><strong>Deskripsi EN</strong></td>
            <td>:</td>
            <td>{!! $getProgramEvents->deskripsi_EN !!}</td>
          </tr>
          <tr>
            <td><strong>Gambar Produk</strong></td>
            <td>:</td>
            <td>@if ($getProgramEvents->img_url != null)
              <img src="{{ asset('images/programEvent/').'/'.$getProgramEvents->img_url }}" class="thumbnail"/> @else - @endif</td>
          </tr>
          <tr>
            <td><strong>Gambar alt</strong></td>
            <td>:</td>
            <td>{{ $getProgramEvents->img_alt }}</td>
          </tr>
          <tr>
            <td><strong>Video Url</strong></td>
            <td>:</td>
            <td>{{ $getProgramEvents->video_url }}<br>
              @php
        				$url = $getProgramEvents->video_url;
        				$step1=explode('v=', $url);
        				$step2 =explode('&',$step1[1]);
        				$vedio_id = $step2[0];
        			@endphp
        			<iframe class="youtube-embed" src="http://www.youtube.com/embed/{{ $vedio_id }}" frameborder="0" allowfullscreen></iframe>

            </td>
          </tr>
          <tr>
            <td><strong>Show Home Page</strong></td>
            <td>:</td>
            <td>@if ($getProgramEvents->show_homepage == 1) <span class='label label-success'><i class="fa fa-thumbs-o-up"></i></span> @else <span class='label label-danger'><i class="fa fa-thumbs-o-down"></i></span> @endif</td>
          </tr>
          <tr>
            <td><strong>Tanggal Post</strong></td>
            <td>:</td>
            <td>{!! ($getProgramEvents->tanggal_post <= date('Y-m-d')) ? "<span class='label label-success'>$getProgramEvents->tanggal_post</span>" : "<span class='label label-danger'>$getProgramEvents->tanggal_post</span>" !!}</td>
          </tr>
          <tr>
            <td><strong>Publish</strong></td>
            <td>:</td>
            <td>@if ($getProgramEvents->flag_publish == 1) <span class='label label-success'><i class="fa fa-thumbs-o-up"></i></span> @else <span class='label label-danger'><i class="fa fa-thumbs-o-down"></i></span> @endif</td>
          </tr>
        </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

@endsection
