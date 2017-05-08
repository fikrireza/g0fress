<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
  </head>
  <body>
    <p>
      Hai, {{ $data[0]['name'] }}.
    </p>

    <p>
      Password anda telah di reset pada akun CMS Gofress.co.id.
      <br>Silahkan login dengan
      <br><br>
      Email : {{ $data[0]['email'] }}
      Password : 12345678
      <br><br>
      <br><br>

      <a href="{{ URL::to('admin/login') }}">
        {{ URL::to('admin/login/') }}
      </a>
    </p>

  </body>
</html>
