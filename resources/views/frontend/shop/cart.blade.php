@extends('frontend.layouts.master')

@section('content-header')
<div class="breadcrumb-section breadcrumb-bg-color--golden">
    <div class="breadcrumb-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3 class="breadcrumb-title">Cart</h3>
                    <div class="breadcrumb-nav breadcrumb-nav-color--black breadcrumb-nav-hover-color--golden">
                        <nav aria-label="breadcrumb">
                            <ul>
                                <li><a href="index.html">Home</a></li>
                                <li><a href="shop-grid-sidebar-left.html">Shop</a></li>
                                <li class="active" aria-current="page">Cart</li>
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
<div class="cart-table-wrapper"  data-aos="fade-up"  data-aos-delay="0">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="table_desc">
                    <div class="table_page table-responsive">
                        <table>
                            <!-- Start Cart Table Head -->
                            <thead>
                                <tr>
                                    <th class="product_remove">Delete</th>
                                    <th class="product_thumb">Image</th>
                                    <th class="product_name">Product</th>
                                    <th class="product-price">Price</th>
                                    <th class="product_quantity">Quantity</th>
                                    <th class="product_total">Total</th>
                                </tr>
                            </thead> <!-- End Cart Table Head -->
                            <tbody>
                                <!-- Start Cart Single Item-->
                                <tr>
                                    <td class="product_remove"><a href="#"><i class="fa fa-trash-o"></i></a></td>
                                    <td class="product_thumb"><a href="product-details-default.html"><img src="/frontend/images/product/default/home-1/default-1.jpg" alt=""></a></td>
                                    <td class="product_name"><a href="product-details-default.html">Handbag fringilla</a></td>
                                    <td class="product-price">$65.00</td>
                                    <td class="product_quantity"><label>Quantity</label> <input min="1" max="100" value="1" type="number"></td>
                                    <td class="product_total">$130.00</td>
                                </tr> <!-- End Cart Single Item-->
                                <!-- Start Cart Single Item-->
                                <tr>
                                    <td class="product_remove"><a href="#"><i class="fa fa-trash-o"></i></a></td>
                                    <td class="product_thumb"><a href="product-details-default.html"><img src="/frontend/images/product/default/home-1/default-2.jpg" alt=""></a></td>
                                    <td class="product_name"><a href="product-details-default.html">Handbags justo</a></td>
                                    <td class="product-price">$90.00</td>
                                    <td class="product_quantity"><label>Quantity</label> <input min="1" max="100" value="1" type="number"></td>
                                    <td class="product_total">$180.00</td>
                                </tr> <!-- End Cart Single Item-->
                                <!-- Start Cart Single Item-->
                                <tr>
                                    <td class="product_remove"><a href="#"><i class="fa fa-trash-o"></i></a></td>
                                    <td class="product_thumb"><a href="product-details-default.html"><img src="/frontend/images/product/default/home-1/default-3.jpg" alt=""></a></td>
                                    <td class="product_name"><a href="product-details-default.html">Handbag elit</a></td>
                                    <td class="product-price">$80.00</td>
                                    <td class="product_quantity"><label>Quantity</label> <input min="1" max="100" value="1" type="number"></td>
                                    <td class="product_total">$160.00</td>
                                </tr> <!-- End Cart Single Item-->
                            </tbody>
                        </table>
                    </div>
                    <div class="cart_submit">
                        <button class="btn btn-md btn-golden" type="submit">update cart</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection