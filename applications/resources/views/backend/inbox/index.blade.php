@extends('backend.layout.master')

@section('title')
  <title>Aquasolve | Inbox</title>
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
    <h3>Semua Inbox <small></small></h3>
  </div>
</div>

<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      <h2>Inbox </h2>
      <div class="clearfix"></div>
    </div>
    <div class="x_content table-responsive">
      <table id="inboxtabel" class="table table-striped table-bordered dt-responsive no-footer" width="100%">
        <thead>
          <tr role="row">
            <th>No</th>
            <th>Nama</th>
            <th>Subjek</th>
            <th>Email</th>
            <th>Pesan</th>
            <th>Diterima</th>
          </tr>
        </thead>
        <tbody>
          @php
            $no = 1;
          @endphp
          @foreach ($getInbox as $key)
          <tr>
            <td>{{ $no }}</td>
            <td>{{ $key->nama }}</td>
            <td>{{ $key->subjek }}</td>
            <td>{{ $key->email }}</td>
            <td>{{ $key->pesan }}</td>
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
  $('#inboxtabel').DataTable({
    "ordering": false,
  });
</script>
@endsection
