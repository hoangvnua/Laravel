@extends('frontend.layouts.master')

@section('content-header')
    <div class="breadcrumb-section breadcrumb-bg-color--golden">
        <div class="breadcrumb-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h3 class="breadcrumb-title">Cửa hàng</h3>
                        <div class="breadcrumb-nav breadcrumb-nav-color--black breadcrumb-nav-hover-color--golden">
                            <nav aria-label="breadcrumb">
                                <ul>
                                    <li><a href="index.html">Trang chủ</a></li>
                                    <li class="active" aria-current="page">Cửa hàng</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="shop-section">
        <div class="container">
            <div class="row flex-column-reverse flex-lg-row">
                <div class="col-lg-12">
                    <!-- Start Shop Product Sorting Section -->
                    <div class="shop-sort-section">
                        <div class="container">
                            <div class="row">
                                <!-- Start Sort Wrapper Box -->
                                <div class="sort-box d-flex justify-content-between align-items-md-center align-items-start flex-md-row flex-column"
                                    data-aos="fade-up" data-aos-delay="0">
                                    <!-- Start Sort tab Button -->
                                    <div class="sort-tablist d-flex align-items-center">

                                        <!-- Start Page Amount -->
                                        <div class="page-amount ml-2">
                                            <span>Hiển thị {{ $products->firstItem() }} - {{ $products->lastItem() }}
                                                của {{ $products->total() }} Sản phẩm</span>
                                        </div> <!-- End Page Amount -->
                                    </div> <!-- End Sort tab Button -->

                                    <!-- Start Sort Select Option -->
                                    <div class="sort-select-list d-flex align-items-center">
                                        <label class="mr-2">Sắp xếp:</label>
                                        <form action="#">
                                            <fieldset>
                                                <select name="speed" id="speed">
                                                    <option>Sort by average rating</option>
                                                    <option>Sort by popularity</option>
                                                    <option selected="selected">Sort by newness</option>
                                                    <option>Sort by price: low to high</option>
                                                    <option>Sort by price: high to low</option>
                                                    <option>Product Name: Z</option>
                                                </select>
                                            </fieldset>
                                        </form>
                                    </div> <!-- End Sort Select Option -->



                                </div> <!-- Start Sort Wrapper Box -->
                            </div>
                        </div>
                    </div> <!-- End Section Content -->

                    <!-- Start Tab Wrapper -->
                    <div class="sort-product-tab-wrapper">
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <div class="tab-content">
                                        <!-- Start Grid View Product -->
                                        <div class="tab-pane active show sort-layout-single" id="layout-4-grid">
                                            <div class="row">
                                                @foreach ($products as $product)
                                                    <div class="col-xl-3 col-lg-4 col-sm-6 col-12">
                                                        <!-- Start Product Default Single Item -->
                                                        <div class="product-default-single-item product-color--golden"
                                                            data-aos="fade-up" data-aos-delay="0">
                                                            <div class="image-box">
                                                                <a href="{{ route('frontend.shop.show', $product->id) }}"
                                                                    class="image-link">
                                                                    <img src="/frontend/images/product/default/home-1/default-9.jpg"
                                                                        alt="">
                                                                    <img src="/frontend/images/product/default/home-1/default-10.jpg"
                                                                        alt="">
                                                                </a>
                                                                <div class="action-link">
                                                                    <div class="action-link-left">
                                                                        <a href="#" data-bs-toggle="modal"
                                                                            data-bs-target="#modalAddcart">Thêm vào giỏ
                                                                            hàng</a>
                                                                    </div>
                                                                    <div class="action-link-right">
                                                                        <a href="#" data-bs-toggle="modal"
                                                                            data-bs-target="#modalQuickview">
                                                                            <i class="icon-magnifier"></i>
                                                                        </a>
                                                                        <a href="wishlist.html">
                                                                            <i class="icon-heart"></i>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="content">
                                                                <div class="content-left">
                                                                    <h6 class="title">
                                                                        <a href="product-details-default.html">{{ $product->name }}</a>
                                                                    </h6>
                                                                </div>
                                                                <div class="content-right">
                                                                    <span class="price"><strike> {{ $product->price_format }} </strike> - {{ $product->sale_price_format }}</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- End Product Default Single Item -->
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div> <!-- End Grid View Product -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- End Tab Wrapper -->

                    <!-- Start Pagination -->
                    {{ $products->links() }}
                     <!-- End Pagination -->
                </div> <!-- End Shop Product Sorting Section  -->
            </div>
        </div>
    </div>
@endsection
