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
                    <h1>{{ $breadsubcat->subcategory_name }} Fashion</h1>
                </div>
                <!--Breadcrumbs-->
                <div class="breadcrumbs"><a href="index.html" title="Back to the home page">Home</a><span class="title"><i
                            class="icon anm anm-angle-right-l"></i>Shop</span><span class="main-title"><i
                            class="icon anm anm-angle-right-l"></i>{{ $breadsubcat->subcategory_name }}</span></div>
                <!--End Breadcrumbs-->
            </div>
        </div>
    </div>
</div>
<!--End Page Header-->

<!--Main Content-->
<div class="container">

    <!--SubCategory Slider-->
    {{-- <div class="collection-slider-6items gp10 slick-arrow-dots sub-collection section pt-0">


        @foreach ($subcats as $subcat)
            @php
                $product = App\Models\Product::where('subcategory_id', $subcat->id)->get();
            @endphp

            <div class="category-item zoomscal-hov">

                <a href="{{ url('subcategory-wise-product' . '/' . $subcat->id . '/' . $subcat->subcategory_slug) }}" class="category-link clr-none">

                    <div class="zoom-scal zoom-scal-nopb rounded-0"><img class="rounded-0 blur-up lazyload"
                            data-src="{{ asset($subcat->image) }}" src="{{ asset($subcat->image) }}" alt="SubCategory"
                            title="SubCategory" width="365" height="365" />
                    </div>

                    <div class="details text-center">
                        <h4 class="category-title mb-0">{{ $subcat->subcategory_name }}</h4>
                        <p class="counts">{{ count($product) }} Items</p>
                    </div>

                </a>
            </div>
        @endforeach

    </div> --}}
    <!--End SubCategory Slider-->

    <div class="row">

        <!--Sidebar-->
        <div class="col-12 col-sm-12 col-md-12 col-lg-3 sidebar sidebar-bg filterbar">
            <div class="closeFilter d-block d-lg-none"><i class="icon anm anm-times-r"></i></div>
            <div class="sidebar-tags sidebar-sticky clearfix">

                <!--Categories-->

                @php
                    $cat = App\Models\Category::orderBy('category_name', 'ASC')->get();
                @endphp

                <div class="sidebar-widget clearfix categories filterBox filter-widget">
                    <div class="widget-title">
                        <h2>Categories</h2>
                    </div>

                    <div class="widget-content filterDD">
                        <ul class="sidebar-categories scrollspy morelist clearfix">

                            @foreach ($cat as $category)
                                @php
                                    $subcat = App\Models\Subcategory::where('category_id', $category->id)->get();
                                @endphp
                                <li class="lvl1 sub-level more-item"><a href="#;"
                                        class="site-nav">{{ $category->category_name }}</a>
                                    <ul class="sublinks">

                                        @foreach ($subcat as $subcategory)
                                            @php
                                                $product = App\Models\Product::where('subcategory_id', $subcategory->id)->get();
                                            @endphp

                                            <li class="lvl2">
                                                <a href="{{ url('subcategory-wise-product' . '/' . $subcategory->id . '/' . $subcategory->subcategory_slug) }}"
                                                    class="site-nav">{{ $subcategory->subcategory_name }}
                                                    <span class="count">({{ count($product) }})</span>
                                                </a>
                                            </li>
                                        @endforeach

                                    </ul>
                                </li>
                            @endforeach

                        </ul>
                    </div>
                </div>

                <!--Categories-->

                <!--Price Filter-->
                <div class="sidebar-widget filterBox filter-widget">
                    <div class="widget-title">
                        <h2>Price</h2>
                    </div>
                    <form class="widget-content price-filter filterDD" action="#" method="post">
                        <div id="slider-range" class="mt-2"></div>
                        <div class="row">
                            <div class="col-6"><input id="amount" type="text" /></div>
                            <div class="col-6 text-right"><button class="btn btn-sm">filter</button></div>
                        </div>
                    </form>
                </div>
                <!--End Price Filter-->

                <!--Product Brands-->
                <div class="sidebar-widget clearfix categories filterBox filter-widget">

                    @php
                        $brands = App\Models\Brand::latest()->get();
                    @endphp

                    <div class="widget-title">
                        <h2>Brand</h2>
                    </div>

                    <div class="widget-content filterDD">
                        <ul class="sidebar-categories scrollspy morelist clearfix">

                            @foreach ($brands as $brand)
                                <li class="lvl1 sub-level more-item">
                                    <a href="{{ route('brand.wise.product', $brand->id) }}"
                                        class="site-nav">{{ $brand->brand_name }}</a>
                                </li>
                            @endforeach

                        </ul>
                    </div>
                </div>
                <!--End Product Brands-->
            </div>
        </div>
        <!--End Sidebar-->

        <!--Products-->
        <div class="col-12 col-sm-12 col-md-12 col-lg-9 main-col">

            <!--Toolbar-->
            <div class="toolbar toolbar-wrapper shop-toolbar">
                <div class="row align-items-center">

                    <div
                        class="col-4 col-sm-2 col-md-4 col-lg-4 text-left filters-toolbar-item d-flex order-1 order-sm-0">


                    </div>

                    <div
                        class="col-12 col-sm-4 col-md-4 col-lg-4 text-center product-count order-0 order-md-1 mb-3 mb-sm-0">
                        <span class="toolbar-product-count"></span>
                    </div>

                    <div
                        class="col-8 col-sm-6 col-md-4 col-lg-4 text-right filters-toolbar-item d-flex justify-content-end order-2 order-sm-2">
                        <div class="filters-item d-flex align-items-center">
                            <label for="ShowBy" class="mb-0 me-2 text-nowrap d-none d-sm-inline-flex">Show:</label>
                            <select name="ShowBy" id="ShowBy" class="filters-toolbar-show">
                                <option value="title-ascending" selected="selected">10</option>
                                <option>15</option>
                                <option>20</option>
                                <option>25</option>
                                <option>30</option>
                            </select>
                        </div>
                        <div class="filters-item d-flex align-items-center ms-2 ms-lg-3">
                            <label for="SortBy" class="mb-0 me-2 text-nowrap d-none">Sort by:</label>
                            <select name="SortBy" id="SortBy" class="filters-toolbar-sort">
                                <option value="featured" selected="selected">Featured</option>
                                <option value="best-selling">Best selling</option>
                                <option value="title-ascending">Alphabetically, A-Z</option>
                                <option value="title-descending">Alphabetically, Z-A</option>
                                <option value="price-ascending">Price, low to high</option>
                                <option value="price-descending">Price, high to low</option>
                                <option value="created-ascending">Date, old to new</option>
                                <option value="created-descending">Date, new to old</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <!--End Toolbar-->

            <!--Product Grid-->
            <div class="grid-products grid-view-items">

                <div
                    class="row col-row product-options row-cols-xl-4 row-cols-lg-4 row-cols-md-3 row-cols-sm-3 row-cols-2">

                    @forelse ($products as $product)
                        <div class="item col-item">
                            <div class="product-box">
                                <!-- Start Product Image -->
                                <div class="product-image">

                                    <!-- Start Product Image -->
                                    <a href="{{ url('product-details' . '/' . $product->id . '/' . $product->product_slug) }}"
                                        class="product-img rounded-3"><img class="blur-up lazyload"
                                            src="{{ asset($product->product_image) }}" alt="Product" title="Product"
                                            style="height: 250px;" /></a>
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
                                            <span class="icon-wrap d-flex-justify-center h-100 w-100"
                                                title="Add To Cart"><i class="icon anm anm-cart-l"></i><span
                                                    class="text">Add To Cart</span></span>
                                        </a>
                                        <!--End Cart Button-->

                                        <!--Quick View Button-->
                                        {{-- <a href="#quickview-modal" class="btn-icon quickview quick-view-modal"
                                            data-bs-toggle="modal" data-bs-target="#quickview_modal">
                                            <span class="icon-wrap d-flex-justify-center h-100 w-100"
                                                data-bs-toggle="tooltip" data-bs-placement="left"
                                                title="Quick View"><i class="icon anm anm-search-plus-l"></i><span
                                                    class="text">Quick View</span></span>
                                        </a> --}}
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

                                        @php
                                            $reviewcount = App\Models\Review::where('product_id', $product->id)
                                                ->where('status', 1)
                                                ->latest()
                                                ->get();

                                            $avarage = App\Models\Review::where('product_id', $product->id)
                                                ->where('status', 1)
                                                ->avg('rating');
                                        @endphp

                                        <div class="reviewStar d-flex-center">

                                            @if ($avarage == 0)
                                                <i class="icon anm anm-star-o"></i>
                                                <i class="icon anm anm-star-o"></i>
                                                <i class="icon anm anm-star-o"></i>
                                                <i class="icon anm anm-star-o"></i>
                                                <i class="icon anm anm-star-o"></i>
                                            @elseif ($avarage == 1 || $avarage < 2)
                                                <i class="icon anm anm-star"></i>
                                                <i class="icon anm anm-star-o"></i>
                                                <i class="icon anm anm-star-o"></i>
                                                <i class="icon anm anm-star-o"></i>
                                                <i class="icon anm anm-star-o"></i>
                                            @elseif ($avarage == 2 || $avarage < 3)
                                                <i class="icon anm anm-star"></i>
                                                <i class="icon anm anm-star"></i>
                                                <i class="icon anm anm-star-o"></i>
                                                <i class="icon anm anm-star-o"></i>
                                                <i class="icon anm anm-star-o"></i>
                                            @elseif ($avarage == 3 || $avarage < 4)
                                                <i class="icon anm anm-star"></i>
                                                <i class="icon anm anm-star"></i>
                                                <i class="icon anm anm-star"></i>
                                                <i class="icon anm anm-star-o"></i>
                                                <i class="icon anm anm-star-o"></i>
                                            @elseif ($avarage == 4 || $avarage < 5)
                                                <i class="icon anm anm-star"></i>
                                                <i class="icon anm anm-star"></i>
                                                <i class="icon anm anm-star"></i>
                                                <i class="icon anm anm-star"></i>
                                                <i class="icon anm anm-star-o"></i>
                                            @elseif ($avarage == 5 || $avarage < 5)
                                                <i class="icon anm anm-star"></i>
                                                <i class="icon anm anm-star"></i>
                                                <i class="icon anm anm-star"></i>
                                                <i class="icon anm anm-star"></i>
                                                <i class="icon anm anm-star"></i>
                                            @endif


                                        </div>

                                    </div>
                                    <!-- End Product Review -->

                                </div>
                                <!-- End product details -->
                            </div>
                        </div>

                    @empty

                        <p>No Product Available</p>
                    @endforelse

                </div>

                <!-- Pagination -->

                {{ $products->links('vendor.pagination.custom') }}

                <!-- End Pagination -->

                <div class="mb-5"></div>

            </div>
            <!--End Product Grid-->

        </div>
        <!--End Products-->
    </div>
</div>
<!--End Main Content-->
@endsection
