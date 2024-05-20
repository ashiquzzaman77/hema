@extends('frontend.frontend_dashboard')
@section('main')
@section('title')
    Ecommerce
@endsection

<!--Home Slideshow-->
@include('frontend.home.slider')
<!--End Home Slideshow-->

<!--Service Section-->
<section class="section service-section pb-0">
    <div class="container">
        <div class="service-info row col-row row-cols-lg-4 row-cols-md-4 row-cols-sm-2 row-cols-2 text-center">
            <div class="service-wrap col-item">
                <div class="service-icon mb-3">
                    <i class="icon anm anm-phone-call-l"></i>
                </div>
                <div class="service-content">
                    <h3 class="title mb-2">Call us any time</h3>
                    <span class="text-muted">Contact us 24/7 hours a day</span>
                </div>
            </div>
            <div class="service-wrap col-item">
                <div class="service-icon mb-3">
                    <i class="icon anm anm-truck-l"></i>
                </div>
                <div class="service-content">
                    <h3 class="title mb-2">Pickup At Any Store</h3>
                    <span class="text-muted">Free shipping on orders over $65</span>
                </div>
            </div>
            <div class="service-wrap col-item">
                <div class="service-icon mb-3">
                    <i class="icon anm anm-credit-card-l"></i>
                </div>
                <div class="service-content">
                    <h3 class="title mb-2">Secured Payment</h3>
                    <span class="text-muted">We accept all major credit cards</span>
                </div>
            </div>
            <div class="service-wrap col-item">
                <div class="service-icon mb-3">
                    <i class="icon anm anm-redo-l"></i>
                </div>
                <div class="service-content">
                    <h3 class="title mb-2">Free Returns</h3>
                    <span class="text-muted">30-days free return policy</span>
                </div>
            </div>
        </div>
    </div>
</section>
<!--End Service Section-->

<!--Collection banner-->
{{-- <section class="section collection-banners pb-0">
    <div class="container">
        <div class="collection-banner-grid">
            <div class="row sp-row">
                <div class="col-12 col-sm-6 col-md-6 col-lg-6 collection-banner-item">
                    <div class="collection-item sp-col">
                        <a href="shop-left-sidebar.html" class="zoom-scal">
                            <div class="img">
                                <img class="blur-up lazyload"
                                    data-src="{{ asset('frontend/assets/') }}/images/collection/demo1-ct-img1.jpg"
                                    src="{{ asset('frontend/assets/') }}/images/collection/demo1-ct-img1.jpg"
                                    alt="Women Wear" title="Women Wear" width="645" height="723" />
                            </div>
                            <div class="details middle-right">
                                <div class="inner">
                                    <p class="mb-2">Trending Now</p>
                                    <h3 class="title">Women Wear</h3>
                                    <span class="btn btn-outline-secondary btn-md">Shop Now</span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-6 collection-banner-item">
                    <div class="collection-item sp-col">
                        <a href="shop-left-sidebar.html" class="zoom-scal">
                            <div class="img">
                                <img class="blur-up lazyload"
                                    data-src="{{ asset('frontend/assets/') }}/images/collection/demo1-ct-img2.jpg"
                                    src="{{ asset('frontend/assets/') }}/images/collection/demo1-ct-img2.jpg"
                                    alt="Mens Wear" title="Mens Wear" width="645" height="344" />
                            </div>
                            <div class="details middle-left">
                                <div class="inner">
                                    <h3 class="title mb-2">Mens Wear</h3>
                                    <p class="mb-3">Tailor-made with passion</p>
                                    <span class="btn btn-outline-secondary btn-md">Shop Now</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="collection-item sp-col">
                        <a href="shop-left-sidebar.html" class="zoom-scal">
                            <div class="img">
                                <img class="blur-up lazyload"
                                    data-src="{{ asset('frontend/assets/') }}/images/collection/demo1-ct-img3.jpg"
                                    src="{{ asset('frontend/assets/') }}/images/collection/demo1-ct-img3.jpg"
                                    alt="Kids Wear" title="Kids Wear" width="645" height="349" />
                            </div>
                            <div class="details middle-right">
                                <div class="inner">
                                    <p class="mb-2">Buy one get one free</p>
                                    <h3 class="title">Kids Wear</h3>
                                    <span class="btn btn-outline-secondary btn-md">Shop Now</span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> --}}
