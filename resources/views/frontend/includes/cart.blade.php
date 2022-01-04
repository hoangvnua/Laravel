<div id="offcanvas-add-cart" class="offcanvas offcanvas-rightside offcanvas-add-cart-section">
    <!-- Start Offcanvas Header -->
    <div class="offcanvas-header text-right">
        <button class="offcanvas-close"><i class="ion-android-close"></i></button>
    </div> <!-- End Offcanvas Header -->

    <!-- Start  Offcanvas Addcart Wrapper -->
    <div class="offcanvas-add-cart-wrapper">
        <h4 class="offcanvas-title">Giỏ hàng</h4>
        <ul class="offcanvas-cart">
            @foreach ($products as $product)
                <li class="offcanvas-cart-item-single">
                    <div class="offcanvas-cart-item-block">
                        <a href="{{ route('frontend.shop.show', $product->id) }}"
                            class="offcanvas-cart-item-image-link">
                            <img src="/frontend/images/product/default/home-1/default-1.jpg" alt=""
                                class="offcanvas-cart-image">
                        </a>
                        <div class="offcanvas-cart-item-content">
                            <a href="#" class="offcanvas-cart-item-link">{{ $product->name }}</a>
                            <div class="offcanvas-cart-item-details">
                                <span class="offcanvas-cart-item-details-quantity">Số lượng:
                                    {{ $product->qty }}</span><br>
                                <span class="offcanvas-cart-item-details-price">{{ $product->price }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="offcanvas-cart-item-delete text-right">
                        <a href="#" class="offcanvas-cart-item-delete"><i class="fa fa-trash-o"></i></a>
                    </div>
                </li>
            @endforeach


        </ul>
        {{-- <div class="offcanvas-cart-total-price">
            <span class="offcanvas-cart-total-price-text">Tổng:</span>
            <span class="offcanvas-cart-total-price-value">{{ $product->price * $product->qty }}</span>
        </div> --}}
        <ul class="offcanvas-cart-action-button">
            <li><a href="{{ route('frontend.cart') }}" class="btn btn-block btn-golden">Xem giỏ hàng</a></li>
            <li><a href="{{ route('frontend.pay.index') }}" class=" btn btn-block btn-golden mt-5">Thanh toán</a></li>
        </ul>
    </div> <!-- End  Offcanvas Addcart Wrapper -->

</div> <!-- End  Offcanvas Addcart Section -->
