<header class="header-section d-none d-xl-block">
    <div class="header-wrapper">
        <div class="header-bottom header-bottom-color--golden section-fluid sticky-header sticky-color--golden">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 d-flex align-items-center justify-content-between">
                        <!-- Start Header Logo -->
                        <div class="header-logo">
                            <div class="logo">
                                <a href="{{ route('frontend.index') }}"><img
                                        src="/frontend/images/logo/logo_black.png" alt=""></a>
                            </div>
                        </div>
                        <!-- End Header Logo -->

                        <!-- Start Header Main Menu -->
                        <div class="main-menu menu-color--black menu-hover-color--golden">
                            <nav>
                                <ul>
                                    <li>
                                        <a class="active main-menu-link" href="{{ route('frontend.index') }}">Trang
                                            chủ</a>
                                    </li>
                                    <li class="has-dropdown has-megaitem">
                                        <a href="product-details-default.html">Cửa Hàng <i
                                                class="fa fa-angle-down"></i></a>
                                        <!-- Mega Menu -->
                                        <div class="mega-menu">
                                            <ul class="mega-menu-inner">
                                                <!-- Mega Menu Sub Link -->
                                                <li class="mega-menu-item">
                                                    <a href="#" class="mega-menu-item-title">Shop Layouts</a>
                                                    <ul class="mega-menu-sub">
                                                        <li><a href="shop-grid-sidebar-left.html">Grid Left Sidebar</a>
                                                        </li>
                                                        <li><a href="shop-grid-sidebar-right.html">Grid Right
                                                                Sidebar</a></li>
                                                        <li><a href="shop-full-width.html">Full Width</a></li>
                                                        <li><a href="shop-list-sidebar-left.html">List Left Sidebar</a>
                                                        </li>
                                                        <li><a href="shop-list-sidebar-right.html">List Right
                                                                Sidebar</a></li>
                                                    </ul>
                                                </li>
                                                <!-- Mega Menu Sub Link -->
                                                <li class="mega-menu-item">
                                                    <a href="#" class="mega-menu-item-title">Other Pages</a>
                                                    <ul class="mega-menu-sub">
                                                        <li><a href="cart.html">Cart</a></li>
                                                        <li><a href="empty-cart.html">Empty Cart</a></li>
                                                        <li><a href="wishlist.html">Wishlist</a></li>
                                                        <li><a href="compare.html">Compare</a></li>
                                                        <li><a href="checkout.html">Checkout</a></li>
                                                        <li><a href="login.html">Login</a></li>
                                                        <li><a href="my-account.html">My Account</a></li>
                                                    </ul>
                                                </li>
                                                <!-- Mega Menu Sub Link -->
                                                <li class="mega-menu-item">
                                                    <a href="#" class="mega-menu-item-title">Product Types</a>
                                                    <ul class="mega-menu-sub">
                                                        <li><a href="product-details-default.html">Product Default</a>
                                                        </li>
                                                        <li><a href="product-details-variable.html">Product Variable</a>
                                                        </li>
                                                        <li><a href="product-details-affiliate.html">Product
                                                                Referral</a></li>
                                                        <li><a href="product-details-group.html">Product Group</a></li>
                                                        <li><a href="product-details-single-slide.html">Product
                                                                Slider</a></li>
                                                    </ul>
                                                </li>
                                                <!-- Mega Menu Sub Link -->
                                                <li class="mega-menu-item">
                                                    <a href="#" class="mega-menu-item-title">Product Types</a>
                                                    <ul class="mega-menu-sub">
                                                        <li><a href="product-details-tab-left.html">Product Tab Left</a>
                                                        </li>
                                                        <li><a href="product-details-tab-right.html">Product Tab
                                                                Right</a></li>
                                                        <li><a href="product-details-gallery-left.html">Product Gallery
                                                                Left</a></li>
                                                        <li><a href="product-details-gallery-right.html">Product Gallery
                                                                Right</a></li>
                                                        <li><a href="product-details-sticky-left.html">Product Sticky
                                                                Left</a></li>
                                                        <li><a href="product-details-sticky-right.html">Product Sticky
                                                                right</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                            <div class="menu-banner">
                                                <a href="#" class="menu-banner-link">
                                                    <img class="menu-banner-img"
                                                        src="/frontend/images/banner/menu-banner.jpg" alt="">
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="has-dropdown">
                                        <a href="{{ route('frontend.posts.index') }}">Blog <i
                                                class="fa fa-angle-down"></i></a>
                                        <!-- Sub Menu -->
                                        <ul class="sub-menu">
                                            <li>
                                                <a href="{{ route('frontend.posts.index') }}">All</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('frontend.posts.list') }}">Blog theo danh mục</a>
                                            </li>
                                        </ul>
                                    </li>
                                    
                                    <li>
                                        <a href="about-us.html">Xem thêm về chúng tôi</a>
                                    </li>
                                    <li>
                                        <a href="contact-us.html">Liên hệ</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <!-- End Header Main Menu Start -->

                        <!-- Start Header Action Link -->
                        <ul class="header-action-link action-color--black action-hover-color--golden">
                            @if (auth()->check())
                                <li>
                                    {{ auth()->user()->name }}

                                </li>

                                {{-- <li>
                                    <a href="#offcanvas-wishlish" class="offcanvas-toggle">
                                        <i class="icon-heart"></i>
                                        <span class="item-count">3</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#offcanvas-add-cart" class="offcanvas-toggle">
                                        <i class="icon-bag"></i>
                                        <span class="item-count">3</span>
                                    </a>
                                </li> --}}
                            @else
                                @if (request()->routeIs('auth.login'))
                                    <form method="get" action="{{ route('auth.register') }}">
                                        @csrf
                                        <a href="#" class="nav-link"
                                            onclick="this.closest('form').submit();return false;">
                                            Đăng ký
                                        </a>
                                    </form>
                                @else
                                    <form method="get" action="{{ route('auth.login') }}">
                                        @csrf
                                        <a href="#" class="nav-link"
                                            onclick="this.closest('form').submit();return false;">
                                            Đăng nhập
                                        </a>
                                    </form>
                                @endif
                            @endif

                            <li>
                                <a href="#search">
                                    <i class="icon-magnifier"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#offcanvas-about" class="offacnvas offside-about offcanvas-toggle">
                                    <i class="icon-menu"></i>
                                </a>
                            </li>

                        </ul>
                        <!-- End Header Action Link -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
