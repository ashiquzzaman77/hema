@extends('frontend.frontend_dashboard')
@section('main')
@section('share')
    <meta property="og:title" content="{{ $product->product_name }}" />
    <meta property="og:url" content="{{ Request::fullUrl() }}" />
    <meta property="og:image" content="{{ asset($product->product_image) }}" />
    <meta property="{{ $product->short_descp }}" />
    <meta property="og:site_name" content="Hema" />
@endsection
@section('title')
    Ecommerce
@endsection

<style>
    .rating {
        display: inline-block;
        position: relative;
        height: 50px;
        line-height: 50px;
        font-size: 30px;
    }

    .rating label {
        position: absolute;
        top: 0;
        left: 0;
        height: 100%;
        cursor: pointer;
    }

    .rating label:last-child {
        position: static;
    }

    .rating label:nth-child(1) {
        z-index: 5;
    }

    .rating label:nth-child(2) {
        z-index: 4;
    }

    .rating label:nth-child(3) {
        z-index: 3;
    }

    .rating label:nth-child(4) {
        z-index: 2;
    }

    .rating label:nth-child(5) {
        z-index: 1;
    }

    .rating label input {
        position: absolute;
        top: 0;
        left: 0;
        opacity: 0;
    }

    .rating label .icon {
        float: left;
        color: transparent;
    }

    .rating label:last-child .icon {
        color: #000;
    }

    .rating:not(:hover) label input:checked~.icon,
    .rating:hover label:hover input~.icon {
        color: #ffb503;
    }

    .rating label input:focus:not(:checked)~.icon:last-child {
        color: #000;
        text-shadow: 0 0 5px #09f;
    }
</style>

<!--Page Header-->
<div class="page-header text-start">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                <!--Breadcrumbs-->
                <div class="breadcrumbs"><a href="{{ route('index') }}" title="Back to the home page">Home</a>

                    <span class="main-title fw-bold"><i
                            class="icon anm anm-angle-right-l"></i>{{ $product->category->category_name }}</span>

                    <span class="main-title fw-bold"><i
                            class="icon anm anm-angle-right-l"></i>{{ $product->subcategory->subcategory_name }}</span>
                </div>
                <!--End Breadcrumbs-->
            </div>
        </div>
    </div>
</div>
<!--End Page Header-->

