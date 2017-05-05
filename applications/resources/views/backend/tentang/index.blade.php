@extends('backend.layout.master')

@section('title')
  <title>Gofress | Tentang</title>
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

<div class="row">
  <div class="page-title">
    <div class="title_left">
      <h3>Tentang <small></small></h3>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Tentang </h2>
        <ul class="nav panel_toolbox">
          @if ($getTentang->isEmpty())
          <a href="{{ route('tentang.tambah') }}" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Tambah Tentang</a>
          @endif
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content table-responsive">
        <table id="tentangtable" class="table table-striped table-bordered dt-responsive no-footer" width="100%">
          <thead>
            <tr role="row">
              <th>No</th>
              <th>Tentang</th>
              <th>Visi</th>
              <th>Misi</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @php
              $no = 1;
            @endphp
            @foreach ($getTentang as $key)
            <tr>
              <td>{{ $no }}</td>
              <td>{!! $key->deskripsi_ID !!}</td>
              <td>{!! $key->visi_deskripsi_ID !!}</td>
              <td>{!! $key->misi_deskripsi_ID !!}</td>
              <td><a href="{{ route('tentang.ubah', $key->id) }}" class="btn btn-xs btn-warning btn-sm"><i class="fa fa-pencil"></i> Ubah</a></td>
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
  $('#tentangtable').DataTable();
</script>
@endsection
