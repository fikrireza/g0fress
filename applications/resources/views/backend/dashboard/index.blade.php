@extends('backend.layout.master')

@section('title')
  <title>Gofress | Dashboard</title>
@endsection

@section('content')

@if(Session::has('firstLogin'))
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
      <strong>{{ Session::get('firstLogin') }}</strong>
    </div>
  </div>
</div>
@endif

{{ $getProduk }}
{{ $getProdukKategori }}
{{ $getNews }}
{{ $getProgram }}
{{ $getProgramKategori }}
{{ $getSlider }}


@endsection
