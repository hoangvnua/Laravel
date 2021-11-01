<!DOCTYPE html>
<html lang="zxx">

<!-- Mirrored from htmldemo.hasthemes.com/hono/hono/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 06 Jan 2021 00:31:04 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <title>HONO</title>
    <title>@yield('title')</title>
    <!-- ::::::::::::::Favicon icon::::::::::::::-->
    @include('frontend.component.linkcss')
</head>

<body>
    <!-- Start Header Area -->
    @include('frontend.layouts.header')
    <!-- Start Header Area -->

    <!-- Start Mobile Header -->
    @include('frontend.includes.menumobile')

    <!-- Start Offcanvas Addcart Section -->
    @include('frontend.includes.cart')

    <!-- Start Offcanvas Mobile Menu Section -->
    @include('frontend.includes.wishlish')

    <!-- Start Offcanvas Search Bar Section -->
    @include('frontend.includes.search')

    <!-- Offcanvas Overlay -->
    <div class="offcanvas-overlay"></div>

    <!-- Start Hero Slider Section-->
    @yield('content-header')
    <!-- End Hero Slider Section-->
    
    <!-- Start Service Section -->
    @yield('content')
   <!-- End Instagramr Section -->

    <!-- Start Footer Section -->
    @include('frontend.layouts.footer')
    <!-- End Footer Section -->

    <!-- material-scrolltop button -->
    <button class="material-scrolltop" type="button"></button>

    <!-- Start Modal Add cart -->
    @include('frontend.content.contentindex.addcartsuccess')
    <!-- End Modal Add cart -->

    <!-- Start Modal Quickview cart -->
    @include('frontend.content.contentindex.detailproduct')
    <!-- End Modal Quickview cart -->

    <!-- ::::::::::::::All JS Files here :::::::::::::: -->
    <!-- Global Vendor, plugins JS -->
    @include('frontend.component.scripts')
</body>

<!-- Mirrored from htmldemo.hasthemes.com/hono/hono/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 06 Jan 2021 00:31:38 GMT -->
</html>