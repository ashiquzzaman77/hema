@extends('frontend.frontend_dashboard')
@section('main')
@section('title')
    Ecommerce
@endsection

<!--Page Header-->
<div class="page-header text-center">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 d-flex justify-content-between align-items-center">
                <div class="page-title">
                    <h1>Shopping Cart</h1>
                </div>
                <!--Breadcrumbs-->
                <div class="breadcrumbs"><a href="{{ route('index') }}" title="Back to the home page">Home</a><span
                        class="main-title"><i class="icon anm anm-angle-right-l"></i>Your Shopping Cart</span></div>
                <!--End Breadcrumbs-->
            </div>
        </div>
    </div>
</div>
<!--End Page Header-->

<!--Main Content-->
<div class="container">

    @if ($cartQty)
        <div class="row">
            <!--Cart Content-->
            <div class="col-12 col-sm-12 col-md-12 col-lg-8 main-col">

                <!--Cart Form-->
                <form action="#" method="post" class="cart-table table-bottom-brd">
                    <table class="table align-middle">
                        <thead class="cart-row cart-header small-hide position-relative">
                            <tr>
                                <th class="action">&nbsp;</th>
                                <th colspan="2" class="text-start">Product</th>
                                <th class="text-center">Price</th>
                                <th class="text-center">Quantity</th>
                                <th class="text-center">Total</th>
                            </tr>
                        </thead>

                        <tbody id="cartPage">
                        </tbody>

                    </table>

                </form>
                <!--End Cart Form-->

                <div class="row">
                    <div class="col12">
                        <a href="{{ route('index') }}" class="btn btn-secondary btn-sm float-end"><i
                                class="icon anm anm-sync-ar me-2"></i>Continue shopping</a>
                    </div>
                </div>

                <!--Note with Shipping estimates-->
                <div class="row my-4 pt-3">

                    @if (Session::has('coupon'))
                    @else
                        <div class="col-12 col-sm-12 col-md-12 col-lg-6 mb-12 cart-col" id="couponField">
                            <div class="cart-discount">
                                <h5 class="mb-2">Discount Codes</h5>
                                <form action="#">
                                    <div class="form-group">
                                        <label for="address_zip">Enter your coupon code if you have one.</label>
                                        <div class="input-group0">

                                            <input class="form-control" id="coupon_name" type="text" name="coupon"
                                                required />

                                            <a type="submit" onclick="applyCoupon()" class="btn text-nowrap mt-3">Apply
                                                Coupon</a>

                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    @endif
                </div>
                <!--End Note with Shipping estimates-->

            </div>
            <!--End Cart Content-->

            <!--Cart Sidebar-->
            <div class="col-12 col-sm-12 col-md-12 col-lg-4 cart-footer">
                <div class="cart-info sidebar-sticky">
                    <div class="cart-order-detail cart-col">

                        <div id="couponCalField">

                        </div>


                        <p class="cart-shipping fst-normal freeShipclaim"><i
                                class="me-2 align-middle icon anm anm-truck-l"></i><b>FREE SHIPPING</b> ELIGIBLE
                        </p>

                        <a href="{{ route('checkout') }}" id="cartCheckout"
                            class="btn btn-lg my-4 checkout w-100">Proceed To Checkout</a>
                        <div class="paymnet-img text-center"><img
                                src="{{ asset('frontend/assets/images/icons/ssl.png') }}" alt="Payment" width="330"
                                height="35" /></div>
                    </div>
                </div>
            </div>
            <!--End Cart Sidebar-->
        </div>
    @else
        <!-- Coming-soon -->
        <div class="password-page mb-0">

            <h2 class="password-title mb-0">Cart Is Empty</h2>

        </div>
        <!-- End Coming-soon -->
    @endif

</div>
<!--End Main Content-->

