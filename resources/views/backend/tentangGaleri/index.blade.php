@extends('backend.layout.master')

@section('title')
  <title>Gofress | Tentang</title>
@endsection

@section('headscript')
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

<div class="modal fade modal-hapus" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content alert-danger">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="myModalLabel2">Hapus Certifications</h4>
      </div>
      <div class="modal-body">
        <h4>Yakin Hapus?</h4>
      </div>
      <div class="modal-footer">
        <a class="btn btn-primary" id="sethapus">Hapus</a>
      </div>

    </div>
  </div>
</div>


<div class="page-title">
  <div class="title_left">
    <h3><small>Certifications & Achievements</small></h3>
  </div>
</div>

<div class="clearfix"></div>
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Certifications & Achievements</h2>
        <ul class="nav panel_toolbox">
          <a href="{{ route('tentangGaleri.tambah') }}" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Tambah</a>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <p>Certification</p>
        @foreach ($getTentangGaleri as $cer)
        @if($cer->cer_ach == 1)
        <div class="col-md-55">
          <div class="thumbnail">
            <div class="image view view-first">
              <img style="width: 100%; display: block;" src="{{ asset('images/tentang').'/'.$cer->img_url }}" alt="image" />
              <div class="mask">
                <p>{{ $cer->img_url }}</p>
                <div class="tools tools-bottom">
                  <a href="{{ route('tentangGaleri.ubah', ['id' => $cer->id])}}"><i class="fa fa-pencil"></i></a>
                  <a href="" class="hapus" data-value="{{ $cer->id }}" data-toggle="modal" data-target=".modal-hapus"><i class="fa fa-times"></i></a>
                </div>
              </div>
            </div>
            <div class="caption">
              <p>{{ $cer->img_alt }}</p>
            </div>
          </div>
        </div>
        @endif
        @endforeach

        <div class="clearfix"></div>
        <p>Achievements</p>
        @foreach ($getTentangGaleri as $ach)
        @if($ach->cer_ach == 0)
        <div class="col-md-55">
          <div class="thumbnail">
            <div class="image view view-first">
              <img style="width: 100%; display: block;" src="{{ asset('images/tentang').'/'.$ach->img_url }}" alt="image" />
              <div class="mask">
                <p>{{ $ach->img_url }}</p>
                <div class="tools tools-bottom">
                  <a href="{{ route('tentangGaleri.ubah', ['id' => $ach->id])}}"><i class="fa fa-pencil"></i></a>
                  <a href="" class="hapus" data-value="{{ $ach->id }}" data-toggle="modal" data-target=".modal-hapus"><i class="fa fa-times"></i></a>
                </div>
              </div>
            </div>
            <div class="caption">
              <p>{{ $ach->img_alt }}</p>
            </div>
          </div>
        </div>
        @endif
        @endforeach
      </div>
    </div>
  </div>
</div>
@endsection

@section('script')
<script src="{{ asset('backend/vendors/pnotify/dist/pnotify.js') }}"></script>
<script src="{{ asset('backend/vendors/pnotify/dist/pnotify.nonblock.js') }}"></script>

<script type="text/javascript">
  $(function(){
    $('a.hapus').click(function(){
      var a = $(this).data('value');
      $('#sethapus').attr('href', "{{ url('/') }}/admin/tentang-galeri/delete/"+a);
    });
  });
</script>
@endsection
