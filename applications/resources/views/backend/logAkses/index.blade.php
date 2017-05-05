@extends('backend.layout.master')

@section('title')
  <title>Gofress | Log Akses</title>
@endsection

@section('headscript')
<link href="{{ asset('backend/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('backend/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('backend/vendors/pnotify/dist/pnotify.css') }}" rel="stylesheet">
<link href="{{ asset('backend/vendors/pnotify/dist/pnotify.nonblock.css') }}" rel="stylesheet">
@endsection

@section('content')

<div class="page-title">
  <div class="title_left">
    <h3>Semua Log Akses <small></small></h3>
  </div>
</div>

<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      <h2>Log Akses </h2>
      <div class="clearfix"></div>
    </div>
    <div class="x_content table-responsive">
      <table id="logtabel" class="table table-striped table-bordered dt-responsive no-footer" width="100%">
        <thead>
          <tr role="row">
            <th>No</th>
            <th>Nama</th>
            <th>Aksi</th>
            <th>Tanggal</th>
          </tr>
        </thead>
        <tbody>
          @php
            $no = 1;
          @endphp
          @foreach ($getLogAkses as $key)
          <tr>
            <td>{{ $no }}</td>
            <td>{{ $key->actor_name }}</td>
            <td>{{ $key->aksi }}</td>
            <td>{{ $key->created_at }}</td>
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
  $('#logtabel').DataTable({
    "ordering": false,
  });
</script>
@endsection
