<!doctype html>
<html lang="en">
  <head>
    
    @include('subs.header')

    <style>
        body {
          overflow-x: hidden;
        }
        html, body {
            padding: 0;
            margin: 0;
            background: #191919;
            height: 100%;
        }

        #mainLogin-content {
          margin-left: 0px;
        }

      @media (max-width: 576px) {}

      @media (min-width: 720px) {}

      @media (min-width: 992px) {
        #mainLogin-content {
          margin-left: 160px;
        }
      }

      @media (min-width: 1200px) {}

      @media (min-width: 1400px) {}
    </style>

    <title>@yield('title')</title>

  </head>
  <body>
    
    <div id="wrapper">
      @stack('styles')

      @include('admin.subs.menuAdmin')

      <div id="mainLogin-content">
        @yield('content')
      </div>

      @include('subs.footerScript')
      @stack('scripts')
    </div>

  </body>
</html>