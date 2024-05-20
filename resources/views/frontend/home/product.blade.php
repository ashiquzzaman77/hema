<section class="section product-slider tab-slider-product">
    <div class="container">
        <div class="section-header d-none">
            <h2>Special Offers</h2>
            <p>Browse the huge variety of our best seller</p>
        </div>

        <div class="tabs-listing">

            <ul class="nav nav-tabs style1 justify-content-center" id="productTabs" role="tablist">

                <li class="nav-item" role="presentation">
                    <button class="nav-link head-font active" id="bestsellers-tab" data-bs-toggle="tab"
                        data-bs-target="#bestsellers" type="button" role="tab" aria-controls="bestsellers"
                        aria-selected="true">Bestseller</button>
                </li>

                <li class="nav-item" role="presentation">
                    <button class="nav-link head-font" id="newarrivals-tab" data-bs-toggle="tab"
                        data-bs-target="#newarrivals" type="button" role="tab" aria-controls="newarrivals"
                        aria-selected="false">New Arrivals</button>
                </li>

                <li class="nav-item" role="presentation">
                    <button class="nav-link head-font" id="toprated-tab" data-bs-toggle="tab" data-bs-target="#toprated"
                        type="button" role="tab" aria-controls="toprated" aria-selected="false">Top Rated</button>
                </li>
            </ul>

            <div class="tab-content" id="productTabsContent">

                {{-- Bestseller --}}
                <div class="tab-pane show active" id="bestsellers" role="tabpanel" aria-labelledby="bestsellers-tab">

                    @php
                    $products = App\Models\Product::where('status', 1)
                        ->where('best_seller', 1)
                        ->orderBy('id', 'DESC')
                        ->limit(10)
                        ->get();
                    @endphp

                    <!--Product Grid-->
                    <div class="grid-products grid-view-items">
                        <div
                            class="row col-row product-options row-cols-xl-5 row-cols-lg-5 row-cols-md-3 row-cols-sm-3 row-cols-2">

                            @foreach ($products as $product)
                                <div class="item col-item">
                                    <div class="product-box">
                                        <!-- Start Product Image -->
                                        <div class="product-image">

                                            <!-- Start Product Image -->
                                            <a href="{{ url('product-details' . '/' . $product->id . '/' . $product->product_slug) }}"
                                                class="product-img rounded-3"><img class="blur-up lazyload"
                                                    src="{{ asset($product->product_image) }}" alt="Product"
                                                    title="Product" width="625" height="600"
                                                    style="height: 240px;" /></a>
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

                                                <div class="product-labels"><span
                                                        class="lbl on-sale">{{ round($discount) }}% Off</span></div>
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
                                                <a href="{{ url('product-details' . '/' . $product->id . '/' . $product->product_slug) }}" class="btn-icon addtocart quick-shop-modal">

                                                    <span class="icon-wrap d-flex-justify-center h-100 w-100"
                                                        title="Add To Cart">
                                                        <i class="icon anm anm-cart-l"></i>
                                                        <span class="text">Quick Shop</span>
                                                    </span>

                                                </a>
                                                <!--End Cart Button-->

                                                <!--Quick View Button-->
                                                {{-- <a href="#quickview-modal" class="btn-icon quickview quick-view-modal"
                                                    data-bs-toggle="modal" data-bs-target="#quickview_modal">
                                                    <span class="icon-wrap d-flex-justify-center h-100 w-100"
                                                        data-bs-toggle="tooltip" data-bs-placement="left"
                                                        title="Quick View"><i
                                                            class="icon anm anm-search-plus-l"></i><span
                                                            class="text">Quick View</span></span>
                                                </a> --}}
                                                <!--End Quick View Button-->

                                                <!--Wishlist Button-->
                                                <a type="submit" id="{{ $product->id }}"
                                                    onclick="addToWishList(this.id)" class="btn-icon wishlist"
                                                    title="Add To Wishlist"><i class="icon anm anm-heart-l"></i><span
                                                        class="text">Add To Wishlist</span></a>
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
                                                <a href="{{ url('product-details' . '/' . $product->id . '/' . $product->product_slug) }}">{{ $product->product_name }}</a>
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
                            @endforeach

                        </div>
                    </div>
                    <!--End Product Grid-->

                </div>
                {{-- Bestseller --}}

                {{-- New Arrivals --}}
                <div class="tab-pane" id="newarrivals" role="tabpanel" aria-labelledby="newarrivals-tab">

                    @php
                    $products = App\Models\Product::where('status', 1)
                        ->where('new_arrival', 1)
                        ->orderBy('id', 'ASC')
                        ->limit(10)
                        ->get();
                    @endphp

                    <!--Product Grid-->
                    <div class="grid-products grid-view-items">
                        <div
                            class="row col-row product-options row-cols-xl-5 row-cols-lg-5 row-cols-md-3 row-cols-sm-3 row-cols-2">

                            @foreach ($products as $product)
                                <div class="item col-item">
                                    <div class="product-box">
                                        <!-- Start Product Image -->
                                        <div class="product-image">

                                            <!-- Start Product Image -->
                                            <a href="{{ url('product-details' . '/' . $product->id . '/' . $product->product_slug) }}"
                                                class="product-img rounded-3"><img class="blur-up lazyload"
                                                    src="{{ asset($product->product_image) }}" alt="Product"
                                                    title="Product" width="625" height="600"
                                                    style="height: 240px;" /></a>
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

                                                <div class="product-labels"><span
                                                        class="lbl on-sale">{{ round($discount) }}% Off</span></div>
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
                                                <a href="{{ url('product-details' . '/' . $product->id . '/' . $product->product_slug) }}" class="btn-icon addtocart quick-shop-modal">

                                                    <span class="icon-wrap d-flex-justify-center h-100 w-100"
                                                        title="Add To Cart">
                                                        <i class="icon anm anm-cart-l"></i>
                                                        <span class="text">Quick Shop</span>
                                                    </span>

                                                </a>
                                                <!--End Cart Button-->

                                                <!--Quick View Button-->
                                                {{-- <a href="#quickview-modal" class="btn-icon quickview quick-view-modal"
                                                    data-bs-toggle="modal" data-bs-target="#quickview_modal">
                                                    <span class="icon-wrap d-flex-justify-center h-100 w-100"
                                                        data-bs-toggle="tooltip" data-bs-placement="left"
                                                        title="Quick View"><i
                                                            class="icon anm anm-search-plus-l"></i><span
                                                            class="text">Quick View</span></span>
                                                </a> --}}
                                                <!--End Quick View Button-->

                                                <!--Wishlist Button-->
                                                <a type="submit" id="{{ $product->id }}"
                                                    onclick="addToWishList(this.id)" class="btn-icon wishlist"
                                                    title="Add To Wishlist"><i class="icon anm anm-heart-l"></i><span
                                                        class="text">Add To Wishlist</span></a>
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
                                                <a href="{{ url('product-details' . '/' . $product->id . '/' . $product->product_slug) }}">{{ $product->product_name }}</a>
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
                            @endforeach

                        </div>
                    </div>
                    <!--End Product Grid-->
                </div>
                {{-- New Arrivals --}}

                {{-- Top Rated --}}
                <div class="tab-pane" id="toprated" role="tabpanel" aria-labelledby="toprated-tab">

                    @php
                    $products = App\Models\Product::where('status', 1)
                        ->where('top_rated', 1)
                        ->orderBy('id', 'ASC')
                        ->limit(10)
                        ->get();
                    @endphp

                    <!--Product Grid-->
                    <div class="grid-products grid-view-items">
                        <div
                            class="row col-row product-options row-cols-xl-5 row-cols-lg-5 row-cols-md-3 row-cols-sm-3 row-cols-2">

                            @foreach ($products as $product)
                                <div class="item col-item">
                                    <div class="product-box">
                                        <!-- Start Product Image -->
                                        <div class="product-image">

                                            <!-- Start Product Image -->
                                            <a href="{{ url('product-details' . '/' . $product->id . '/' . $product->product_slug) }}"
                                                class="product-img rounded-3"><img class="blur-up lazyload"
                                                    src="{{ asset($product->product_image) }}" alt="Product"
                                                    title="Product" width="625" height="600"
                                                    style="height: 240px;" /></a>
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

                                                <div class="product-labels"><span
                                                        class="lbl on-sale">{{ round($discount) }}% Off</span></div>
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
                                                <a href="{{ url('product-details' . '/' . $product->id . '/' . $product->product_slug) }}" class="btn-icon addtocart quick-shop-modal">

                                                    <span class="icon-wrap d-flex-justify-center h-100 w-100"
                                                        title="Add To Cart">
                                                        <i class="icon anm anm-cart-l"></i>
                                                        <span class="text">Quick Shop</span>
                                                    </span>

                                                </a>
                                                <!--End Cart Button-->

                                                <!--Quick View Button-->
                                                {{-- <a href="#quickview-modal" class="btn-icon quickview quick-view-modal"
                                                    data-bs-toggle="modal" data-bs-target="#quickview_modal">
                                                    <span class="icon-wrap d-flex-justify-center h-100 w-100"
                                                        data-bs-toggle="tooltip" data-bs-placement="left"
                                                        title="Quick View"><i
                                                            class="icon anm anm-search-plus-l"></i><span
                                                            class="text">Quick View</span></span>
                                                </a> --}}
                                                <!--End Quick View Button-->

                                                <!--Wishlist Button-->
                                                <a type="submit" id="{{ $product->id }}"
                                                    onclick="addToWishList(this.id)" class="btn-icon wishlist"
                                                    title="Add To Wishlist"><i class="icon anm anm-heart-l"></i><span
                                                        class="text">Add To Wishlist</span></a>
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
                                                <a href="{{ url('product-details' . '/' . $product->id . '/' . $product->product_slug) }}">{{ $product->product_name }}</a>
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

                                            {{-- <div class="product-review">
                                                <i class="icon anm anm-star"></i><i class="icon anm anm-star"></i><i
                                                    class="icon anm anm-star"></i><i class="icon anm anm-star"></i><i
                                                    class="icon anm anm-star-o"></i>
                                                <span class="caption hidden ms-1">3 Reviews</span>
                                            </div> --}}

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
                            @endforeach

                        </div>
                    </div>
                    <!--End Product Grid-->
                </div>
                {{-- Top Rated --}}

            </div>

        </div>
    </div>
</section>
