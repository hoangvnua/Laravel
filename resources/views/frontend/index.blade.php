@extends('frontend.layouts.master')

@section('content-header')
    <div class="hero-slider-section">
        <!-- Slider main container -->
        <div class="hero-slider-active swiper-container">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                <!-- Start Hero Single Slider Item -->
                <div class="hero-single-slider-item swiper-slide">
                    <!-- Hero Slider Image -->
                    <div class="hero-slider-bg">
                        <img src="/frontend/images/hero-slider/home-1/hero-slider-1.jpg" alt="">
                    </div>
                    <!-- Hero Slider Content -->
                    <div class="hero-slider-wrapper">
                        <div class="container">
                            <div class="row">
                                <div class="col-auto">
                                    <div class="hero-slider-content">
                                        <h4 class="subtitle">Bộ sưu tập mới</h4>
                                        <h2 class="title">Best Of NeoCon <br> Gold Award </h2>
                                        <a href="{{ route('frontend.shop.index') }}"
                                            class="btn btn-lg btn-outline-golden">Mua sắm
                                            ngay</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- End Hero Single Slider Item -->
                <!-- Start Hero Single Slider Item -->
                <div class="hero-single-slider-item swiper-slide">
                    <!-- Hero Slider Image -->
                    <div class="hero-slider-bg">
                        <img src="/frontend/images/hero-slider/home-1/hero-slider-2.jpg" alt="">
                    </div>
                    <!-- Hero Slider Content -->
                    <div class="hero-slider-wrapper">
                        <div class="container">
                            <div class="row">
                                <div class="col-auto">
                                    <div class="hero-slider-content">
                                        <h4 class="subtitle">Bộ sưu tập mới</h4>
                                        <h2 class="title">Luxy Chairs <br> Design Award </h2>
                                        <a href="product-details-default.html" class="btn btn-lg btn-outline-golden">Mua sắm
                                            ngay</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- End Hero Single Slider Item -->
            </div>

            <!-- If we need pagination -->
            <div class="swiper-pagination active-color-golden"></div>

            <!-- If we need navigation buttons -->
            <div class="swiper-button-prev d-none d-lg-block"></div>
            <div class="swiper-button-next d-none d-lg-block"></div>
        </div>
    </div>
@endsection

