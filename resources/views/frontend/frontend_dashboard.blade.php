<!DOCTYPE html>
<html class="no-js" lang="en">

<head>

    @notifyCss

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="description">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @yield('share')

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('frontend/assets/images/favicon.png') }}" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

    <!-- Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/plugins.css') }}">
    <!-- Main Style CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/style-min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/responsive.css') }}">



    <!-- Title Of Site -->
    <title>@yield('title')</title>

    <style>
        .whats_main {
            position: fixed;
            bottom: 40px;
            right: 20px;
            text-align: right;
            z-index: 10;
        }
    </style>

</head>

<body class="template-index index-demo1">

    <!--Page Wrapper-->
    <div class="page-wrapper">

        {{-- What Up --}}
        <div class="whats_main">
            <a href="https://wa.me/+8801728499226" target="blank">
                <svg height="60px" width="60px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 58 58" xml:space="preserve" fill="#000000">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <g>
                            <path style="fill:#35c24a;"
                                d="M0,58l4.988-14.963C2.457,38.78,1,33.812,1,28.5C1,12.76,13.76,0,29.5,0S58,12.76,58,28.5 S45.24,57,29.5,57c-4.789,0-9.299-1.187-13.26-3.273L0,58z">
                            </path>
                            <path style="fill:#FFFFFF;"
                                d="M47.683,37.985c-1.316-2.487-6.169-5.331-6.169-5.331c-1.098-0.626-2.423-0.696-3.049,0.42 c0,0-1.577,1.891-1.978,2.163c-1.832,1.241-3.529,1.193-5.242-0.52l-3.981-3.981l-3.981-3.981c-1.713-1.713-1.761-3.41-0.52-5.242 c0.272-0.401,2.163-1.978,2.163-1.978c1.116-0.627,1.046-1.951,0.42-3.049c0,0-2.844-4.853-5.331-6.169 c-1.058-0.56-2.357-0.364-3.203,0.482l-1.758,1.758c-5.577,5.577-2.831,11.873,2.746,17.45l5.097,5.097l5.097,5.097 c5.577,5.577,11.873,8.323,17.45,2.746l1.758-1.758C48.048,40.341,48.243,39.042,47.683,37.985z">
                            </path>
                        </g>
                    </g>
                </svg>
            </a>
        </div>
        {{-- What Up --}}

        {{-- Hearder Start --}}
        @include('frontend.body.header')
        {{-- Header End --}}

        <!-- Body Container -->
        <div id="page-content" class="mb-0">

            @yield('main')

        </div>
        <!-- End Body Container -->

        <!--Footer-->
        @include('frontend.body.footer')
        <!--End Footer-->

        <!--Sticky Menubar Mobile-->
        <div class="menubar-mobile d-flex align-items-center justify-content-between d-lg-none">
            <div class="menubar-shop menubar-item">
                <a href="shop-grid-view.html"><i class="menubar-icon anm anm-th-large-l"></i><span
                        class="menubar-label">Shop</span></a>
            </div>
            <div class="menubar-account menubar-item">
                <a href="my-account.html"><i class="menubar-icon icon anm anm-user-al"></i><span
                        class="menubar-label">Account</span></a>
            </div>
            <div class="menubar-search menubar-item">
                <a href="index.html"><span class="menubar-icon anm anm-home-l"></span><span
                        class="menubar-label">Home</span></a>
            </div>
            <div class="menubar-wish menubar-item">
                <a href="wishlist-style1.html">
                    <span class="span-count position-relative text-center"><i
                            class="menubar-icon icon anm anm-heart-l"></i><span
                            class="wishlist-count counter menubar-count">0</span></span>
                    <span class="menubar-label">Wishlist</span>
                </a>
            </div>
            <div class="menubar-cart menubar-item">
                <a href="#;" class="btn-minicart" data-bs-toggle="offcanvas" data-bs-target="#minicart-drawer">
                    <span class="span-count position-relative text-center"><i
                            class="menubar-icon icon anm anm-cart-l"></i><span
                            class="cart-count counter menubar-count">2</span></span>
                    <span class="menubar-label">Cart</span>
                </a>
            </div>
        </div>
        <!--End Sticky Menubar Mobile-->

        <!--Scoll Top-->

        {{-- <div id="site-scroll"><i class="icon anm anm-arw-up"></i></div> --}}

        <!--End Scoll Top-->

        <!--MiniCart Drawer-->
        @include('frontend.body.minicart')
        <!--End MiniCart Drawer-->

        <!-- Product Addtocart Modal-->
        <div class="addtocart-modal modal fade" id="addtocart_modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        <form method="post" action="#" id="product-form-addtocart"
                            class="product-form align-items-center">
                            <h3 class="title mb-3 text-success text-center">Added to cart Successfully!</h3>
                            <div class="row d-flex-center text-center">
                                <div class="col-md-6">
                                    <!-- Product Image -->
                                    <a class="product-image" href="product-layout1.html"><img
                                            class="blur-up lazyload"
                                            data-src="{{ asset('frontend/assets/') }}/images/products/addtocart-modal.jpg"
                                            src="{{ asset('frontend/assets/') }}/images/products/addtocart-modal.jpg"
                                            alt="Product" title="Product" width="625" height="800" /></a>
                                    <!-- End Product Image -->
                                </div>
                                <div class="col-md-6 mt-3 mt-md-0">
                                    <!-- Product Info -->
                                    <div class="product-details">

                                        <a class="product-title" href="product-layout1.html">Cuff Beanie Cap</a>
                                        <p class="product-clr my-2 text-muted">Black / XL</p>
                                    </div>
                                    <div class="addcart-total rounded-5">
                                        <p class="product-items mb-2">There are <strong>1</strong> items in your cart
                                        </p>
                                        <p class="d-flex-justify-center">Total: <span class="price">$198.00</span>
                                        </p>
                                    </div>
                                    <!-- End Product Info -->
                                    <!-- Product Action -->
                                    <div class="product-form-submit d-flex-justify-center">
                                        <a href="#"
                                            class="btn btn-outline-primary product-continue w-100">Continue
                                            Shopping</a>
                                        <a href="cart-style1.html"
                                            class="btn btn-secondary product-viewcart w-100 my-2 my-md-3">View Cart</a>
                                        <a href="checkout-style1.html"
                                            class="btn btn-primary product-checkout w-100">Proceed to checkout</a>
                                    </div>
                                    <!-- End Product Action -->
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Product Addtocart Modal -->

        <!-- Product Quickview Modal-->
        {{-- <div class="quickview-modal modal fade" id="quickview_modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                        <div class="row">
                            <div class="col-12 col-sm-6 col-md-6 col-lg-6 mb-3 mb-md-0">
                                <!-- Model Thumbnail -->
                                <div id="quickView" class="carousel slide">
                                    <!-- Image Slide carousel items -->
                                    <div class="carousel-inner">
                                        <div class="item carousel-item active" data-bs-slide-number="0">
                                            <img class="blur-up lazyload"
                                                data-src="{{ asset('frontend/assets/') }}/images/products/product2.jpg"
                                                src="{{ asset('frontend/assets/') }}/images/products/product2.jpg"
                                                alt="product" title="Product" width="625" height="808" />
                                        </div>
                                        <div class="item carousel-item" data-bs-slide-number="1">
                                            <img class="blur-up lazyload"
                                                data-src="{{ asset('frontend/assets/') }}/images/products/product2-1.jpg"
                                                src="{{ asset('frontend/assets/') }}/images/products/product2-1.jpg"
                                                alt="product" title="Product" width="625" height="808" />
                                        </div>
                                        <div class="item carousel-item" data-bs-slide-number="2">
                                            <img class="blur-up lazyload"
                                                data-src="{{ asset('frontend/assets/') }}/images/products/product2-2.jpg"
                                                src="{{ asset('frontend/assets/') }}/images/products/product2-2.jpg"
                                                alt="product" title="Product" width="625" height="808" />
                                        </div>
                                        <div class="item carousel-item" data-bs-slide-number="3">
                                            <img class="blur-up lazyload"
                                                data-src="{{ asset('frontend/assets/') }}/images/products/product2-3.jpg"
                                                src="{{ asset('frontend/assets/') }}/images/products/product2-3.jpg"
                                                alt="product" title="Product" width="625" height="808" />
                                        </div>
                                        <div class="item carousel-item" data-bs-slide-number="4">
                                            <img class="blur-up lazyload"
                                                data-src="{{ asset('frontend/assets/') }}/images/products/product2-4.jpg"
                                                src="{{ asset('frontend/assets/') }}/images/products/product2-4.jpg"
                                                alt="product" title="Product" width="625" height="808" />
                                        </div>
                                        <div class="item carousel-item" data-bs-slide-number="5">
                                            <img class="blur-up lazyload"
                                                data-src="{{ asset('frontend/assets/') }}/images/products/product2-5.jpg"
                                                src="{{ asset('frontend/assets/') }}/images/products/product2-5.jpg"
                                                alt="product" title="Product" width="625" height="808" />
                                        </div>
                                    </div>
                                    <!-- End Image Slide carousel items -->
                                    <!-- Thumbnail image -->
                                    <div class="model-thumbnail-img">
                                        <!-- Thumbnail slide -->
                                        <div class="carousel-indicators list-inline">
                                            <div class="list-inline-item active" id="carousel-selector-0"
                                                data-bs-slide-to="0" data-bs-target="#quickView">
                                                <img class="blur-up lazyload"
                                                    data-src="{{ asset('frontend/assets/') }}/images/products/product2.jpg"
                                                    src="{{ asset('frontend/assets/') }}/images/products/product2.jpg"
                                                    alt="product" title="Product" width="625" height="808" />
                                            </div>
                                            <div class="list-inline-item" id="carousel-selector-1"
                                                data-bs-slide-to="1" data-bs-target="#quickView">
                                                <img class="blur-up lazyload"
                                                    data-src="{{ asset('frontend/assets/') }}/images/products/product2-1.jpg"
                                                    src="{{ asset('frontend/assets/') }}/images/products/product2-1.jpg"
                                                    alt="product" title="Product" width="625" height="808" />
                                            </div>
                                            <div class="list-inline-item" id="carousel-selector-2"
                                                data-bs-slide-to="2" data-bs-target="#quickView">
                                                <img class="blur-up lazyload"
                                                    data-src="{{ asset('frontend/assets/') }}/images/products/product2-2.jpg"
                                                    src="{{ asset('frontend/assets/') }}/images/products/product2-2.jpg"
                                                    alt="product" title="Product" width="625" height="808" />
                                            </div>
                                            <div class="list-inline-item" id="carousel-selector-3"
                                                data-bs-slide-to="3" data-bs-target="#quickView">
                                                <img class="blur-up lazyload"
                                                    data-src="{{ asset('frontend/assets/') }}/images/products/product2-3.jpg"
                                                    src="{{ asset('frontend/assets/') }}/images/products/product2-3.jpg"
                                                    alt="product" title="Product" width="625" height="808" />
                                            </div>
                                            <div class="list-inline-item" id="carousel-selector-4"
                                                data-bs-slide-to="4" data-bs-target="#quickView">
                                                <img class="blur-up lazyload"
                                                    data-src="{{ asset('frontend/assets/') }}/images/products/product2-4.jpg"
                                                    src="{{ asset('frontend/assets/') }}/images/products/product2-4.jpg"
                                                    alt="product" title="Product" width="625" height="808" />
                                            </div>
                                            <div class="list-inline-item" id="carousel-selector-5"
                                                data-bs-slide-to="5" data-bs-target="#quickView">
                                                <img class="blur-up lazyload"
                                                    data-src="{{ asset('frontend/assets/') }}/images/products/product2-5.jpg"
                                                    src="{{ asset('frontend/assets/') }}/images/products/product2-5.jpg"
                                                    alt="product" title="Product" width="625" height="808" />
                                            </div>
                                        </div>
                                        <!-- End Thumbnail slide -->
                                        <!-- Carousel arrow button -->
                                        <a class="carousel-control-prev carousel-arrow rounded-1" href="#quickView"
                                            data-bs-target="#quickView" data-bs-slide="prev"><i
                                                class="icon anm anm-angle-left-r"></i></a>
                                        <a class="carousel-control-next carousel-arrow rounded-1" href="#quickView"
                                            data-bs-target="#quickView" data-bs-slide="next"><i
                                                class="icon anm anm-angle-right-r"></i></a>
                                        <!-- End Carousel arrow button -->
                                    </div>
                                    <!-- End Thumbnail image -->
                                </div>
                                <!-- End Model Thumbnail -->
                                <div class="text-center mt-3"><a href="product-layout1.html" class="text-link">View
                                        More Details</a></div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-6">

                                <div class="product-arrow d-flex justify-content-between">
                                    <h2 class="product-title">Product Quick View Popup</h2>
                                </div>
                                <div class="product-review d-flex mt-0 mb-2">
                                    <div class="rating"><i class="icon anm anm-star"></i><i
                                            class="icon anm anm-star"></i><i class="icon anm anm-star"></i><i
                                            class="icon anm anm-star"></i><i class="icon anm anm-star-o"></i></div>
                                    <div class="reviews ms-2"><a href="#">6 Reviews</a></div>
                                </div>
                                <div class="product-info">
                                    <p class="product-vendor">Vendor:<span class="text"><a
                                                href="#">Sparx</a></span></p>
                                    <p class="product-type">Product Type:<span class="text">Caps</span></p>
                                    <p class="product-sku">SKU:<span class="text">RF104456</span></p>
                                </div>
                                <div class="pro-stockLbl my-2">
                                    <span class="d-flex-center stockLbl instock d-none"><i
                                            class="icon anm anm-check-cil"></i><span> In stock</span></span>
                                    <span class="d-flex-center stockLbl preorder d-none"><i
                                            class="icon anm anm-clock-r"></i><span> Pre-order Now</span></span>
                                    <span class="d-flex-center stockLbl outstock d-none"><i
                                            class="icon anm anm-times-cil"></i> <span>Sold out</span></span>
                                    <span class="d-flex-center stockLbl lowstock" data-qty="15"><i
                                            class="icon anm anm-exclamation-cir"></i><span> Order now, Only <span
                                                class="items">10</span> left!</span></span>
                                </div>
                                <div class="product-price d-flex-center my-3">
                                    <span class="price old-price">$135.00</span><span class="price">$99.00</span>
                                </div>
                                <div class="sort-description">The standard chunk of Lorem Ipsum used since the 1500s is
                                    reproduced below for those interested.</div>
                                <form method="post" action="#" id="product_form--option" class="product-form">
                                    <div class="product-options d-flex-wrap">
                                        <div class="product-item swatches-image w-100 mb-3 swatch-0 option1"
                                            data-option-index="0">
                                            <label class="label d-flex align-items-center">Color:<span
                                                    class="slVariant ms-1 fw-bold">Blue</span></label>
                                            <ul class="variants-clr swatches d-flex-center pt-1 clearfix">
                                                <li class="swatch large radius available active"><img
                                                        src="{{ asset('frontend/assets/') }}/images/products/swatches/blue-red.jpg"
                                                        alt="image" width="70" height="70"
                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                        title="Blue" /></li>
                                                <li class="swatch large radius available"><img
                                                        src="{{ asset('frontend/assets/') }}/images/products/swatches/blue-red.jpg"
                                                        alt="image" width="70" height="70"
                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                        title="Black" /></li>
                                                <li class="swatch large radius available"><img
                                                        src="{{ asset('frontend/assets/') }}/images/products/swatches/blue-red.jpg"
                                                        alt="image" width="70" height="70"
                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                        title="Pink" /></li>
                                                <li class="swatch large radius available green"><span
                                                        class="swatchLbl" data-bs-toggle="tooltip"
                                                        data-bs-placement="top" title="Green"></span></li>
                                                <li class="swatch large radius soldout yellow"><span class="swatchLbl"
                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                        title="Yellow"></span></li>
                                            </ul>
                                        </div>
                                        <div class="product-item swatches-size w-100 mb-3 swatch-1 option2"
                                            data-option-index="1">
                                            <label class="label d-flex align-items-center">Size:<span
                                                    class="slVariant ms-1 fw-bold">S</span></label>
                                            <ul class="variants-size size-swatches d-flex-center pt-1 clearfix">
                                                <li class="swatch large radius soldout"><span class="swatchLbl"
                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                        title="XS">XS</span></li>
                                                <li class="swatch large radius available active"><span
                                                        class="swatchLbl" data-bs-toggle="tooltip"
                                                        data-bs-placement="top" title="S">S</span></li>
                                                <li class="swatch large radius available"><span class="swatchLbl"
                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                        title="M">M</span></li>
                                                <li class="swatch large radius available"><span class="swatchLbl"
                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                        title="L">L</span></li>
                                                <li class="swatch large radius available"><span class="swatchLbl"
                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                        title="XL">XL</span></li>
                                            </ul>
                                        </div>
                                        <div class="product-action d-flex-wrap w-100 pt-1 mb-3 clearfix">
                                            <div class="quantity">
                                                <div class="qtyField rounded">
                                                    <a class="qtyBtn minus" href="#;"><i
                                                            class="icon anm anm-minus-r" aria-hidden="true"></i></a>
                                                    <input type="text" name="quantity" value="1"
                                                        class="product-form__input qty">
                                                    <a class="qtyBtn plus" href="#;"><i
                                                            class="icon anm anm-plus-l" aria-hidden="true"></i></a>
                                                </div>
                                            </div>
                                            <div class="addtocart ms-3 fl-1">
                                                <button type="submit" name="add"
                                                    class="btn product-cart-submit w-100"><span>Add to
                                                        cart</span></button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <div class="wishlist-btn d-flex-center">
                                    <a class="add-wishlist d-flex-center me-3" href="wishlist-style1.html"
                                        title="Add to Wishlist"><i class="icon anm anm-heart-l me-1"></i> <span>Add to
                                            Wishlist</span></a>
                                    <a class="add-compare d-flex-center" href="compare-style1.html"
                                        title="Add to Compare"><i class="icon anm anm-random-r me-2"></i> <span>Add to
                                            Compare</span></a>
                                </div>
                                <!-- Social Sharing -->
                                <div class="social-sharing share-icon d-flex-center mx-0 mt-3">
                                    <span class="sharing-lbl">Share :</span>
                                    <a href="#" class="d-flex-center btn btn-link btn--share share-facebook"
                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Share on Facebook"><i
                                            class="icon anm anm-facebook-f"></i><span
                                            class="share-title d-none">Facebook</span></a>
                                    <a href="#" class="d-flex-center btn btn-link btn--share share-twitter"
                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Tweet on Twitter"><i
                                            class="icon anm anm-twitter"></i><span
                                            class="share-title d-none">Tweet</span></a>
                                    <a href="#" class="d-flex-center btn btn-link btn--share share-pinterest"
                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Pin on Pinterest"><i
                                            class="icon anm anm-pinterest-p"></i> <span class="share-title d-none">Pin
                                            it</span></a>
                                    <a href="#" class="d-flex-center btn btn-link btn--share share-linkedin"
                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                        title="Share on Instagram"><i class="icon anm anm-linkedin-in"></i><span
                                            class="share-title d-none">Instagram</span></a>
                                    <a href="#" class="d-flex-center btn btn-link btn--share share-whatsapp"
                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Share on WhatsApp"><i
                                            class="icon anm anm-envelope-l"></i><span
                                            class="share-title d-none">WhatsApp</span></a>
                                    <a href="#" class="d-flex-center btn btn-link btn--share share-email"
                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Share by Email"><i
                                            class="icon anm anm-whatsapp"></i><span
                                            class="share-title d-none">Email</span></a>
                                </div>
                                <!-- End Social Sharing -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <!--End Product Quickview Modal-->

        <!--Newsletter Modal-->
        <div class="newsletter-modal style3 modal fade" id="newsletter_modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content border-0">
                    <div class="modal-body p-0">
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                        <div class="newsletter-wrap d-flex flex-column">
                            <div class="newsltr-img d-none d-sm-none d-md-block">
                                <img class="rounded-bottom-0 blur-up lazyload"
                                    data-src="{{ asset('frontend/assets/') }}/images/newsletter/newsletter-s6.webp"
                                    src="{{ asset('frontend/assets/') }}/images/newsletter/newsletter-s6.webp"
                                    alt="Join Our Newsletter Get 20% OFF First Order"
                                    title="Join Our Newsletter Get 20% OFF First Order" width="582"
                                    height="202" />
                            </div>
                            <div class="newsltr-text text-center">
                                <div class="wraptext mw-100">
                                    <h2 class="title text-transform-none">Join Our Newsletter <br>Get 20% OFF First
                                        Order</h2>
                                    <p class="text">Stay Informed! Monthly Tips, Tracks and Discount.</p>
                                    <form action="{{ route('store.subscribe') }}" method="post"
                                        class="mcNewsletter mb-3">
                                        @csrf
                                        <div class="input-group">
                                            <input type="email"
                                                class="form-control input-group-field newsletter-input" name="email"
                                                value="" autocomplete="off"
                                                placeholder="Enter your email address..." required />
                                            <button type="submit"
                                                class="input-group-btn btn btn-secondary newsletter-submit"
                                                name="commit">Subscribe</button>
                                        </div>
                                    </form>

                                    @php
                                        $sitting = App\Models\Sitting::find(1);
                                    @endphp

                                    <ul
                                        class="list-inline social-icons d-inline-flex justify-content-center mb-3 w-100">

                                        <li class="list-inline-item"><a href="{{ $sitting->facebook }}"
                                                data-bs-toggle="tooltip" data-bs-placement="top" title="Facebook"><i
                                                    class="icon anm anm-facebook-f"></i></a>
                                        </li>

                                        <li class="list-inline-item"><a href="{{ $sitting->twitter }}"
                                                data-bs-toggle="tooltip" data-bs-placement="top" title="Twitter"><i
                                                    class="icon anm anm-twitter"></i></a></li>


                                        <li class="list-inline-item"><a href="{{ $sitting->linkdin }}"
                                                data-bs-toggle="tooltip" data-bs-placement="top" title="Linkedin"><i
                                                    class="icon anm anm-linkedin-in"></i></a>
                                        </li>

                                        <li class="list-inline-item"><a href="{{ $sitting->intagram }}"
                                                data-bs-toggle="tooltip" data-bs-placement="top" title="Instagram"><i
                                                    class="icon anm anm-instagram"></i></a></li>
                                    </ul>
                                    <div class="customCheckbox checkboxlink clearfix justify-content-center">
                                        <input id="dontshow" name="newsPopup" type="checkbox" />
                                        <label for="dontshow" class="mb-0">Don't show this popup again</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End Newsletter Modal-->


        <!-- Including Jquery/Javascript -->

        <!-- Plugins JS -->
        <script src="{{ asset('frontend/assets/js/plugins.js') }}"></script>

        <!-- Main JS -->
        <script src="{{ asset('frontend/assets/js/main.js') }}"></script>

        <script src="{{ asset('frontend/assets/js/scripts.js') }}"></script>

        <!--Newsletter Modal Cookies-->
        <script>
            $(window).ready(function() {
                setTimeout(function() {
                    $('#newsletter_modal').modal("show");
                }, 7000);
            });
        </script>
        <!--End Newsletter Modal Cookies-->



        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script type="text/javascript">
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            })
        </script>

        @yield('catscripts')

        <script type="text/javascript">
            /// details Add To Cart Prodcut

            function addToCartDetails() {

                var product_name = $('#dpname').text();
                var id = $('#dproduct_id').val();
                var vendor = $('#vproduct_id').val();
                var color = $('#dcolor option:selected').text();
                var size = $('#dsize option:selected').text();
                var quantity = $('#dqty').val();

                $.ajax({
                    type: "POST",
                    dataType: 'json',
                    data: {
                        color: color,
                        size: size,
                        quantity: quantity,
                        product_name: product_name,
                        vendor: vendor
                    },
                    url: "/dcart/data/store/" + id,
                    success: function(data) {

                        miniCart();

                        //console.log(data)

                        // Start Message

                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 3000
                        })
                        if ($.isEmptyObject(data.error)) {

                            Toast.fire({
                                type: 'success',
                                title: data.success,
                            })

                        } else {

                            Toast.fire({
                                type: 'error',
                                title: data.error,
                            })
                        }

                        // End Message
                    }
                })

            }
            /// details End Add To Cart Product
        </script>

        {{-- // Mini Cart --}}
        <script type="text/javascript">
            function miniCart() {
                $.ajax({
                    type: 'GET',
                    url: '/product/mini/cart',
                    dataType: 'json',
                    success: function(response) {
                        // console.log(response)

                        $('span[id="cartSubTotal"]').text(response.cartTotal);
                        $('#cartQty').text(response.cartQty);

                        var miniCart = ""

                        $.each(response.carts, function(key, value) {
                            miniCart +=

                                `<ul class="m-0 clearfix">

                                        <li class="item d-flex justify-content-center align-items-center">

                                            <a class="product-image rounded-3" href="javascript:;">

                                                <img class="blur-up lazyload"
                                                    data-src="/${value.options.image}"
                                                    src="/${value.options.image}"
                                                    alt="product" title="Product" width="120" height="170" />
                                            </a>

                                            <div class="product-details">

                                                <a class="product-title" href="javascript:;">${value.name}</a>

                                                <div class="variant-cart my-2"><span>Qty: </span>${value.qty}</div>

                                                <div class="priceRow">
                                                    <div class="product-price">
                                                        <span class="price">Tk ${value.price}</span>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="qtyDetail text-center">

                                                <a type="submit" id="${value.rowId}" onclick="miniCartRemove(this.id)" class="remove"><i class="icon anm anm-times-r" title="Remove"></i></a>
                                            </div>
                                        </li>

                                </ul>`

                        });

                        $('#miniCart').html(miniCart);

                    }

                })
            }

            miniCart();


            /// Mini Cart Remove Start

            function miniCartRemove(rowId) {
                $.ajax({
                    type: 'GET',
                    url: '/minicart/product/remove/' + rowId,
                    dataType: 'json',
                    success: function(data) {
                        miniCart();

                        // Start Message

                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 3000
                        })
                        if ($.isEmptyObject(data.error)) {

                            Toast.fire({
                                type: 'success',
                                title: data.success,
                            })

                        } else {

                            Toast.fire({
                                type: 'error',
                                title: data.error,
                            })
                        }

                        // End Message

                    }



                })
            }

            /// Mini Cart Remove End
        </script>

        <!--  // Start Load MY Cart // -->
        <script type="text/javascript">
            function cart() {
                $.ajax({
                    type: 'GET',
                    url: '/get-cart-product',
                    dataType: 'json',
                    success: function(response) {
                        // console.log(response)

                        var rows = ""

                        $.each(response.carts, function(key, value) {
                            rows +=

                                `<tr class="cart-row cart-flex position-relative">

                                <td class="cart-delete text-center small-hide">

                                    <a type="submit" id="${value.rowId}" onclick="cartRemove(this.id)"
                                        class="cart-remove remove-icon position-static" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Remove to Cart"><i
                                            class="icon anm anm-times-r"></i></a>
                                </td>

                                <td class="cart-image cart-flex-item">
                                    <a href="javascript:;"><img class="cart-image rounded-0 blur-up lazyload"
                                            data-src="/${value.options.image}"
                                            src="/${value.options.image}" alt="Sunset Sleep Scarf Top"
                                            width="120" height="170" /></a>
                                </td>

                                <td class="cart-meta small-text-left cart-flex-item">

                                    <div class="list-view-item-title">
                                        <a href="javascript:;">${value.name}</a>
                                    </div>

                                    <div class="cart-meta-text">
                                        Color: ${value.options.color == null
                                ? `<span>.... </span>`
                                    : `<span">${value.options.color} </span>`
                                }
                                <br>
                                        Size: ${value.options.size == null
                                    ? `N/A`
                                    : `<h6 class="text-body">${value.options.size} </h6>`
                                }


                                        <br>Qty: ${value.qty}
                                    </div>


                                </td>

                                <td class="cart-price cart-flex-item text-center small-hide">
                                    <span class="money">Tk ${value.price}</span>
                                </td>

                                <td class="cart-update-wrapper cart-flex-item text-end text-md-center">

                                    <div class="cart-qty d-flex justify-content-end justify-content-md-center">

                                        <div class="qtyField">

                                            <a type="submit" id="${value.rowId}" onclick="cartDecrement(this.id)" class="qtyBtn minus" href="#;"><i class="icon anm anm-minus-r"></i></a>

                                            <input class="cart-qty-input qty" type="text" name="" value="${value.qty}" min="1"
                                                pattern="" />

                                            <a type="submit" id="${value.rowId}" onclick="cartIncrement(this.id)" class="qtyBtn plus" href="#;"><i class="icon anm anm-plus-r"></i></a>

                                        </div>
                                    </div>
                                </td>
                                <td class="cart-price cart-flex-item text-center small-hide">
                                    <span class="money fw-500">Tk ${value.subtotal}</span>
                                </td>
                                </tr>`


                        });

                        $('#cartPage').html(rows);

                    }

                })
            }
            cart();

            // Cart Remove Start
            function cartRemove(id) {
                $.ajax({
                    type: "GET",
                    dataType: 'json',
                    url: "/cart-remove/" + id,

                    success: function(data) {
                        cart();
                        miniCart();
                        // couponCalculation();
                        // Start Message

                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',

                            showConfirmButton: false,
                            timer: 3000
                        })
                        if ($.isEmptyObject(data.error)) {

                            Toast.fire({
                                type: 'success',
                                icon: 'success',
                                title: data.success,
                            })

                        } else {

                            Toast.fire({
                                type: 'error',
                                icon: 'error',
                                title: data.error,
                            })
                        }

                        // End Message


                    }
                })
            }
            // Cart Remove End

            // Cart INCREMENT

            function cartIncrement(rowId) {
                $.ajax({
                    type: 'GET',
                    url: "/cart-increment/" + rowId,
                    dataType: 'json',
                    success: function(data) {
                        // couponCalculation();
                        cart();
                        miniCart();

                    }
                });
            }


            // Cart INCREMENT End

            // Cart Decrement Start

            function cartDecrement(rowId) {
                $.ajax({
                    type: 'GET',
                    url: "/cart-decrement/" + rowId,
                    dataType: 'json',
                    success: function(data) {
                        // couponCalculation();
                        cart();
                        miniCart();

                    }
                });
            }


            // Cart Decrement End
        </script>
        <!--  // End Load MY Cart // -->

        <!--  ////////////// Start Apply Coupon ////////////// -->

        <script type="text/javascript">
            function applyCoupon() {
                var coupon_name = $('#coupon_name').val();
                $.ajax({
                    type: "POST",
                    dataType: 'json',
                    data: {
                        coupon_name: coupon_name
                    },

                    url: "/coupon-apply",

                    success: function(data) {
                        couponCalculation();

                        if (data.validity == true) {
                            $('#couponField').hide();
                        }


                        // Start Message

                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',

                            showConfirmButton: false,
                            timer: 3000
                        })
                        if ($.isEmptyObject(data.error)) {

                            Toast.fire({
                                type: 'success',
                                icon: 'success',
                                title: data.success,
                            })

                        } else {

                            Toast.fire({
                                type: 'error',
                                icon: 'error',
                                title: data.error,
                            })
                        }

                        // End Message


                    }
                })
            }

            // Start CouponCalculation Method
            function couponCalculation() {
                $.ajax({
                    type: 'GET',
                    url: "/coupon-calculation",
                    dataType: 'json',
                    success: function(data) {
                        if (data.total) {

                            $('#couponCalField').html(


                                `<div class="row g-0 border-bottom pb-2">
                                    <span class="col-6 col-sm-6 cart-subtotal-title"><strong>Subtotal</strong></span>
                                    <span class="col-6 col-sm-6 cart-subtotal-title cart-subtotal text-end"><span
                                            class="money">Tk ${data.total}</span></span>
                                </div>

                                <div class="row g-0 pt-2">
                                    <span class="col-6 col-sm-6 cart-subtotal-title fs-6"><strong>Total</strong></span>
                                    <span class="col-6 col-sm-6 cart-subtotal-title fs-5 cart-subtotal text-end text-primary"><b
                                            class="money">Tk ${data.total}</b></span>
                                </div>`



                            )
                        } else {
                            $('#couponCalField').html(

                                `<div class="row g-0 border-bottom pb-2">
                                    <span class="col-6 col-sm-6 cart-subtotal-title"><strong>Subtotal</strong></span>
                                    <span class="col-6 col-sm-6 cart-subtotal-title cart-subtotal text-end"><span
                                            class="money">Tk ${data.subtotal}</span></span>
                                </div>

                                <div class="row g-0 border-bottom py-2">
                                    <span class="col-6 col-sm-6 cart-subtotal-title"><strong>Coupon
                                            Name</strong></span>

                                    <span class="col-6 col-sm-6 cart-subtotal-title cart-subtotal text-end"><span
                                            class="money">${data.coupon_name}</span><a type="submit" onclick="couponRemove()"><i class="fa-solid fa-trash-can ms-2 text-danger"></i> </a></span>
                                </div>

                                <div class="row g-0 border-bottom py-2">
                                    <span class="col-6 col-sm-6 cart-subtotal-title"><strong>Coupon
                                            Discount</strong></span>
                                    <span class="col-6 col-sm-6 cart-subtotal-title cart-subtotal text-end"><span
                                            class="money">Tk ${data.discount_amount}</span></span>
                                </div>

                                <div class="row g-0 pt-2">
                                    <span class="col-6 col-sm-6 cart-subtotal-title fs-6"><strong>Total</strong></span>
                                    <span class="col-6 col-sm-6 cart-subtotal-title fs-5 cart-subtotal text-end text-primary"><b
                                            class="money">Tk ${data.total_amount}</b></span>
                                </div>`



                            )
                        }

                    }
                })
            }

            couponCalculation();
            //END CouponCalculation Method
        </script>

        <!--  ////////////// End Apply Coupon ////////////// -->

        <script type="text/javascript">
            // Coupon Remove Start
            function couponRemove() {
                $.ajax({
                    type: "GET",
                    dataType: 'json',
                    url: "/coupon-remove",

                    success: function(data) {
                        couponCalculation();
                        $('#couponField').show();
                        // Start Message

                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',

                            showConfirmButton: false,
                            timer: 3000
                        })
                        if ($.isEmptyObject(data.error)) {

                            Toast.fire({
                                type: 'success',
                                icon: 'success',
                                title: data.success,
                            })

                        } else {

                            Toast.fire({
                                type: 'error',
                                icon: 'error',
                                title: data.error,
                            })
                        }

                        // End Message


                    }
                })
            }
            // Coupon Remove End
        </script>

        <!--  /// Start Wishlist Add -->
        <script type="text/javascript">
            function addToWishList(product_id) {
                $.ajax({
                    type: "POST",
                    dataType: 'json',
                    url: "/add-to-wishlist/" + product_id,

                    success: function(data) {
                        wishlist();
                        // Start Message

                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',

                            showConfirmButton: false,
                            timer: 3000
                        })
                        if ($.isEmptyObject(data.error)) {

                            Toast.fire({
                                type: 'success',
                                icon: 'success',
                                title: data.success,
                            })

                        } else {

                            Toast.fire({
                                type: 'error',
                                icon: 'error',
                                title: data.error,
                            })
                        }

                        // End Message


                    }
                })
            }
        </script>
        <!--  /// End Wishlist Add -->

        <!--  /// Start Load Wishlist Data -->
        <script type="text/javascript">
            function wishlist() {
                $.ajax({
                    type: "GET",
                    dataType: 'json',
                    url: "/get-wishlist-product/",

                    success: function(response) {

                        $('#wishQty').text(response.wishQty);

                        var rows = ""
                        $.each(response.wishlist, function(key, value) {

                            rows +=

                                `<tr>
                            <td class="product-thumbnail">
                                <a class="product-img" href="product-layout1.html"><img
                                        class="image rounded-0 blur-up lazyload"
                                        data-src="/${value.product.product_image}"
                                        src="/${value.product.product_image}" alt="Product"
                                        title="Product" style="width: 70px; height: 70px;" /></a>

                            </td>

                            <td class="product-details">
                                <p class="product-name mb-0">${value.product.product_name} </p>

                                <a type="submit" class="text-body" id="${value.id}" onclick="wishlistRemove(this.id)" ><i class="fa-solid fa-trash-can ms-2 text-danger"></i></a>

                            </td>

                            <td class="product-price text-center">

                                ${value.product.discount_price == null
                                    ? `<span class="amount fw-500">Tk ${value.product.price}</span>`
                                    :`<span class="amount fw-500">Tk ${value.product.discount_price}</span>`

                                    }
                            </td>

                            <td class="product-stock text-center">

                                ${value.product.product_qty > 0
                                ? `<span class="stock-status text-in-stock in-stock mb-0"> In Stock </span>`

                                :`<span class="stock-status text-in-stock out-stock mb-0">Stock Out </span>`

                                }
                            </td>

                            <td class="product-action text-center">
                                <button type="button" class="btn btn-secondary text-nowrap"
                                    data-bs-toggle="modal" data-bs-target="#addtocart_modal">Add To
                                    Cart</button>
                            </td>

                        </tr>`


                        });

                        $('#wishlist').html(rows);

                    }
                })
            }

            wishlist();

            // / End Load Wishlist Data -->

            // Wishlist Remove Start

            function wishlistRemove(id) {
                $.ajax({
                    type: "GET",
                    dataType: 'json',
                    url: "/wishlist-remove/" + id,

                    success: function(data) {
                        wishlist();
                        // Start Message

                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',

                            showConfirmButton: false,
                            timer: 3000
                        })
                        if ($.isEmptyObject(data.error)) {

                            Toast.fire({
                                type: 'success',
                                icon: 'success',
                                title: data.success,
                            })

                        } else {

                            Toast.fire({
                                type: 'error',
                                icon: 'error',
                                title: data.error,
                            })
                        }

                        // End Message


                    }
                })
            }


            // Wishlist Remove End
        </script>



        <x-notify::notify />

        @notifyJs

    </div>
    <!--End Page Wrapper-->



</body>

</html>
