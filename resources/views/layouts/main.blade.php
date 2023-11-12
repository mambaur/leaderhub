<!doctype html>
<html lang="en">
  <head>
      @include('layouts.head', ['title' => @$title])
      @yield('styles')
  </head>
  <body>
    @include('layouts.navbar')
    @yield('content')
    @include('layouts.footer')
    @include('layouts.scripts')
    @yield('scripts')
  </body>
</html>