<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Aquasolve | Verify Akun</title>

    <link href="{{ asset('backend/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">

    <link href="{{ asset('backend/css/custom.min.css') }}" rel="stylesheet">
  </head>

  <body class="login">
    <div>
    @if(Session::has('filedLogin'))
      <script>
      window.setTimeout(function() {
        $(".alert-danger").fadeTo(700, 0).slideUp(700, function(){
          $(this).remove();
        });
      }, 5000);
      </script>
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="alert alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
            </button>
            <strong>{{ Session::get('filedLogin') }}</strong>
          </div>
        </div>
      </div>
    @endif

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form action="{{ route('verify.store') }}" method="POST">
              <h1>Verifikasi Akun</h1>
              {{ csrf_field() }}
              <input type="hidden" name="confirmation_code" value="{{ $getUser->confirmation_code }}">
              <div class="form-group has-feedback {{ $errors->has('email') ? 'has-error' : '' }}">
                <input name="email" type="text" class="form-control" placeholder="Email" value="{{ old('email', $getUser->email) }}" readonly="">
                @if ($errors->has('email'))
                  <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                @endif
              </div>
              <div class="form-group has-feedback {{ $errors->has('password') ? 'has-error' : '' }}">
                <input name="password" type="password" class="form-control" placeholder="Password" value="{{ old('password') }}">
                @if($errors->has('password'))
                  <code><span style="color:red; font-size:12px;">{{ $errors->first('password')}}</span></code>
                @endif
                @if ($errors->has('password'))
                  <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                @endif
              </div>
              <div class="row">
                <div class="col-xs-12">
                  <button type="submit" class="btn btn-primary btn-block btn-flat">Log In</button>
                </div>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <div>
                  <h1>Aquasolve - Gofress | <a href="http://amadeo.id"></a>Amadeo.id</h1>
                  <p>©2017 All Rights Reserved.</p>
                </div>
              </div>
            </form>
          </section>
        </div>

      </div>
    </div>
  </body>
</html>
