@extends('backend.layout.master')

@section('title')
  <title>Aquasolve | Slider Home</title>
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
    <h3>Slider Home <small></small></h3>
  </div>
</div>

<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      <h2>Slider Home </h2>
      <ul class="nav panel_toolbox">
        <a href="{{ route('slider.tambah') }}" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Tambah Slider</a>
      </ul>
      <div class="clearfix"></div>
    </div>
    <div class="x_content table-responsive">
      <table id="slidertabel" class="table table-striped table-bordered dt-responsive no-footer" width="100%">
        <thead>
          <tr role="row">
            <th>No</th>
            <th>Image</th>
            <th>Image Description</th>
            <th>Tanggal Post</th>
            <th>Publish</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          @php
            $no = 1;
          @endphp
          @foreach ($getSlider as $key)
          <tr>
            <td>{{ $no }}</td>
            <td>{{ $key->nama_produk }}</td>
            <td>{{ $key->nama_kategori }}</td>
            <td>{{ $key->deskripsi_ID }}</td>
            <td>{{ $key->tanggal_post }}</td>
            <td>@if ($key->flag_publish == 1) Ya @else Tidak @endif</td>
            <td><a href="{{ route('produk.lihat', $key->id) }}" class="btn btn-xs btn-primary"><i class="fa fa-folder"></i> Lihat</a><a href="{{ route('produk.ubah', $key->id) }}" class="btn btn-xs btn-warning btn-sm"><i class="fa fa-pencil"></i> Ubah</a></td>
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

@endsection

@section('script')
<script src="{{ asset('backend/vendors/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('backend/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('backend/vendors/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('backend/vendors/datatables.net-scroller/js/datatables.scroller.min.js') }}"></script>
<script src="{{ asset('backend/vendors/pnotify/dist/pnotify.js') }}"></script>
<script src="{{ asset('backend/vendors/pnotify/dist/pnotify.nonblock.js') }}"></script>

<script type="text/javascript">
  $('#slidertabel').DataTable();
</script>
@endsection