<!doctype html>
<html lang="en">
  <head>
    
    @include('subs.header')

    <style>
        html, body {
            overflow-x: hidden;
            padding: 0;
            margin: 0;
            background-image: linear-gradient(rgba(60, 56, 56, 0.5), rgba(35, 33, 33, 0.5)), url('{{ asset("images/img3.jpg") }}');/
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;
            height: 100%;
        }
    </style>

    <title>@yield('title-login')</title>

  </head>
  <body>
    
    <div id="wrapper-login">
      @stack('styles')

      @yield('content-login')

      @include('subs.footerScript')
      @stack('scripts')
    </div>

  </body>
</html>