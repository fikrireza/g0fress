@extends('backend.layout.master')

@section('title')
  <title>Gofress | Program & Events Kategori</title>
@endsection

@section('headscript')
<link href="{{ asset('backend/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('backend/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css') }}" rel="stylesheet">
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
    <h3>Semua Program & Events Kategori<small></small></h3>
  </div>
</div>

<div class="clearfix"></div>
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Program & Events Kategori</h2>
        <ul class="nav panel_toolbox">
          <a href="{{ route('programEventsKategori.tambah') }}" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Tambah Program & Events Kategori</a>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content table-responsive">
        <table id="programEventstabel" class="table table-striped table-bordered no-footer" width="100%">
          <thead>
            <tr role="row">
              <th>No</th>
              <th>Kategori Program Events</th>
              <th>Publish</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @php
              $no = 1;
            @endphp
            @foreach ($getProgramEventsKategori as $key)
            <tr>
              <td>{{ $no }}</td>
              <td>{{ $key->judul_kategori_ID }}</td>
              <td>@if ($key->flag_publish == 1) <span class='label label-success'><i class="fa fa-thumbs-o-up"></i></span> @else <span class='label label-danger'><i class="fa fa-thumbs-o-down"></i></span> @endif</td>
              <td><a href="{{ route('programEventsKategori.lihat', $key->id) }}" class="btn btn-xs btn-primary"><i class="fa fa-folder"></i> Lihat</a><a href="{{ route('programEventsKategori.ubah', $key->id) }}" class="btn btn-xs btn-warning btn-sm"><i class="fa fa-pencil"></i> Ubah</a></td>
            </tr>
            @php
              $no++;
            @endphp
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

@endsection

@section('script')
<script src="{{ asset('backend/vendors/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('backend/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('backend/vendors/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('backend/vendors/datatables.net-scroller/js/datatables.scroller.min.js') }}"></script>
<script src="{{ asset('backend/vendors/pnotify/dist/pnotify.js') }}"></script>
<script src="{{ asset('backend/vendors/pnotify/dist/pnotify.nonblock.js') }}"></script>

<script type="text/javascript">
  $('#programEventstabel').DataTable();
</script>
@endsection
