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
                    <h1>Search</h1>
                </div>
                <!--Breadcrumbs-->
                <div class="breadcrumbs"><a href="{{ route('index') }}" title="Back to the home page">Home</a><span
                        class="title"><i class="icon anm anm-angle-right-l"></i>Shop</span><span class="main-title"><i
                            class="icon anm anm-angle-right-l"></i>Product</span></div>
                <!--End Breadcrumbs-->
            </div>
        </div>
    </div>
</div>
<!--End Page Header-->

<!--Main Content-->
<div class="container">

    <!--Product Infinite-->
    <div class="sub-collectio-products product-four-loadmore section pb-0">

        <div class="section-header">
            <h2>Search Products</h2>
            <p>Our most popular search products based on sales.</p>
        </div>

        <!--Product Grid-->
        <div class="grid-products grid-view-items">

            <div class="row col-row product-options row-cols-lg-4 row-cols-md-3 row-cols-sm-3 row-cols-2">

                @forelse ($products as $product)
                    <div class="item col-item">
                        <div class="product-box">
                            <!-- Start Product Image -->
                            <div class="product-image">

                                <!-- Start Product Image -->
                                <a href="{{ url('product-details' . '/' . $product->id . '/' . $product->product_slug) }}"
                                    class="product-img rounded-3"><img class="blur-up lazyload"
                                        src="{{ asset($product->product_image) }}" alt="Product" title="Product"
                                        width="625" height="600" style="height: 240px;" /></a>
                                <!-- End Product Image -->

                                <!-- Product label -->
                                @if ($product->discount_price == null)
                                    {{-- <div class="product-labels"><span class="lbl pr-label3">New</span></div> --}}
                                @else
                                    <div class="product-labels"><span class="lbl on-sale">Sale</span></div>

                                    @php
                                        $amount = $product->selling_price - $product->discount_price;

                                        $discount = ($amount / $product->selling_price) * 100;
                                    @endphp

                                    <div class="product-labels"><span class="lbl on-sale">{{ round($discount) }}%
                                            Off</span></div>
                                @endif
                                <!-- End Product label -->

                                <!--Countdown Timer-->
                                @if ($product->counter == null)
                                @else
                                    <div class="saleTime" data-countdown="{{ $product->counter }}"></div>
                                @endif
                                <!--End Countdown Timer-->

                                <!--Product Button-->
                                <div class="button-set style1">

                                    <!--Cart Button-->
                                    <a href="{{ url('product-details' . '/' . $product->id . '/' . $product->product_slug) }}"
                                        class="btn-icon addtocart quick-shop-modal">

                                        <span class="icon-wrap d-flex-justify-center h-100 w-100" title="Add To Cart">
                                            <i class="icon anm anm-cart-l"></i>
                                            <span class="text">Quick Shop</span>
                                        </span>

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
                                    <a type="submit" id="{{ $product->id }}" onclick="addToWishList(this.id)"
                                        class="btn-icon wishlist" title="Add To Wishlist"><i
                                            class="icon anm anm-heart-l"></i><span class="text">Add To
                                            Wishlist</span></a>
                                    <!--End Wishlist Button-->

                                    <!--Compare Button-->
                                    {{-- <a href="compare-style2.html" class="btn-icon compare"
                                                data-bs-toggle="tooltip" data-bs-placement="left"
                                                title="Add to Compare"><i class="icon anm anm-random-r"></i><span
                                                    class="text">Add to Compare</span></a> --}}
                                    <!--End Compare Button-->

                                </div>
                                <!--End Product Button-->
                            </div>
                            <!-- End Product Image -->

                            <!-- Start Product Details -->
                            <div class="product-details">

                                <!-- Product Name -->
                                <div class="product-name">
                                    <a
                                        href="{{ url('product-details' . '/' . $product->id . '/' . $product->product_slug) }}">{{ $product->product_name }}</a>
                                </div>
                                <!-- End Product Name -->

                                <!-- Product Price -->
                                @if ($product->discount_price == null)
                                    <div class="product-price">
                                        <span class="price">Tk {{ $product->selling_price }}</span>
                                    </div>
                                @else
                                    <div class="product-price">
                                        <span class="price old-price">Tk
                                            {{ $product->selling_price }}</span><span class="price">Tk
                                            {{ $product->discount_price }}</span>
                                    </div>
                                @endif
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
                @empty

                    <p class="text-danger">Search Product Not Found</p>
                @endforelse

            </div>

        </div>
        <!--End Product Grid-->
        <div class="mb-5"></div>

    </div>
    <!--End Product Infinite-->

</div>
<!--End Main Content-->


@endsection