<!--Main Content-->
<div class="container">

    <!--Product Content-->
    <div class="product-single">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 col-12 product-layout-img mb-4 mb-md-0">
                <!-- Product Horizontal -->
                <div class="product-details-img product-horizontal-style">
                    <!-- Product Main -->
                    <div class="zoompro-wrap">

                        <!-- Product Image -->
                        <div class="zoompro-span"><img id="zoompro" class="zoompro"
                                src="{{ asset($product->product_image) }}"
                                data-zoom-image="{{ asset($product->product_image) }}"
                                style="width: 550px; height: 600px;" /></div>
                        <!-- End Product Image -->


                    </div>
                    <!-- End Product Main -->

                    <!-- Product Thumb -->
                    {{-- <div class="product-thumb product-horizontal-thumb mt-3">
                        <div id="gallery" class="product-thumb-horizontal">
                            <a data-image="assets/images/products/product1.jpg"
                                data-zoom-image="assets/images/products/product1.jpg"
                                class="slick-slide slick-cloned active">
                                <img class="blur-up lazyload" data-src="assets/images/products/product1.jpg"
                                    src="assets/images/products/product1.jpg" alt="product" width="625"
                                    height="808" />
                            </a>
                            <a data-image="assets/images/products/product1-1.jpg"
                                data-zoom-image="assets/images/products/product1-1.jpg"
                                class="slick-slide slick-cloned">
                                <img class="blur-up lazyload" data-src="assets/images/products/product1-1.jpg"
                                    src="assets/images/products/product1-1.jpg" alt="product" width="625"
                                    height="808" />
                            </a>
                            <a data-image="assets/images/products/product1-2.jpg"
                                data-zoom-image="assets/images/products/product1-2.jpg"
                                class="slick-slide slick-cloned">
                                <img class="blur-up lazyload" data-src="assets/images/products/product1-2.jpg"
                                    src="assets/images/products/product1-2.jpg" alt="product" width="625"
                                    height="808" />
                            </a>
                            <a data-image="assets/images/products/product1-3.jpg"
                                data-zoom-image="assets/images/products/product1-3.jpg"
                                class="slick-slide slick-cloned">
                                <img class="blur-up lazyload" data-src="assets/images/products/product1-3.jpg"
                                    src="assets/images/products/product1-3.jpg" alt="product" width="625"
                                    height="808" />
                            </a>
                            <a data-image="assets/images/products/product1-4.jpg"
                                data-zoom-image="assets/images/products/product1-4.jpg"
                                class="slick-slide slick-cloned">
                                <img class="blur-up lazyload" data-src="assets/images/products/product1-4.jpg"
                                    src="assets/images/products/product1-4.jpg" alt="product" width="625"
                                    height="808" />
                            </a>
                            <a data-image="assets/images/products/product1-5.jpg"
                                data-zoom-image="assets/images/products/product1-5.jpg"
                                class="slick-slide slick-cloned">
                                <img class="blur-up lazyload" data-src="assets/images/products/product1-5.jpg"
                                    src="assets/images/products/product1-5.jpg" alt="product" width="625"
                                    height="808" />
                            </a>
                        </div>
                    </div> --}}
                    <!-- End Product Thumb -->

                    <!-- Product Gallery -->
                    <div class="lightboximages">
                        <a href="assets/images/products/product1.jpg" data-size="1000x1280"></a>
                    </div>
                    <!-- End Product Gallery -->

                </div>
                <!-- End Product Horizontal -->
            </div>

            <div class="col-lg-6 col-md-6 col-sm-12 col-12 product-layout-info">
                <!-- Product Details -->
                <div class="product-single-meta">
                    <h2 class="product-main-title" id="dpname">{{ $product->product_name }}</h2>

                    <!-- Product Reviews -->
                    <div class="product-review d-flex-center mb-3">

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

                            <span class="caption ms-2">({{ count($reviewcount) }}) Reviews</span>
                        </div>

                        <a class="reviewLink d-flex-center" href="#reviews">Write a Review</a>

                    </div>
                    <!-- End Product Reviews -->

                    <!-- Product Info -->
                    <div class="product-info">
                        <p class="product-stock d-flex">Availability:
                            <span class="pro-stockLbl ps-0">
                                @if ($product->product_qty > 0)
                                    <span class="d-flex-center stockLbl instock text-uppercase">In stock</span>
                                @else
                                    <span class="d-flex-center stockLbl text-danger text-uppercase">Out stock</span>
                                @endif
                            </span>
                        </p>

                        @if ($product->vendor_id == null)
                        @else
                            <p class="product-vendor">Vendor:<span class="text"><a
                                        href="#">{{ $product->user->name }}</a></span></p>
                        @endif

                        <p class="product-type">Product Type:<span
                                class="text">{{ $product->subcategory->subcategory_name }}</span></p>

                        <p class="product-sku">Code:<span class="text">{{ $product->code }}</span></p>

                    </div>
                    <!-- End Product Info -->

                    <!-- Product Price -->
                    <div class="product-price d-flex-center my-3">
                        @if ($product->discount_price == null)
                            <span class="price">Tk {{ $product->selling_price }}</span>
                        @else
                            <span class="price old-price">Tk {{ $product->selling_price }}</span><span
                                class="price">Tk
                                {{ $product->discount_price }}</span>
                        @endif
                    </div>
                    <!-- End Product Price -->

                    <hr>
                    <!-- Sort Description -->
                    <div class="sort-description">{{ $product->short_descp }}</div>
                    <!-- End Sort Description -->

                    <!-- Countdown -->
                    @if ($product->counter == null)
                    @else
                        <hr>
                        <h3 class="text-uppercase mb-0">Hurry up! Sales Ends In</h3>
                        <div class="product-countdown d-flex-center text-center my-3"
                            data-countdown="{{ $product->counter }}"></div>
                    @endif
                    <!-- End Countdown -->
                </div>
                <!-- End Product Details -->

                <!-- Product Form -->


                <!-- Swatches -->
                <div class="product-swatches-option">

                    <!-- Swatches Color -->
                    <div class="product-item swatches-image w-100 mb-4 swatch-0 option1 mt-3" data-option-index="0">

                        <div class="row">

                            {{-- Color  --}}
                            @if ($product->color == null)
                            @else
                                <div class="col-6">
                                    <label for="">Color</label>

                                    <select name="dcolor" id="dcolor" class="form-select">
                                        <option disabled selected>Select Color</option>
                                        @foreach ($explodecolor as $color)
                                            <option value="{{ $color }}">{{ ucwords($color) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            @endif
                            {{-- Color  --}}

                            {{-- Size  --}}
                            @if ($product->size == null)
                            @else
                                <div class="col-6">
                                    <label for="">Size</label>

                                    <select name="dsize" id="dsize" class="form-select">
                                        <option disabled selected>Select Size</option>
                                        @foreach ($explodesize as $size)
                                            <option value="{{ $size }}">{{ ucwords($size) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            @endif
                            {{-- Size  --}}

                        </div>

                    </div>
                    <!-- End Swatches Color -->

                    <!-- Swatches Size -->
                    {{-- @if ($product->size == null)
                    @else
                        <div class="product-item swatches-size w-100 mb-4 swatch-1 option2" data-option-index="1">
                            <label class="label d-flex align-items-center">Size:</label>

                            <ul class="variants-size size-swatches d-flex-center pt-1 clearfix">
                                @foreach ($explodesize as $size)
                                    <li class="swatch x-large available"><span
                                            class="swatchLbl">{{ ucwords($size) }}</span>
                                    </li>
                                @endforeach
                            </ul>

                        </div>
                    @endif --}}
                    <!-- End Swatches Size -->

                </div>
                <!-- End Swatches -->

                <!-- Product Action -->
                <div class="product-action w-100 d-flex-wrap my-3 my-md-4">

                    <!-- Product Quantity -->
                    <div class="product-form-quantity d-flex-center">
                        <div class="qtyField">

                            <a class="qtyBtn minus" href="javascript:;"><i class="icon anm anm-minus-r"></i></a>

                            <input type="text" name="dqty" id="dqty" min="1" value="1"
                                class="product-form-input qty" />

                            <a class="qtyBtn plus" href="javascript:;"><i class="icon anm anm-plus-r"></i></a>

                        </div>
                    </div>
                    <!-- End Product Quantity -->

                    <!-- Product Add -->
                    <div class="product-form-submit addcart fl-1 ms-3">

                        <input type="hidden" id="dproduct_id" value="{{ $product->id }}">
                        <input type="hidden" id="vproduct_id" value="{{ $product->vendor_id }}">

                        <button type="submit" onclick="addToCartDetails()"
                            class="btn btn-secondary product-form-cart-submit">
                            <span>Add to cart</span>
                        </button>

                    </div>
                    <!-- Product Add -->

                    <!-- Product Buy -->
                    <div class="product-form-submit buyit fl-1 ms-3">
                        <button type="submit" class="btn btn-primary proceed-to-checkout"><span>Buy it
                                now</span></button>
                    </div>
                    <!-- End Product Buy -->

                    <!-- Product Info link -->
                    <p class="infolinks d-flex-center justify-content-between mt-3">

                        <a type="submit" class="text-link wishlist" id="{{ $product->id }}"
                            onclick="addToWishList(this.id)"><i class="icon anm anm-heart-l me-2"></i> <span>Add to
                                Wishlist</span>
                        </a>

                        <a class="text-link compare" href="javascript:;"><i class="icon anm anm-sync-ar me-2"></i>
                            <span>Add to Compare</span></a>

                        <a href="javascript:;" class="text-link shippingInfo" data-bs-toggle="modal"
                            data-bs-target="#shippingInfo_modal"><i class="icon anm anm-paper-l-plane me-2"></i>
                            <span>Delivery &amp;
                                Returns</span></a>

                        <a href="javascript:;" class="text-link emaillink me-0" data-bs-toggle="modal"
                            data-bs-target="#productInquiry_modal"><i class="icon anm anm-question-cil me-2"></i>
                            <span>Enquiry</span></a>

                    </p>
                    <!-- End Product Info link -->

                </div>
                <!-- End Product Action -->

                <!-- End Product Form -->

                <!-- Social Sharing -->


                {{-- <a href="#" class="d-flex-center btn btn-link btn--share share-facebook"><i
                            class="icon anm anm-facebook-f"></i><span class="share-title">Facebook</span></a>
                    <a href="#" class="d-flex-center btn btn-link btn--share share-twitter"><i
                            class="icon anm anm-twitter"></i><span class="share-title">Tweet</span></a>
                    <a href="#" class="d-flex-center btn btn-link btn--share share-pinterest"><i
                            class="icon anm anm-pinterest-p"></i> <span class="share-title">Pin
                            it</span></a>
                    <a href="#" class="d-flex-center btn btn-link btn--share share-linkedin"><i
                            class="icon anm anm-linkedin-in"></i><span class="share-title">Linkedin</span></a>
                    <a href="#" class="d-flex-center btn btn-link btn--share share-email"><i
                            class="icon anm anm-envelope-l"></i><span class="share-title">Email</span></a> --}}

                <div class="sharethis-inline-share-buttons" data-herf="{{ Request::url() }}"></div>


                <!-- End Social Sharing -->

            </div>
        </div>
    </div>
    <!--Product Content-->

    <!--Product Tabs-->
    <div class="tabs-listing section pb-0">
        <ul class="product-tabs style2 list-unstyled d-flex-wrap d-flex-justify-center d-none d-md-flex">
            <li rel="description" class="active"><a class="tablink">Description</a></li>
            <li rel="additionalInformation"><a class="tablink">Vendor Information</a></li>
            <li rel="shipping-return"><a class="tablink">Shipping &amp; Return</a></li>
            <li rel="reviews"><a class="tablink">Reviews</a></li>
        </ul>

        <div class="tab-container">

            <!--Description-->
            <h3 class="tabs-ac-style d-md-none active" rel="description">Description</h3>
            <div id="description" class="tab-content">
                <div class="product-description">
                    <div class="row">

                        <div class="col-12 col-sm-12 col-md-8 col-lg-8">
                            <p>{!! $product->long_descp !!}</p>
                        </div>

                    </div>
                </div>
            </div>
            <!--End Description-->

            <!--Additional Information-->
            <h3 class="tabs-ac-style d-md-none" rel="additionalInformation">Additional Information</h3>
            <div id="additionalInformation" class="tab-content">
                <div class="product-description">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 mb-4 mb-md-0">
                            @if ($product->vendor_id == null)
                                <h5>Owner By Admin</h5>
                            @else
                                <div class="">
                                    <img class="rounded-0 mb-3"
                                        src="{{ !empty($product->user->photo) ? url('upload/vendor_images/' . $product->user->photo) : url('upload/no_image.jpg') }}"
                                        alt="" style="width: 70px; height: 70px;" />



                                    <p class="mb-1">Shop Name:{{ $product->user->name }}</p>
                                    <p class="mb-1">Email: {{ $product->user->email }}</p>
                                    <p class="mb-1">Address: {{ $product->user->address }}</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <!--End Additional Information-->



            <!--Shipping &amp; Return-->
            <h3 class="tabs-ac-style d-md-none" rel="shipping-return">Shipping &amp; Return</h3>
            <div id="shipping-return" class="tab-content">
                <h4>Shipping &amp; Return</h4>
                <ul class="checkmark-info">
                    <li>Dispatch: Within 24 Hours</li>
                    <li>1 Year Brand Warranty</li>
                    <li>Free shipping across all products on a minimum purchase of $50.</li>
                    <li>International delivery time - 7-10 business days</li>
                    <li>Cash on delivery might be available</li>
                    <li>Easy 30 days returns and exchanges</li>
                </ul>
                <h4>Free and Easy Returns</h4>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                    has been the industry's standard dummy text ever since the 1500s, when an unknown
                    printer took a galley of type and scrambled it to make a type specimen book. It has
                    survived not only five centuries, but also the leap into electronic typesetting,
                    remaining essentially unchanged.</p>
                <h4>Special Financing</h4>
                <p>There are many variations of passages of Lorem Ipsum available, but the majority have
                    suffered alteration in some form, by injected humour, or randomised words which don't
                    look even slightly believable. If you are going to use a passage.</p>
            </div>
            <!--End Shipping &amp; Return-->

            <!--Review-->
            <h3 class="tabs-ac-style d-md-none" rel="reviews">Review</h3>

            <div id="reviews" class="tab-content">
                <div class="row">

                    <div class="col-12 col-sm-12 col-md-12 col-lg-6 mb-4">
                        <div class="ratings-main">
                            <div class="avg-rating d-flex-center mb-3">
                                <h4 class="avg-mark">5.0</h4>
                                <div class="avg-content ms-3">
                                    <p class="text-rating">Average Rating</p>
                                    <div class="ratings-full product-review">
                                        <a class="reviewLink d-flex-center" href="#reviews"><i
                                                class="icon anm anm-star"></i><i class="icon anm anm-star"></i><i
                                                class="icon anm anm-star"></i><i class="icon anm anm-star"></i><i
                                                class="icon anm anm-star-o"></i><span class="caption ms-2">24
                                                Ratings</span></a>
                                    </div>
                                </div>
                            </div>

                            <div class="ratings-list">
                                <div class="ratings-container d-flex align-items-center mt-1">
                                    <div class="ratings-full product-review m-0">
                                        <a class="reviewLink d-flex align-items-center" href="#reviews"><i
                                                class="icon anm anm-star"></i><i class="icon anm anm-star"></i><i
                                                class="icon anm anm-star"></i><i class="icon anm anm-star"></i><i
                                                class="icon anm anm-star-o"></i></a>
                                    </div>
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="99"
                                            aria-valuemin="0" aria-valuemax="100" style="width:99%;"></div>
                                    </div>
                                    <div class="progress-value">99%</div>
                                </div>
                                <div class="ratings-container d-flex align-items-center mt-1">
                                    <div class="ratings-full product-review m-0">
                                        <a class="reviewLink d-flex align-items-center" href="#reviews"><i
                                                class="icon anm anm-star"></i><i class="icon anm anm-star"></i><i
                                                class="icon anm anm-star"></i><i class="icon anm anm-star"></i><i
                                                class="icon anm anm-star-o"></i></a>
                                    </div>
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="75"
                                            aria-valuemin="0" aria-valuemax="100" style="width:75%;"></div>
                                    </div>
                                    <div class="progress-value">75%</div>
                                </div>
                                <div class="ratings-container d-flex align-items-center mt-1">
                                    <div class="ratings-full product-review m-0">
                                        <a class="reviewLink d-flex align-items-center" href="#reviews"><i
                                                class="icon anm anm-star"></i><i class="icon anm anm-star"></i><i
                                                class="icon anm anm-star"></i><i class="icon anm anm-star-o"></i><i
                                                class="icon anm anm-star-o"></i></a>
                                    </div>
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="50"
                                            aria-valuemin="0" aria-valuemax="100" style="width:50%;"></div>
                                    </div>
                                    <div class="progress-value">50%</div>
                                </div>
                                <div class="ratings-container d-flex align-items-center mt-1">
                                    <div class="ratings-full product-review m-0">
                                        <a class="reviewLink d-flex align-items-center" href="#reviews"><i
                                                class="icon anm anm-star"></i><i class="icon anm anm-star"></i><i
                                                class="icon anm anm-star-o"></i><i class="icon anm anm-star-o"></i><i
                                                class="icon anm anm-star-o"></i></a>
                                    </div>
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="25"
                                            aria-valuemin="0" aria-valuemax="100" style="width:25%;"></div>
                                    </div>
                                    <div class="progress-value">25%</div>
                                </div>
                                <div class="ratings-container d-flex align-items-center mt-1">
                                    <div class="ratings-full product-review m-0">
                                        <a class="reviewLink d-flex align-items-center" href="#reviews"><i
                                                class="icon anm anm-star"></i><i class="icon anm anm-star-o"></i><i
                                                class="icon anm anm-star-o"></i><i class="icon anm anm-star-o"></i><i
                                                class="icon anm anm-star-o"></i></a>
                                    </div>
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="5"
                                            aria-valuemin="0" aria-valuemax="100" style="width:5%;"></div>
                                    </div>
                                    <div class="progress-value">05%</div>
                                </div>
                            </div>
                        </div>
                        <hr />

                        <div class="spr-reviews">

                            <h3 class="spr-form-title">Customer Reviews ({{ count($reviewcount) }})</h3>

                            @php
                                $reviews = App\Models\Review::where('status', 1)
                                    ->where('product_id', $product->id)
                                    ->latest()
                                    ->get();
                            @endphp

                            <div class="review-inner">

                                @forelse ($reviews as $review)
                                    <div class="spr-review d-flex w-100">

                                        <div class="spr-review-profile flex-shrink-0">
                                            <img class="" src="{{ asset('upload/no_image.jpg') }}"
                                                alt="" style="width: 70px; height: 70px;" />
                                        </div>
                                        <div class="spr-review-content flex-grow-1">
                                            <div class="d-flex justify-content-between flex-column mb-2">
                                                <div
                                                    class="title-review d-flex align-items-center justify-content-between">
                                                    <h5 class="spr-review-header-title text-transform-none mb-0">
                                                        {{ $review->name }}</h5>
                                                    <span class="product-review spr-starratings m-0">
                                                        <span class="reviewLink">

                                                            @if ($review->rating == 1)
                                                                <i class="icon anm anm-star"></i>
                                                            @elseif ($review->rating == 2)
                                                                <i class="icon anm anm-star"></i>

                                                                <i class="icon anm anm-star"></i>
                                                            @elseif ($review->rating == 3)
                                                                <i class="icon anm anm-star"></i>

                                                                <i class="icon anm anm-star"></i>

                                                                <i class="icon anm anm-star"></i>
                                                            @elseif ($review->rating == 4)
                                                                <i class="icon anm anm-star"></i>

                                                                <i class="icon anm anm-star"></i>

                                                                <i class="icon anm anm-star"></i>

                                                                <i class="icon anm anm-star"></i>
                                                            @elseif ($review->rating == 5)
                                                                <i class="icon anm anm-star"></i>

                                                                <i class="icon anm anm-star"></i>

                                                                <i class="icon anm anm-star"></i>

                                                                <i class="icon anm anm-star"></i>

                                                                <i class="icon anm anm-star"></i>
                                                            @endif

                                                        </span>
                                                    </span>
                                                </div>
                                            </div>
                                            <b class="head-font">{{ $review->review_title }}</b>
                                            <p class="spr-review-body text-muted">{{ $review->message }}</p>
                                        </div>
                                    </div>
                                @empty

                                    <p>No Review For Product</p>
                                @endforelse



                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-sm-12 col-md-12 col-lg-6 mb-4">

                        <form method="post" action="{{ route('user.review') }}"
                            class="product-review-form new-review-form">

                            @csrf

                            <input type="hidden" name="pid" value="{{ $product->id }}">

                            <h3 class="spr-form-title">Write a Review</h3>

                            <p>Your email address will not be published. Required fields are marked *</p>

                            <fieldset class="row spr-form-contact">

                                <div class="col-sm-6 spr-form-contact-name form-group">
                                    <label class="spr-form-label" for="nickname">Name <span
                                            class="required">*</span></label>
                                    <input class="spr-form-input spr-form-input-text" id="nickname" type="text"
                                        name="name" autocomplete="off" required />
                                </div>

                                <div class="col-sm-6 spr-form-contact-email form-group">
                                    <label class="spr-form-label" for="email">Email <span
                                            class="required">*</span></label>
                                    <input class="spr-form-input spr-form-input-email " id="email" type="email"
                                        name="email" autocomplete="off" required />
                                </div>

                                <div class="col-sm-6 spr-form-review-title form-group">
                                    <label class="spr-form-label" for="review">Review Title </label>
                                    <input class="spr-form-input spr-form-input-text " id="review" type="text"
                                        name="review_title" />
                                </div>

                                <div class="col-sm-6 spr-form-review-rating form-group">

                                    <label>Rating</label>

                                    <br>

                                    <div class="rating">

                                        <label>
                                            <input type="radio" autocomplete="off" name="rating"
                                                value="1" />
                                            <span class="icon">★</span>
                                        </label>

                                        <label>
                                            <input type="radio" name="rating" value="2" />
                                            <span class="icon">★</span>
                                            <span class="icon">★</span>
                                        </label>
                                        <label>
                                            <input type="radio" name="rating" value="3" />
                                            <span class="icon">★</span>
                                            <span class="icon">★</span>
                                            <span class="icon">★</span>
                                        </label>
                                        <label>
                                            <input type="radio" name="rating" value="4" />
                                            <span class="icon">★</span>
                                            <span class="icon">★</span>
                                            <span class="icon">★</span>
                                            <span class="icon">★</span>
                                        </label>
                                        <label>
                                            <input type="radio" name="rating" value="5" />
                                            <span class="icon">★</span>
                                            <span class="icon">★</span>
                                            <span class="icon">★</span>
                                            <span class="icon">★</span>
                                            <span class="icon">★</span>
                                        </label>
                                    </div>

                                </div>

                                <div class="col-12 spr-form-review-body form-group">
                                    <label class="spr-form-label" for="message">Body of Review <span
                                            class="spr-form-review-body-charactersremaining">(1500)
                                            characters remaining</span></label>
                                    <div class="spr-form-input">
                                        <textarea class="spr-form-input spr-form-input-textarea" id="message" name="message" rows="3"></textarea>
                                    </div>
                                </div>

                            </fieldset>

                            <div class="spr-form-actions clearfix">
                                <input type="submit" class="btn btn-primary spr-button spr-button-primary"
                                    value="Submit Review" />
                            </div>

                        </form>
                    </div>

                    <div class="col-12 col-sm-12 col-md-12 col-lg-6 mb-4">

                        <div class="fb-comments"
                            data-href="{{ Request::url() }}"
                            data-width="" data-numposts="10"></div>

                    </div>

                </div>
            </div>
            <!--End Review-->

        </div>
    </div>
    <!--End Main Content-->

    <!--Related Products-->
    <section class="section product-slider pb-0 mb-5">
        <div class="container">
            <div class="section-header">
                <p class="mb-1 mt-0">Discover Similar</p>
                <h2>Related Products</h2>
            </div>

            <!--Product Grid-->
            <div class="product-slider-4items gp10 arwOut5 grid-products">

                @foreach ($relativeProduct as $product)
                    <div class="item col-item">
                        <div class="product-box">
                            <!-- Start Product Image -->
                            <div class="product-image">

                                <!-- Start Product Image -->
                                <a href="{{ url('product-details' . '/' . $product->id . '/' . $product->product_slug) }}"
                                    class="product-img rounded-3"><img class="blur-up lazyload"
                                        src="{{ asset($product->product_image) }}" alt="Product" title="Product"
                                        width="625" height="600" style="height: 280px;" /></a>
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
                                    {{-- <a href="#quickview-modal" class="btn-icon quickview quick-view-modal"
                                        data-bs-toggle="modal" data-bs-target="#quickview_modal">
                                        <span class="icon-wrap d-flex-justify-center h-100 w-100"
                                            data-bs-toggle="tooltip" data-bs-placement="left" title="Quick View"><i
                                                class="icon anm anm-search-plus-l"></i><span class="text">Quick
                                                View</span></span>
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
                @endforeach

            </div>
            <!--End Product Grid-->
        </div>
    </section>
    <!--End Related Products-->

</div>

<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v18.0"
    nonce="CRMpv2Nf"></script>

<script type='text/javascript'
    src='https://platform-api.sharethis.com/js/sharethis.js#property=65a3ebf4d509190012271125&product=inline-share-buttons'
    async='async'></script>

@endsection
