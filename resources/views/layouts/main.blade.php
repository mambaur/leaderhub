<!doctype html>
<html lang="en">

<head>
    @include('layouts.head', ['title' => @$title])
    <meta name="robots" content="index, follow">
    <meta name="language" content="Indonesia">
    <meta name="revisit-after" content="5 days">
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ url()->full() }}" />
    @yield('meta')
    @yield('styles')
</head>

<body>
    @include('layouts.navbar', ['menu' => @$menu])
    @yield('content')
    @include('layouts.footer')
    @include('layouts.scripts')
    @yield('scripts')
</body>

</html>
