<!DOCTYPE html>
<html>

<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8">
    <title>Hono Shop | @yield('title')</title>

    @include('admin.includes.css')

    <style>
        @yield('style');

    </style>
</head>

<body>
    @include('admin.includes.loader')

    @include('admin.layouts.header')

    @include('admin.includes.layoutSetting')

    @include('admin.includes.sidebar')
    <div class="mobile-menu-overlay"></div>

    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            @yield('content-header')
            @yield('content')
            <div class="footer-wrap pd-20 mb-20 card-box">
                DeskApp - Design by <a href="https://www.facebook.com/hoannguyen17"
                    target="_blank">Nguyễn Văn Hoàng</a>
            </div>
        </div>
    </div>

</body>

    @include('admin.includes.script')
    @yield('custom-scripts')
</html>