<!--End Collection banner-->

<!--Popular Categories-->
@include('frontend.home.category')
<!--End Popular Categories-->

<!--Products With Tabs-->
@include('frontend.home.product')
<!--End Products With Tabs-->

<!--Parallax Banner-->
@include('frontend.home.banner')
<!--End Parallax Banner-->

<!--Testimonial Section-->
@include('frontend.home.testimonial')
<!--End Testimonial section-->

<!--Blog Post-->
<section class="section home-blog-post">
    <div class="container">
        <div class="section-header">
            <p class="mb-2 mt-0">Latest post</p>
            <h2>Most Recent News</h2>
        </div>

        <div class="blog-slider-3items gp15 arwOut5 hov-arrow">
            <div class="blog-item">
                <div class="blog-article zoomscal-hov">
                    <div class="blog-img">
                        <a class="featured-image zoom-scal" href="blog-details.html"><img class="blur-up lazyload"
                                data-src="{{ asset('frontend/assets/') }}/images/blog/post-img1.jpg"
                                src="{{ asset('frontend/assets/') }}/images/blog/post-img1.jpg"
                                alt="New shop collection our shop" width="740" height="410" /></a>
                        <div class="date"><span class="dt">25</span> <span class="mt">Apr<br>
                                <b>2023</b></span></div>
                    </div>
                    <div class="blog-content">
                        <h2 class="h3 mb-3"><a href="blog-details.html">New shop collection our shop</a></h2>
                        <p class="content">There are many variations of passages of Lorem Ipsum available, but the
                            majority have suffered.</p>
                        <a href="blog-details.html" class="btn btn-secondary btn-sm">Read more</a>
                    </div>
                </div>
            </div>
            <div class="blog-item">
                <div class="blog-article zoomscal-hov">
                    <div class="blog-img">
                        <a class="featured-image zoom-scal" href="blog-details.html"><img class="blur-up lazyload"
                                data-src="{{ asset('frontend/assets/') }}/images/blog/post-img2.jpg"
                                src="{{ asset('frontend/assets/') }}/images/blog/post-img2.jpg"
                                alt="Gift ideas for everyone" width="740" height="410" /></a>
                        <div class="date"><span class="dt">31</span> <span class="mt">Mar<br>
                                <b>2023</b></span></div>
                    </div>
                    <div class="blog-content">
                        <h2 class="h3 mb-3"><a href="blog-details.html">Gift ideas for everyone</a></h2>
                        <p class="content">There are many variations of passages of Lorem Ipsum available, but the
                            majority suffered.</p>
                        <a href="blog-details.html" class="btn btn-secondary btn-sm">Read more</a>
                    </div>
                </div>
            </div>
            <div class="blog-item">
                <div class="blog-article zoomscal-hov">
                    <div class="blog-img">
                        <a class="featured-image zoom-scal" href="blog-details.html"><img class="blur-up lazyload"
                                data-src="{{ asset('frontend/assets/') }}/images/blog/post-img3.jpg"
                                src="{{ asset('frontend/assets/') }}/images/blog/post-img3.jpg"
                                alt="Sales with best collection" width="740" height="410" /></a>
                        <div class="date"><span class="dt">30</span> <span class="mt">Jan<br>
                                <b>2023</b></span></div>
                    </div>
                    <div class="blog-content">
                        <h2 class="h3 mb-3"><a href="blog-details.html">Sales with best collection</a></h2>
                        <p class="content">There are many variations of passages of Lorem Ipsum available, but the
                            majority.</p>
                        <a href="blog-details.html" class="btn btn-secondary btn-sm">Read more</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--End Blog Post-->

@endsection
