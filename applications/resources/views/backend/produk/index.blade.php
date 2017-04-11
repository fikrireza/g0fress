@extends('backend.layout.master')

@section('title')
  <title>Aquasolve | Dashboard</title>
@endsection

@section('headscript')
<link href="{{ asset('backend/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('backend/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="page-title">
  <div class="title_left">
    <h3>Semua Produk <small></small></h3>
  </div>
</div>


<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      <h2>Produk </h2>
      <ul class="nav panel_toolbox">
        <a href="{{ route('produk.tambah') }}" class="btn btn-success btn-sm">Tambah Produk</a>
      </ul>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">
      <table id="produktabel" class="table table-striped table-bordered dt-responsive nowrap no-footer" role="grid" aria-describedby="datatable_info">
        <thead>
          <tr role="row">
            <th>No</th>
            <th>Produk</th>
            <th>Deskripsi</th>
            <th>Produk Kategori</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          @php
            $no = 1;
          @endphp
          @foreach ($getProduk as $key)
          <tr>
            <td>{{ $no }}</td>
            <td>{{ $key->nama_produk }}</td>
            <td>{{ $key->deskripsi_id}}</td>
            <td>{{ $key->produk_kategori}}</td>
            <td></td>
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


<script type="text/javascript">
  $('#produktabel').DataTable();
</script>
@endsection
