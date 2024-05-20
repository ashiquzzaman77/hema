@php
    $testimonials = App\Models\Testimonial::orderBy('name', 'ASC')->get();
@endphp

<section class="section testimonial-slider style1">
    <div class="container">
        <div class="section-header">
            <p class="mb-2 mt-0">Happy Customer</p>
            <h2>Loved By Our Customers</h2>
        </div>

        <div class="testimonial-wraper">
            <!--Testimonial Slider Items-->
            <div class="testimonial-slider-3items gp15 slick-arrow-dots arwOut5">

                @foreach ($testimonials as $testimonial)
                    <div class="testimonial-slide">
                        <div class="testimonial-content text-center">
                            <div class="quote-icon mb-3 mb-lg-4"><img class="blur-up lazyload mx-auto"
                                    data-src="{{ asset('frontend/assets/images/icons/demo1-quote-icon.png') }}"
                                    src="{{ asset('frontend/assets/images/icons/demo1-quote-icon.png') }}"
                                    alt="icon" width="40" height="40" /></div>
                            <div class="content">
                                <div class="text mb-2">
                                    <p>{{ $testimonial->description }}</p>
                                </div>
                                <div class="product-review my-3">
                                    <i class="icon anm anm-star"></i><i class="icon anm anm-star"></i><i
                                        class="icon anm anm-star"></i><i class="icon anm anm-star"></i><i
                                        class="icon anm anm-star"></i>
                                    <span class="caption hidden ms-1">24 Reviews</span>
                                </div>
                            </div>
                            <div class="auhimg d-flex-justify-center text-left">
                                <div class="image"><img class="rounded-circle blur-up lazyload"
                                        data-src="{{ asset($testimonial->image) }}"
                                        src="{{ asset($testimonial->image) }}" alt="John Doe"
                                        style="width: 70px; height: 70px;" /></div>
                                <div class="auhtext ms-3">
                                    <h5 class="authour mb-1">{{ $testimonial->name }}</h5>
                                    <p class="text-muted">{{ $testimonial->position }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
            <!--Testimonial Slider Items-->
        </div>
    </div>
</section>
