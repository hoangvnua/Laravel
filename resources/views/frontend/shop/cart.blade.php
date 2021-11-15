@extends('frontend.layouts.master')

@section('content-header')
    <div class="breadcrumb-section breadcrumb-bg-color--golden">
        <div class="breadcrumb-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h3 class="breadcrumb-title">Giỏ hàng</h3>
                        <div class="breadcrumb-nav breadcrumb-nav-color--black breadcrumb-nav-hover-color--golden">
                            <nav aria-label="breadcrumb">
                                <ul>
                                    <li><a href="index.html">Trang chủ</a></li>
                                    <li class="active" aria-current="page">Giỏ hàng</li>
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
    <div class="cart-table-wrapper" data-aos="fade-up" data-aos-delay="0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="table_desc">
                        <div class="table_page table-responsive">
                            <table>
                                <!-- Start Cart Table Head -->
                                <thead>
                                    <tr>
                                        <th class="product_thumb">Ảnh</th>
                                        <th class="product_name">Tên sảnt phẩm</th>
                                        <th class="product-price">Giá tiền</th>
                                        <th class="product_quantity">Số lượng</th>
                                        <th class="product_total">Tổng</th>
                                        <th class="product_remove">Xóa</th>
                                    </tr>
                                </thead> <!-- End Cart Table Head -->
                                <tbody>
                                    @foreach ($products as $product)
                                        <tr>
                                            <td class="product_thumb">
                                                <a href="product-details-default.html">
                                                    @if ($product->options->has('image'))
                                                        <img src="{{ url($product->options->image) }}" alt="">
                                                    @endif
                                                </a>
                                            </td>
                                            <td class="product_name"><a
                                                    href="product-details-default.html">{{ $product->name }}</a></td>
                                            <td class="product-price">{{ $product->price }}</td>
                                            {{-- <td class="product_quantity"><label>Số lượng</label> <input min="1" max="100"
                                                    value="{{ $product->qty }}" type="number"></td> --}}
                                            <td class="product_quantity"><a
                                                    href="{{ route('frontend.cart.increase', $product->rowId) }}"><i
                                                        class="fas fa-plus"></i></a>
                                                {{ $product->qty }} <a
                                                    href="{{ route('frontend.cart.decrease', $product->rowId) }}"><i
                                                        class="fas fa-minus"></i></a></td>
                                            <td class="product_total">{{ $product->price * $product->qty }}</td>
                                            <td class="product_remove"><a
                                                    href="{{ route('frontend.cart.remove', $product->rowId) }}"><i
                                                        class="far fa-trash-alt"></i></a></td>
                                        </tr>
                                    @endforeach

                                </tbody>

                            </table>
                        </div>
                        <div class="cart_submit">
                            <button class="btn btn-md btn-golden" type="submit">Cập nhật giỏ hàng</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="coupon_area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="coupon_code right" data-aos="fade-up" data-aos-delay="400">
                            <h3>Cart Totals</h3>
                            <div class="coupon_inner">
                                <div class="cart_subtotal">
                                    <p>Subtotal</p>
                                    <p class="cart_amount">$215.00</p>
                                </div>
                                <div class="cart_subtotal ">
                                    <p>Shipping</p>
                                    <p class="cart_amount"><span>Flat Rate:</span> $255.00</p>
                                </div>
                                <a href="#">Calculate shipping</a>

                                <div class="cart_subtotal">
                                    <p>Tổng đơn hàng</p>
                                    <p class="cart_amount">{{ \Gloudemans\Shoppingcart\Facades\Cart::total() }}</p>
                                </div>
                                <div class="checkout_btn">
                                    <a href="{{ route('frontend.checkout') }}" class="btn btn-md btn-golden">Thanh toán</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
