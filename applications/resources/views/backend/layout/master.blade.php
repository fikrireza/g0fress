<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
@yield('title')
@include('backend.includes.head')
    @yield('headscript')
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">

        @include('backend.includes.sidebar')

        @include('backend.includes.header')

        <!-- page content -->
        <div class="right_col" role="main">
        @yield('content')
        </div>

        <footer>
          @include('backend.includes.footer')
        </footer>
      </div>
    </div>


    @include('backend.includes.bottomscript')
    @yield('script')
  </body>
</html>
