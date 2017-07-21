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
      Anda telah didaftarkan sebagai admin CMS Gofress.co.id.
      <br>Silahkan klik link berikut untuk aktifasi akun kamu :<br><br>
      Dengan Password : 12345678<br><br>
      <a href="{{ URL::to('admin/verify/' . $data[0]['confirmation_code']) }}">
        {{ URL::to('admin/verify/' . $data[0]['confirmation_code']) }}
      </a>
    </p>

  </body>
</html>
