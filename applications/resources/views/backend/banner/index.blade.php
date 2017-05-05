@extends('backend.layout.master')

@section('title')
  <title>Gofress | Banner</title>
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
      <h3>Banner<small></small></h3>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Banner</h2>
        @if ($getBanner->count() <= 4)
        <ul class="nav panel_toolbox">
          <a href="{{ route('banner.tambah') }}" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Tambah Banner</a>
        </ul>
        @endif
        <div class="clearfix"></div>
      </div>
      <div class="x_content table-responsive">
        <table id="bannertabel" class="table table-striped table-bordered dt-responsive no-footer" width="100%">
          <thead>
            <tr role="row">
              <th>No</th>
              <th>Banner Image</th>
              <th>Deskripsi Banner</th>
              <th>Halaman</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @php
              $no = 1;
            @endphp
            @foreach ($getBanner as $key)
            <tr>
              <td>{{ $no }}</td>
              <td><img style="display: block;" src="{{ url('images/banner/').'/'.$key->img_url }}" alt="" class="thumbnail"></td>
              <td>{{ $key->img_alt }}</td>
              <td>{{ $key->halaman }}</td>
              <td><a href="{{ route('banner.ubah', $key->id) }}" class="btn btn-xs btn-warning btn-sm"><i class="fa fa-pencil"></i> Ubah</a></td>
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
  $('#bannertabel').DataTable({
    "ordering": false
  });
</script>
@endsection
