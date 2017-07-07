@extends('backend.layout.master')

@section('title')
  <title>Gofress | Produk Kategori</title>
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

<div class="modal fade modal-unpublish" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content alert-danger">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="myModalLabel2">Unpublish Produk Kategori</h4>
      </div>
      <div class="modal-body">
        <h4>Yakin ?</h4>
        <p>Tidak akan menampilkan Kategori Produk dan Produk</p>
      </div>
      <div class="modal-footer">
        <a class="btn btn-primary" id="setUnpublish">Ya</a>
      </div>

    </div>
  </div>
</div>

<div class="modal fade modal-publish" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="myModalLabel2">Publish Produk Kategori</h4>
      </div>
      <div class="modal-body">
        <h4>Yakin ?</h4>
      </div>
      <div class="modal-footer">
        <a class="btn btn-primary" id="setPublish">Ya</a>
      </div>

    </div>
  </div>
</div>


<div class="page-title">
  <div class="title_left">
    <h3>Semua Produk Kategori <small></small></h3>
  </div>
</div>

<div class="clearfix"></div>
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Produk Kategori</h2>
        <ul class="nav panel_toolbox">
          <a href="{{ route('produkKategori.tambah') }}" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Tambah</a>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content table-responsive">
        <table id="produktabel" class="table table-striped table-bordered no-footer" width="100%">
          <thead>
            <tr role="row">
              <th>No</th>
              <th>Produk Kategori</th>
              <th>Deskripsi</th>
              <th>Tanggal Post</th>
              <th>Publish</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @php
              $no = 1;
            @endphp
            @foreach ($getProdukKategori as $key)
            <tr>
              <td>{{ $no }}</td>
              <td>{{ $key->nama_kategori }}</td>
              <td>{!! $key->deskripsi_ID !!}</td>
              <td>{!! ($key->tanggal_post <= date('Y-m-d')) ? "<span class='label label-success'>$key->tanggal_post</span>" : "<span class='label label-danger'>$key->tanggal_post</span>" !!}</td>
              <td>@if ($key->flag_publish == 1)
                    <a href="" class="unpublish" data-value="{{ $key->id }}" data-toggle="modal" data-target=".modal-unpublish"><span class="label label-success" data-toggle="tooltip" data-placement="top" title="Publish"><i class="fa fa-thumbs-o-up"></i></span></a>
                  @else
                    <a href="" class="publish" data-value="{{ $key->id }}" data-toggle="modal" data-target=".modal-publish"><span class="label label-danger" data-toggle="tooltip" data-placement="top" title="Unpublish"><i class="fa fa-thumbs-o-down"></i></span></a>
                  @endif
              </td>
              <td><a href="{{ route('produkKategori.lihat', $key->id) }}" class="btn btn-xs btn-primary" data-toggle="tooltip" data-placement="top" title="Lihat"><i class="fa fa-folder"></i> </a> <a href="{{ route('produkKategori.ubah', $key->id) }}" class="btn btn-xs btn-warning btn-sm" data-toggle="tooltip" data-placement="top" title="Ubah"><i class="fa fa-pencil"></i> </a></td>
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
  $('#produktabel').DataTable();

  $(function(){
    $('#produktabel').on('click', 'a.unpublish', function(){
      var a = $(this).data('value');
      $('#setUnpublish').attr('href', "{{ url('/') }}/admin/produk-kategori/publish/"+a);
    });
  });

  $(function(){
    $('#produktabel').on('click', 'a.publish', function(){
      var a = $(this).data('value');
      $('#setPublish').attr('href', "{{ url('/') }}/admin/produk-kategori/publish/"+a);
    });
  });
</script>
@endsection