@section('content')
    <div class="service-promo-section section-top-gap-100">
        <div class="service-wrapper">
            <div class="container">
                <div class="row">
                    <!-- Start Service Promo Single Item -->
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="service-promo-single-item" data-aos="fade-up" data-aos-delay="0">
                            <div class="image">
                                <img src="/frontend/images/icons/service-promo-1.png" alt="">
                            </div>
                            <div class="content">
                                <h6 class="title">MIỄN PHÍ GIAO HÀNG</h6>
                                <p>Hoàn tiền 10%, giao hàng miễn phí tại các thành phố lớn</p>
                            </div>
                        </div>
                    </div>
                    <!-- End Service Promo Single Item -->
                    <!-- Start Service Promo Single Item -->
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="service-promo-single-item" data-aos="fade-up" data-aos-delay="200">
                            <div class="image">
                                <img src="/frontend/images/icons/service-promo-2.png" alt="">
                            </div>
                            <div class="content">
                                <h6 class="title">1 ĐỔI 1 TRONG VÒNG 30 NGÀY</h6>
                                <p>Đổi hàng hoặc hoàn tiền 100% trong vòng 30 ngày!</p>
                            </div>
                        </div>
                    </div>
                    <!-- End Service Promo Single Item -->
                    <!-- Start Service Promo Single Item -->
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="service-promo-single-item" data-aos="fade-up" data-aos-delay="400">
                            <div class="image">
                                <img src="/frontend/images/icons/service-promo-3.png" alt="">
                            </div>
                            <div class="content">
                                <h6 class="title">THANH TOÁN AN TOÀN</h6>
                                <p>Thanh toán nhanh an toàn bằng các phương pháp phổ biến nhất thế giới.</p>
                            </div>
                        </div>
                    </div>
                    <!-- End Service Promo Single Item -->
                    <!-- Start Service Promo Single Item -->
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="service-promo-single-item" data-aos="fade-up" data-aos-delay="600">
                            <div class="image">
                                <img src="/frontend/images/icons/service-promo-4.png" alt="">
                            </div>
                            <div class="content">
                                <h6 class="title">KHÁCH HÀNG QUEN THUỘC</h6>
                                <p>Hoàn lại 1% với hóa đơn khách hàng quen thuộc.</p>
                            </div>
                        </div>
                    </div>
                    <!-- End Service Promo Single Item -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Service Section -->

    <!-- Start Banner Section -->
    <div class="banner-section section-top-gap-100 section-fluid">
        <div class="banner-wrapper">
            <div class="container-fluid">
                <div class="row mb-n6">

                    <div class="col-lg-6 col-12 mb-6">
                        <!-- Start Banner Single Item -->
                        <div class="banner-single-item banner-style-1 banner-animation img-responsive" data-aos="fade-up"
                            data-aos-delay="0">
                            <div class="image">
                                <img src="/frontend/images/banner/banner-style-1-img-1.jpg" alt="">
                            </div>
                            <div class="content">
                                <h4 class="title">Đèn bàn sạc mini - E216</h4>
                                <h5 class="sub-title">Chúng tôi thiết kế ngôi nhà của bạn</h5>
                                <a href="{{ route('frontend.shop.index') }}"
                                    class="btn btn-lg btn-outline-golden icon-space-left"><span
                                        class="d-flex align-items-center">Khám phá ngay <i
                                            class="ion-ios-arrow-thin-right"></i></span></a>
                            </div>
                        </div>
                        <!-- End Banner Single Item -->
                    </div>

                    <div class="col-lg-6 col-12 mb-6">
                        <div class="row mb-n6">
                            <!-- Start Banner Single Item -->
                            <div class="col-lg-6 col-sm-6 mb-6">
                                <div class="banner-single-item banner-style-2 banner-animation img-responsive"
                                    data-aos="fade-up" data-aos-delay="0">
                                    <div class="image">
                                        <img src="/frontend/images/banner/banner-style-2-img-1.jpg" alt="">
                                    </div>
                                    <div class="content">
                                        <h4 class="title">Dụng cụ <br>
                                            nhà bếp</h4>
                                        <a href="{{ route('frontend.shop.index') }}" class="link-text">
                                            <span>
                                                Mua sắm ngay
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!-- End Banner Single Item -->
                            <!-- Start Banner Single Item -->
                            <div class="col-lg-6 col-sm-6 mb-6">
                                <div class="banner-single-item banner-style-2 banner-animation img-responsive"
                                    data-aos="fade-up" data-aos-delay="200">
                                    <div class="image">
                                        <img src="/frontend/images/banner/banner-style-2-img-2.jpg" alt="">
                                    </div>
                                    <div class="content">
                                        <h4 class="title">Sofas và <br>
                                            Ghế bành</h4>
                                        <a href="{{ route('frontend.shop.index') }}" class="link-text">
                                            <span>
                                                Mua sắm ngay
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!-- End Banner Single Item -->
                            <!-- Start Banner Single Item -->
                            <div class="col-lg-6 col-sm-6 mb-6">
                                <div class="banner-single-item banner-style-2 banner-animation img-responsive"
                                    data-aos="fade-up" data-aos-delay="0">
                                    <div class="image">
                                        <img src="/frontend/images/banner/banner-style-2-img-3.jpg" alt="">
                                    </div>
                                    <div class="content">
                                        <h4 class="title">Ghế & <br>
                                            ghế đẩu</h4>
                                        <a href="{{ route('frontend.shop.index') }}" class="link-text">
                                            <span>
                                                Mua sắm ngay
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!-- End Banner Single Item -->
                            <!-- Start Banner Single Item -->
                            <div class="col-lg-6 col-sm-6 mb-6">
                                <div class="banner-single-item banner-style-2 banner-animation img-responsive"
                                    data-aos="fade-up" data-aos-delay="200">
                                    <div class="image">
                                        <img src="/frontend/images/banner/banner-style-2-img-4.jpg" alt="">
                                    </div>
                                    <div class="content">
                                        <h4>Ánh sáng <br>
                                            Nội thất</h4>
                                        <a href="{{ route('frontend.shop.index') }}" class="link-text">
                                            <span>
                                                Mua sắm ngay
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!-- End Banner Single Item -->
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- End Banner Section -->

    <!-- Start Product Default Slider Section -->
    <div class="product-default-slider-section section-top-gap-100 section-fluid">
        <!-- Start Section Content Text Area -->
        <div class="section-title-wrapper" data-aos="fade-up" data-aos-delay="0">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-content-gap">
                            <div class="secton-content">
                                <h3 class="section-title">Sản phẩm mới</h3>
                                <p>Đặt hàng trước ngay bây giờ để nhận ưu đãi và quà tặng độc quyền</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Start Section Content Text Area -->
        <div class="product-wrapper" data-aos="fade-up" data-aos-delay="200">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="product-slider-default-2rows default-slider-nav-arrow">
                            <!-- Slider main container -->
                            <div class="swiper-container product-default-slider-4grid-2row">
                                <!-- Additional required wrapper -->
                                <div class="swiper-wrapper">
                                    @foreach ($products_new as $product)
                                        <div class="product-default-single-item product-color--golden swiper-slide">
                                            <div class="image-box">
                                                <a href="{{ route('frontend.shop.show', $product->id) }}"
                                                    class="image-link">
                                                    <img src="/frontend/images/product/default/home-1/default-1.jpg" alt="">
                                                    <img src="/frontend/images/product/default/home-1/default-2.jpg" alt="">
                                                </a>
                                                <div class="tag">
                                                    <span>sale</span>
                                                </div>
                                                <div class="action-link">
                                                    <div class="action-link-left">
                                                        <a href="{{ route('frontend.cart.create', $product->id) }}">Thêm
                                                            vào giỏ hàng</a>
                                                    </div>
                                                    <div class="action-link-right">
                                                        <a href="#" data-bs-toggle="modal"
                                                            data-bs-target="#modalQuickview"><i
                                                                class="icon-magnifier"></i></a>
                                                        <a href="#"><i class="icon-heart"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="content">
                                                <div class="content-left">
                                                    <h6 class="title"><a
                                                            href="product-details-default.html">{{ $product->name }}</a>
                                                    </h6>
                                                    <ul class="review-star">
                                                        <li class="fill"><i class="ion-android-star"></i></li>
                                                        <li class="fill"><i class="ion-android-star"></i></li>
                                                        <li class="fill"><i class="ion-android-star"></i></li>
                                                        <li class="fill"><i class="ion-android-star"></i></li>
                                                        <li class="empty"><i class="ion-android-star"></i></li>
                                                    </ul>
                                                </div>
                                                <div class="content-right">
                                                    <span class="price"> <strike> {{ $product->price_format }}
                                                        </strike> - {{ $product->sale_price_format }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach


                                </div>
                            </div>
                            <!-- If we need navigation buttons -->
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Product Default Slider Section -->

    <!-- Start Banner Section -->
    <div class="banner-section section-top-gap-100">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 offset-xl-2">
                    <!-- Start Banner Single Item -->
                    <div class="banner-single-item banner-style-3 banner-animation img-responsive" data-aos="fade-up"
                        data-aos-delay="0">
                        <div class="image">
                            <img class="img-fluid" src="/frontend/images/banner/banner-style-3-img-1.jpg" alt="">
                        </div>
                        <div class="content">
                            <h3 class="title">Nội thất hiện đại bộ sưu tập cơ bản</h3>
                            <h5 class="sub-title">Để chúng tôi thiết kế ngôi nhà của bạn</h5>
                            <a href="{{ route('frontend.shop.index') }}"
                                class="btn btn-lg btn-outline-golden icon-space-left"><span
                                    class="d-flex align-items-center">Khám phá ngay <i
                                        class="ion-ios-arrow-thin-right"></i></span></a>
                        </div>
                    </div>
                    <!-- End Banner Single Item -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Banner Section -->

    <!-- Start Product Default Slider Section -->
    <div class="product-default-slider-section section-top-gap-100 section-fluid section-inner-bg">
        <!-- Start Section Content Text Area -->
        <div class="section-title-wrapper" data-aos="fade-up" data-aos-delay="0">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-content-gap">
                            <div class="secton-content">
                                <h3 class="section-title">Sản phẩm bán chạy</h3>
                                <p>Thêm những sản phẩm bán nhiều nhất vào giỏ hàng của bạn</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Start Section Content Text Area -->
        <div class="product-wrapper" data-aos="fade-up" data-aos-delay="0">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="product-slider-default-1row default-slider-nav-arrow">
                            <!-- Slider main container -->
                            <div class="swiper-container product-default-slider-4grid-1row">
                                <!-- Additional required wrapper -->
                                <div class="swiper-wrapper">
                                    <!-- End Product Default Single Item -->

                                    @foreach ($products_hot as $product_hot)
                                        <div class="product-default-single-item product-color--golden swiper-slide">
                                            <div class="image-box">
                                                <a href="{{ route('frontend.shop.show', $product->id) }}"
                                                    class="image-link">
                                                    <img src="/frontend/images/product/default/home-1/default-9.jpg" alt="">
                                                    <img src="/frontend/images/product/default/home-1/default-10.jpg"
                                                        alt="">
                                                </a>
                                                <div class="action-link">
                                                    <div class="action-link-left">
                                                        <a href="{{ route('frontend.cart.create', $product->id) }}">Thêm
                                                            vào giỏ hàng</a>
                                                    </div>
                                                    <div class="action-link-right">
                                                        <a href="#" data-bs-toggle="modal"
                                                            data-bs-target="#modalQuickview"><i
                                                                class="icon-magnifier"></i></a>
                                                        <a href="#"><i class="icon-heart"></i></a>
                                                        <a href="#"><i class="icon-shuffle"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="content">
                                                <div class="content-left">
                                                    <h6 class="title"><a
                                                            href="product-details-default.html">{{ $product->name }}</a>
                                                    </h6>
                                                    <ul class="review-star">
                                                        <li class="fill"><i class="ion-android-star"></i></li>
                                                        <li class="fill"><i class="ion-android-star"></i></li>
                                                        <li class="fill"><i class="ion-android-star"></i></li>
                                                        <li class="fill"><i class="ion-android-star"></i></li>
                                                        <li class="empty"><i class="ion-android-star"></i></li>
                                                    </ul>
                                                </div>
                                                <div class="content-right">
                                                    <span class="price">{{ $product->price_format }}</span>
                                                </div>

                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <!-- If we need navigation buttons -->
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Product Default Slider Section -->

    <!-- Start Banner Section -->
    <div class="banner-section">
        <div class="banner-wrapper clearfix">
            <!-- Start Banner Single Item -->
            <div class="banner-single-item banner-style-4 banner-animation banner-color--golden float-left img-responsive"
                data-aos="fade-up" data-aos-delay="0">
                <div class="image">
                    <img class="img-fluid" src="/frontend/images/banner/banner-style-4-img-1.jpg" alt="">
                </div>
                <a href="{{ route('frontend.shop.index') }}" class="content">
                    <div class="inner">
                        <h4 class="title">Ghế đẩu</h4>
                        <h6 class="sub-title">20 Sản phẩm</h6>
                    </div>
                    <span class="round-btn"><i class="ion-ios-arrow-thin-right"></i></span>
                </a>
            </div>
            <!-- End Banner Single Item -->
            <!-- Start Banner Single Item -->
            <div class="banner-single-item banner-style-4 banner-animation banner-color--golden float-left img-responsive"
                data-aos="fade-up" data-aos-delay="200">
                <div class="image">
                    <img class="img-fluid" src="/frontend/images/banner/banner-style-4-img-2.jpg" alt="">
                </div>
                <a href="{{ route('frontend.shop.index') }}" class="content">
                    <div class="inner">
                        <h4 class="title">Ghế sofar</h4>
                        <h6 class="sub-title">20 sản phẩm</h6>
                    </div>
                    <span class="round-btn"><i class="ion-ios-arrow-thin-right"></i></span>
                </a>
            </div>
            <!-- End Banner Single Item -->
            <!-- Start Banner Single Item -->
            <div class="banner-single-item banner-style-4 banner-animation banner-color--golden float-left img-responsive"
                data-aos="fade-up" data-aos-delay="400">
                <div class="image">
                    <img class="img-fluid" src="/frontend/images/banner/banner-style-4-img-3.jpg" alt="">
                </div>
                <a href="{{ route('frontend.shop.index') }}" class="content">
                    <div class="inner">
                        <h4 class="title">Đèn chùm</h4>
                        <h6 class="sub-title">20 sản phẩm</h6>
                    </div>
                    <span class="round-btn"><i class="ion-ios-arrow-thin-right"></i></span>
                </a>
            </div>
            <!-- End Banner Single Item -->
            <!-- Start Banner Single Item -->
            <div class="banner-single-item banner-style-4 banner-animation banner-color--golden float-left img-responsive"
                data-aos="fade-up" data-aos-delay="600">
                <div class="image">
                    <img class="img-fluid" src="/frontend/images/banner/banner-style-4-img-4.jpg" alt="">
                </div>
                <a href="{{ route('frontend.shop.index') }}" class="content">
                    <div class="inner">
                        <h4 class="title">Ghế đơn giản</h4>
                        <h6 class="sub-title">20 sản phẩm</h6>
                    </div>
                    <span class="round-btn"><i class="ion-ios-arrow-thin-right"></i></span>
                </a>
            </div>
            <!-- End Banner Single Item -->
        </div>
    </div>
    <!-- End Banner Section -->

    <!-- Start Blog Slider Section -->
    <div class="blog-default-slider-section section-top-gap-100 section-fluid">
        <!-- Start Section Content Text Area -->
        <div class="section-title-wrapper" data-aos="fade-up" data-aos-delay="0">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-content-gap">
                            <div class="secton-content">
                                <h3 class="section-title">Bài viết mới</h3>
                                {{-- <p>Present posts in a best way to highlight interesting moments of your blog.</p> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Start Section Content Text Area -->
        <div class="blog-wrapper" data-aos="fade-up" data-aos-delay="200">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="blog-default-slider default-slider-nav-arrow">
                            <!-- Slider main container -->
                            <div class="swiper-container blog-slider">
                                <!-- Additional required wrapper -->
                                <div class="swiper-wrapper">
                                    @foreach ($posts as $post)
                                        <div class="blog-default-single-item blog-color--golden swiper-slide">
                                            <div class="image-box" style="height: 271px">
                                                <a href="{{ route('frontend.posts.show', $post->id) }}"
                                                    class="image-link">
                                                    <img class="img-fluid" src="{{ $post->img_url }}" alt=""
                                                        style="width: 100%; height: 100%;">
                                                </a>
                                            </div>
                                            <div class="content">
                                                <h6 class="title">
                                                    <a href="{{ route('frontend.posts.show', $post->id) }}">
                                                        {{ $post->title }}
                                                    </a>
                                                </h6>
                                                <p>
                                                    {{ $post->content }}
                                                </p>
                                                <div class="inner">
                                                    <a href="{{ route('frontend.posts.show', $post->id) }}"
                                                        class="read-more-btn icon-space-left">Xem thêm<span><i
                                                                class="ion-ios-arrow-thin-right"></i></span></a>
                                                    <div class="post-meta">
                                                        <a href="#"
                                                            class="date">{{ $post->created_at->format('d-m-Y') }}</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach


                                </div>
                            </div>
                            <!-- If we need navigation buttons -->
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Blog Slider Section -->
    <br><br>
    <!-- Start Instagramr Section -->
    {{-- <div class="instagram-section section-top-gap-100 section-inner-bg">
        <div class="instagram-wrapper" data-aos="fade-up" data-aos-delay="0">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="instagram-box">
                            <div id="instagramFeed" class="instagram-grid clearfix">
                                <a href="https://www.instagram.com/p/CCFOZKDDS6S/" target="_blank"
                                    class="instagram-image-link float-left banner-animation"><img
                                        src="/frontend/images/instagram/instagram-1.jpg" alt=""></a>
                                <a href="https://www.instagram.com/p/CCFOYDNjWF5/" target="_blank"
                                    class="instagram-image-link float-left banner-animation"><img
                                        src="/frontend/images/instagram/instagram-2.jpg" alt=""></a>
                                <a href="https://www.instagram.com/p/CCFOXH6D-zQ/" target="_blank"
                                    class="instagram-image-link float-left banner-animation"><img
                                        src="/frontend/images/instagram/instagram-3.jpg" alt=""></a>
                                <a href="https://www.instagram.com/p/CCFOVcrDDOo/" target="_blank"
                                    class="instagram-image-link float-left banner-animation"><img
                                        src="/frontend/images/instagram/instagram-4.jpg" alt=""></a>
                                <a href="https://www.instagram.com/p/CCFOUajjABP/" target="_blank"
                                    class="instagram-image-link float-left banner-animation"><img
                                        src="/frontend/images/instagram/instagram-5.jpg" alt=""></a>
                                <a href="https://www.instagram.com/p/CCFOS2MDmjj/" target="_blank"
                                    class="instagram-image-link float-left banner-animation"><img
                                        src="/frontend/images/instagram/instagram-6.jpg" alt=""></a>
                            </div>
                            <div class="instagram-link">
                                <h5><a href="https://www.instagram.com/myfurniturecom/" target="_blank"
                                        rel="noopener noreferrer">  </a></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
@endsection
