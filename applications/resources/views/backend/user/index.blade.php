@extends('backend.layout.master')

@section('title')
  <title>Gofress | Profil</title>
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

<div class="modal fade modal-reset" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content alert-danger">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="myModalLabel2">Reset Password</h4>
      </div>
      <div class="modal-body">
        <h4>Yakin ?</h4>
        <p>Reset Password Akun ini?</p>
      </div>
      <div class="modal-footer">
        <a class="btn btn-primary" id="setReset">Ya</a>
      </div>

    </div>
  </div>
</div>

<div class="col-md-4 col-sm-4 col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      <h2>Buat Akun </h2>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">
      <form class="form-horizontal form-label-left" action="{{ route('users.new') }}" method="post">
        {{ csrf_field() }}
        <div class="item form-group {{ $errors->has('name') ? 'has-error' : ''}}">
          <label class="control-label col-md-2 col-sm-2 col-xs-12">Nama</label>
          <div class="col-md-8 col-sm-8 col-xs-12">
            <input id="name" type="text" name="name" value="{{ old('name') }}" class="form-control col-md-7 col-xs-12">
            @if($errors->has('name'))
              <code><span style="color:red; font-size:12px;">{{ $errors->first('name')}}</span></code>
            @endif
          </div>
        </div>
        <div class="item form-group  {{ $errors->has('email') ? 'has-error' : ''}}">
          <label class="control-label col-md-2 col-sm-2 col-xs-12">Email</label>
          <div class="col-md-8 col-sm-8 col-xs-12">
            <input id="email" type="email" name="email" value="{{ old('email') }}" class="form-control col-md-7 col-xs-12">
            @if($errors->has('email'))
              <code><span style="color:red; font-size:12px;">{{ $errors->first('email')}}</span></code>
            @endif
          </div>
        </div>
        <div class="ln_solid"></div>
        <div class="box-footer">
          <button id="send" type="submit" class="btn btn-success">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>
<div class="col-md-8 col-sm-8 col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      <h2>Daftar Pengguna </h2>
      <div class="clearfix"></div>
    </div>
    <div class="x_content table-responsive">
      <table id="usertabel" class="table table-striped table-bordered no-footer">
        <thead>
          <tr role="row">
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Avatar</th>
            <th>Konfirmasi</th>
            <th>Jumlah Login</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          @php
            $no = 1;
          @endphp
          @foreach ($getUsers as $key)
          <tr>
            <td>{{ $no }}</td>
            <td>{{ $key->name }}</td>
            <td>{{ $key->email }}</td>
            <td class="text-center"><img src="{{ asset('images/users').'/'.$key->avatar}}"></td>
            <td>@if ($key->confirmed == 1)
                  <span class="label label-success"><i class="fa fa-thumbs-o-up"></i></span>
                @else
                  <a href="" class="publish" data-value="{{ $key->id }}" data-toggle="modal" data-target=".modal-publish"><span class="label label-danger" data-toggle="tooltip" data-placement="top" title="Unpublish"><i class="fa fa-thumbs-o-down"></i></span></a>
                @endif
            </td>
            <td>{{ $key->login_count }}</td>
            <td>@if($key->id != Auth::user()->id)
                <a href="" class="reset" data-value="{{ $key->id }}" data-toggle="modal" data-target=".modal-reset"><span class="btn btn-xs btn-danger reset" data-toggle="tooltip" data-placement="top" title="Reset Password"><i class="fa fa-recycle"></i> </span></a>
            @else - @endif
            </td>
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
  $('#usertabel').DataTable();

  $(function(){
    $('a.reset').click(function(){
      var a = $(this).data('value');
      $('#setReset').attr('href', "{{ url('/') }}/admin/users/reset/"+a);
    });
  });
</script>
@endsection
