<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.layouts.head', ['title' => @$title])
    @yield('styles')
</head>

<body>
    @include('sweetalert::alert')
    <div class="container-scroller">
        @include('admin.layouts.navbar')
        <div class="container-fluid page-body-wrapper">
            @include('admin.layouts.sidebar', ['menu' => @$menu, 'submenu' => @$submenu])
            <div class="main-panel">
                @yield('content')
                @include('admin.layouts.footer')
            </div>
        </div>
    </div>

    @include('admin.layouts.scripts')
    @yield('scripts')
</body>

</html>