<!--Related Products-->
{{-- <section class="section product-slider pb-0">
    <div class="container">
        <div class="section-header">
            <h2>You may also like</h2>
        </div>
        <!--Product Grid-->
        <div class="product-slider-4items gp10 arwOut5 grid-products">
            <div class="item col-item">
                <div class="product-box">
                    <!-- Start Product Image -->
                    <div class="product-image">
                        <!-- Start Product Image -->
                        <a href="product-layout1.html" class="product-img rounded-0"><img
                                class="rounded-0 blur-up lazyload" src="assets/images/products/product1.jpg"
                                alt="Product" title="Product" width="625" height="808" /></a>
                        <!-- End Product Image -->
                        <!-- Product label -->
                        <div class="product-labels"><span class="lbl on-sale">Sale</span></div>
                        <!-- End Product label -->
                        <!--Product Button-->
                        <div class="button-set style1">
                            <!--Cart Button-->
                            <a href="#quickshop-modal" class="btn-icon addtocart quick-shop-modal"
                                data-bs-toggle="modal" data-bs-target="#quickshop_modal">
                                <span class="icon-wrap d-flex-justify-center h-100 w-100"
                                    data-bs-toggle="tooltip" data-bs-placement="left" title="Quick Shop"><i
                                        class="icon anm anm-cart-l"></i><span class="text">Quick
                                        Shop</span></span>
                            </a>
                            <!--End Cart Button-->
                            <!--Quick View Button-->
                            <a href="#quickview-modal" class="btn-icon quickview quick-view-modal"
                                data-bs-toggle="modal" data-bs-target="#quickview_modal">
                                <span class="icon-wrap d-flex-justify-center h-100 w-100"
                                    data-bs-toggle="tooltip" data-bs-placement="left" title="Quick View"><i
                                        class="icon anm anm-search-plus-l"></i><span class="text">Quick
                                        View</span></span>
                            </a>
                            <!--End Quick View Button-->
                            <!--Wishlist Button-->
                            <a href="wishlist-style2.html" class="btn-icon wishlist"
                                data-bs-toggle="tooltip" data-bs-placement="left" title="Add To Wishlist"><i
                                    class="icon anm anm-heart-l"></i><span class="text">Add To
                                    Wishlist</span></a>
                            <!--End Wishlist Button-->
                            <!--Compare Button-->
                            <a href="compare-style2.html" class="btn-icon compare" data-bs-toggle="tooltip"
                                data-bs-placement="left" title="Add to Compare"><i
                                    class="icon anm anm-random-r"></i><span class="text">Add to
                                    Compare</span></a>
                            <!--End Compare Button-->
                        </div>
                        <!--End Product Button-->
                    </div>
                    <!-- End Product Image -->
                    <!-- Start Product Details -->
                    <div class="product-details text-left">
                        <!-- Product Name -->
                        <div class="product-name">
                            <a href="product-layout1.html">Oxford Cuban Shirt</a>
                        </div>
                        <!-- End Product Name -->
                        <!-- Product Price -->
                        <div class="product-price">
                            <span class="price old-price">$114.00</span><span class="price">$99.00</span>
                        </div>
                        <!-- End Product Price -->
                        <!-- Product Review -->
                        <div class="product-review">
                            <i class="icon anm anm-star"></i><i class="icon anm anm-star"></i><i
                                class="icon anm anm-star"></i><i class="icon anm anm-star"></i><i
                                class="icon anm anm-star-o"></i>
                            <span class="caption hidden ms-1">3 Reviews</span>
                        </div>
                        <!-- End Product Review -->
                    </div>
                    <!-- End product details -->
                </div>
            </div>
            <div class="item col-item">
                <div class="product-box">
                    <!-- Start Product Image -->
                    <div class="product-image">
                        <!-- Start Product Image -->
                        <a href="product-layout1.html" class="product-img rounded-0">
                            <!-- Image -->
                            <img class="primary rounded-0 blur-up lazyload"
                                data-src="assets/images/products/product2.jpg"
                                src="assets/images/products/product2.jpg" alt="Product" title="Product"
                                width="625" height="808" />
                            <!-- End Image -->
                            <!-- Hover Image -->
                            <img class="hover rounded-0 blur-up lazyload"
                                data-src="assets/images/products/product2-1.jpg"
                                src="assets/images/products/product2-1.jpg" alt="Product" title="Product"
                                width="625" height="808" />
                            <!-- End Hover Image -->
                        </a>
                        <!-- End Product Image -->
                        <!--Product Button-->
                        <div class="button-set style1">
                            <!--Cart Button-->
                            <a href="#quickshop-modal" class="btn-icon addtocart quick-shop-modal"
                                data-bs-toggle="modal" data-bs-target="#quickshop_modal">
                                <span class="icon-wrap d-flex-justify-center h-100 w-100"
                                    data-bs-toggle="tooltip" data-bs-placement="left"
                                    title="Select Options"><i class="icon anm anm-cart-l"></i><span
                                        class="text">Select Options</span></span>
                            </a>
                            <!--End Cart Button-->
                            <!--Quick View Button-->
                            <a href="#quickview-modal" class="btn-icon quickview quick-view-modal"
                                data-bs-toggle="modal" data-bs-target="#quickview_modal">
                                <span class="icon-wrap d-flex-justify-center h-100 w-100"
                                    data-bs-toggle="tooltip" data-bs-placement="left" title="Quick View"><i
                                        class="icon anm anm-search-plus-l"></i><span class="text">Quick
                                        View</span></span>
                            </a>
                            <!--End Quick View Button-->
                            <!--Wishlist Button-->
                            <a href="wishlist-style2.html" class="btn-icon wishlist"
                                data-bs-toggle="tooltip" data-bs-placement="left" title="Add To Wishlist"><i
                                    class="icon anm anm-heart-l"></i><span class="text">Add To
                                    Wishlist</span></a>
                            <!--End Wishlist Button-->
                            <!--Compare Button-->
                            <a href="compare-style2.html" class="btn-icon compare" data-bs-toggle="tooltip"
                                data-bs-placement="left" title="Add to Compare"><i
                                    class="icon anm anm-random-r"></i><span class="text">Add to
                                    Compare</span></a>
                            <!--End Compare Button-->
                        </div>
                        <!--End Product Button-->
                    </div>
                    <!-- End Product Image -->
                    <!-- Start Product Details -->
                    <div class="product-details text-left">
                        <!-- Product Name -->
                        <div class="product-name">
                            <a href="product-layout1.html">Cuff Beanie Cap</a>
                        </div>
                        <!-- End Product Name -->
                        <!-- Product Price -->
                        <div class="product-price">
                            <span class="price">$128.00</span>
                        </div>
                        <!-- End Product Price -->
                        <!-- Product Review -->
                        <div class="product-review">
                            <i class="icon anm anm-star"></i><i class="icon anm anm-star"></i><i
                                class="icon anm anm-star"></i><i class="icon anm anm-star"></i><i
                                class="icon anm anm-star"></i>
                            <span class="caption hidden ms-1">8 Reviews</span>
                        </div>
                        <!-- End Product Review -->
                    </div>
                    <!-- End product details -->
                </div>
            </div>
            <div class="item col-item">
                <div class="product-box">
                    <!-- Start Product Image -->
                    <div class="product-image">
                        <!-- Start Product Image -->
                        <a href="product-layout1.html" class="product-img rounded-0">
                            <!-- Image -->
                            <img class="primary rounded-0 blur-up lazyload"
                                data-src="assets/images/products/product3.jpg"
                                src="assets/images/products/product3.jpg" alt="Product" title="Product"
                                width="625" height="808" />
                            <!-- End Image -->
                            <!-- Hover Image -->
                            <img class="hover rounded-0 blur-up lazyload"
                                data-src="assets/images/products/product3-1.jpg"
                                src="assets/images/products/product3-1.jpg" alt="Product" title="Product"
                                width="625" height="808" />
                            <!-- End Hover Image -->
                        </a>
                        <!-- End Product Image -->
                        <!-- Product label -->
                        <div class="product-labels"><span class="lbl pr-label3">Trending</span></div>
                        <!-- End Product label -->
                        <!--Product Button-->
                        <div class="button-set style1">
                            <!--Cart Button-->
                            <a href="#addtocart-modal" class="btn-icon addtocart add-to-cart-modal"
                                data-bs-toggle="modal" data-bs-target="#addtocart_modal">
                                <span class="icon-wrap d-flex-justify-center h-100 w-100"
                                    data-bs-toggle="tooltip" data-bs-placement="left" title="Add to Cart"><i
                                        class="icon anm anm-cart-l"></i><span class="text">Add to
                                        Cart</span></span>
                            </a>
                            <!--End Cart Button-->
                            <!--Quick View Button-->
                            <a href="#quickview-modal" class="btn-icon quickview quick-view-modal"
                                data-bs-toggle="modal" data-bs-target="#quickview_modal">
                                <span class="icon-wrap d-flex-justify-center h-100 w-100"
                                    data-bs-toggle="tooltip" data-bs-placement="left" title="Quick View"><i
                                        class="icon anm anm-search-plus-l"></i><span class="text">Quick
                                        View</span></span>
                            </a>
                            <!--End Quick View Button-->
                            <!--Wishlist Button-->
                            <a href="wishlist-style2.html" class="btn-icon wishlist"
                                data-bs-toggle="tooltip" data-bs-placement="left" title="Add To Wishlist"><i
                                    class="icon anm anm-heart-l"></i><span class="text">Add To
                                    Wishlist</span></a>
                            <!--End Wishlist Button-->
                            <!--Compare Button-->
                            <a href="compare-style2.html" class="btn-icon compare" data-bs-toggle="tooltip"
                                data-bs-placement="left" title="Add to Compare"><i
                                    class="icon anm anm-random-r"></i><span class="text">Add to
                                    Compare</span></a>
                            <!--End Compare Button-->
                        </div>
                        <!--End Product Button-->
                    </div>
                    <!-- End Product Image -->
                    <!-- Start Product Details -->
                    <div class="product-details text-left">
                        <!-- Product Name -->
                        <div class="product-name">
                            <a href="product-layout1.html">Flannel Collar Shirt</a>
                        </div>
                        <!-- End Product Name -->
                        <!-- Product Price -->
                        <div class="product-price">
                            <span class="price">$99.00</span>
                        </div>
                        <!-- End Product Price -->
                        <!-- Product Review -->
                        <div class="product-review">
                            <i class="icon anm anm-star"></i><i class="icon anm anm-star"></i><i
                                class="icon anm anm-star-o"></i><i class="icon anm anm-star-o"></i><i
                                class="icon anm anm-star-o"></i>
                            <span class="caption hidden ms-1">10 Reviews</span>
                        </div>
                        <!-- End Product Review -->
                    </div>
                    <!-- End product details -->
                </div>
            </div>
            <div class="item col-item">
                <div class="product-box">
                    <!-- Start Product Image -->
                    <div class="product-image">
                        <!-- Start Product Image -->
                        <a href="product-layout1.html" class="product-img rounded-0">
                            <!-- Image -->
                            <img class="primary rounded-0 blur-up lazyload"
                                data-src="assets/images/products/product4.jpg"
                                src="assets/images/products/product4.jpg" alt="Product" title="Product"
                                width="625" height="808" />
                            <!-- End Image -->
                            <!-- Hover Image -->
                            <img class="hover rounded-0 blur-up lazyload"
                                data-src="assets/images/products/product4-1.jpg"
                                src="assets/images/products/product4-1.jpg" alt="Product" title="Product"
                                width="625" height="808" />
                            <!-- End Hover Image -->
                        </a>
                        <!-- End Product Image -->
                        <!-- Product label -->
                        <div class="product-labels"><span class="lbl on-sale">50% Off</span></div>
                        <!-- End Product label -->
                        <!--Product Button-->
                        <div class="button-set style1">
                            <!--Cart Button-->
                            <a href="#addtocart-modal" class="btn-icon addtocart add-to-cart-modal"
                                data-bs-toggle="modal" data-bs-target="#addtocart_modal">
                                <span class="icon-wrap d-flex-justify-center h-100 w-100"
                                    data-bs-toggle="tooltip" data-bs-placement="left" title="Add to Cart"><i
                                        class="icon anm anm-cart-l"></i><span class="text">Add to
                                        Cart</span></span>
                            </a>
                            <!--End Cart Button-->
                            <!--Quick View Button-->
                            <a href="#quickview-modal" class="btn-icon quickview quick-view-modal"
                                data-bs-toggle="modal" data-bs-target="#quickview_modal">
                                <span class="icon-wrap d-flex-justify-center h-100 w-100"
                                    data-bs-toggle="tooltip" data-bs-placement="left" title="Quick View"><i
                                        class="icon anm anm-search-plus-l"></i><span class="text">Quick
                                        View</span></span>
                            </a>
                            <!--End Quick View Button-->
                            <!--Wishlist Button-->
                            <a href="wishlist-style2.html" class="btn-icon wishlist"
                                data-bs-toggle="tooltip" data-bs-placement="left" title="Add To Wishlist"><i
                                    class="icon anm anm-heart-l"></i><span class="text">Add To
                                    Wishlist</span></a>
                            <!--End Wishlist Button-->
                            <!--Compare Button-->
                            <a href="compare-style2.html" class="btn-icon compare" data-bs-toggle="tooltip"
                                data-bs-placement="left" title="Add to Compare"><i
                                    class="icon anm anm-random-r"></i><span class="text">Add to
                                    Compare</span></a>
                            <!--End Compare Button-->
                        </div>
                        <!--End Product Button-->
                    </div>
                    <!-- End Product Image -->
                    <!-- Start Product Details -->
                    <div class="product-details text-left">
                        <!-- Product Name -->
                        <div class="product-name">
                            <a href="product-layout1.html">Cotton Hooded Hoodie</a>
                        </div>
                        <!-- End Product Name -->
                        <!-- Product Price -->
                        <div class="product-price">
                            <span class="price old-price">$198.00</span><span class="price">$99.00</span>
                        </div>
                        <!-- End Product Price -->
                        <!-- Product Review -->
                        <div class="product-review">
                            <i class="icon anm anm-star-o"></i><i class="icon anm anm-star-o"></i><i
                                class="icon anm anm-star-o"></i><i class="icon anm anm-star-o"></i><i
                                class="icon anm anm-star-o"></i>
                            <span class="caption hidden ms-1">0 Reviews</span>
                        </div>
                        <!-- End Product Review -->
                    </div>
                    <!-- End product details -->
                </div>
            </div>
            <div class="item col-item">
                <div class="product-box">
                    <!-- Start Product Image -->
                    <div class="product-image">
                        <!-- Start Product Image -->
                        <a href="product-layout1.html" class="product-img rounded-0">
                            <!-- Image -->
                            <img class="primary rounded-0 blur-up lazyload"
                                data-src="assets/images/products/product5.jpg"
                                src="assets/images/products/product5.jpg" alt="Product" title="Product"
                                width="625" height="808" />
                            <!-- End Image -->
                            <!-- Hover Image -->
                            <img class="hover rounded-0 blur-up lazyload"
                                data-src="assets/images/products/product5-1.jpg"
                                src="assets/images/products/product5-1.jpg" alt="Product" title="Product"
                                width="625" height="808" />
                            <!-- End Hover Image -->
                        </a>
                        <!-- End Product Image -->
                        <!-- Product label -->
                        <div class="product-labels"><span class="lbl pr-label2">Hot</span></div>
                        <!-- End Product label -->
                        <!--Product Button-->
                        <div class="button-set style1">
                            <!--Cart Button-->
                            <a href="#addtocart-modal" class="btn-icon addtocart add-to-cart-modal"
                                data-bs-toggle="modal" data-bs-target="#addtocart_modal">
                                <span class="icon-wrap d-flex-justify-center h-100 w-100"
                                    data-bs-toggle="tooltip" data-bs-placement="left" title="Add to Cart"><i
                                        class="icon anm anm-cart-l"></i><span class="text">Add to
                                        Cart</span></span>
                            </a>
                            <!--End Cart Button-->
                            <!--Quick View Button-->
                            <a href="#quickview-modal" class="btn-icon quickview quick-view-modal"
                                data-bs-toggle="modal" data-bs-target="#quickview_modal">
                                <span class="icon-wrap d-flex-justify-center h-100 w-100"
                                    data-bs-toggle="tooltip" data-bs-placement="left" title="Quick View"><i
                                        class="icon anm anm-search-plus-l"></i><span class="text">Quick
                                        View</span></span>
                            </a>
                            <!--End Quick View Button-->
                            <!--Wishlist Button-->
                            <a href="wishlist-style2.html" class="btn-icon wishlist"
                                data-bs-toggle="tooltip" data-bs-placement="left" title="Add To Wishlist"><i
                                    class="icon anm anm-heart-l"></i><span class="text">Add To
                                    Wishlist</span></a>
                            <!--End Wishlist Button-->
                            <!--Compare Button-->
                            <a href="compare-style2.html" class="btn-icon compare" data-bs-toggle="tooltip"
                                data-bs-placement="left" title="Add to Compare"><i
                                    class="icon anm anm-random-r"></i><span class="text">Add to
                                    Compare</span></a>
                            <!--End Compare Button-->
                        </div>
                        <!--End Product Button-->
                    </div>
                    <!-- End Product Image -->
                    <!-- Start Product Details -->
                    <div class="product-details text-left">
                        <!-- Product Name -->
                        <div class="product-name">
                            <a href="product-layout1.html">Denim Women Shorts</a>
                        </div>
                        <!-- End Product Name -->
                        <!-- Product Price -->
                        <div class="product-price">
                            <span class="price">$39.00</span>
                        </div>
                        <!-- End Product Price -->
                        <!-- Product Review -->
                        <div class="product-review">
                            <i class="icon anm anm-star"></i><i class="icon anm anm-star"></i><i
                                class="icon anm anm-star-o"></i><i class="icon anm anm-star-o"></i><i
                                class="icon anm anm-star-o"></i>
                            <span class="caption hidden ms-1">3 Reviews</span>
                        </div>
                        <!-- End Product Review -->
                    </div>
                    <!-- End product details -->
                </div>
            </div>
        </div>
        <!--End Product Grid-->
    </div>
</section> --}}
<!--End Related Products-->

@endsection
