@php
    $slider = App\Models\Slider::latest()->find(1);
@endphp

@if ($slider)
    <section class="slideshow slideshow-wrapper">
        <div class="home-slideshow slick-arrow-dots">

            <div class="slide">
                <div class="slideshow-wrap">
                    <picture>
                        <source media="(max-width:767px)" srcset="{{ asset($slider->image) }}" width="1150" height="800">
                        <img class="blur-up lazyload" src="{{ asset($slider->image) }}" alt="slideshow" title=""
                            width="1920" style="height: 530px;" />
                    </picture>
                    <div class="container">

                        <div class="slideshow-content slideshow-overlay">

                            <div class="slideshow-content-in">

                                <div class="wrap-caption animation style1">
                                    <p class="ss-small-title">{{ $slider->title }}</p>
                                    <h2 class="ss-mega-title">{{ $slider->sub_title }}</h2>
                                    <p class="ss-sub-title xs-hide">{{ $slider->descp }}</p>
                                    <div class="ss-btnWrap">
                                        <a class="btn btn-primary" href="{{ $slider->url }}">Shop Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@else
<section class="slideshow slideshow-wrapper">
    <div class="home-slideshow slick-arrow-dots">

        <div class="slide">
            <div class="slideshow-wrap">
                <picture>
                    <source media="(max-width:767px)"
                        srcset="" width="1150"
                        height="800">
                    <img class="blur-up lazyload" src=""
                        alt="slideshow" title="" width="1920" style="height: 620px;" />
                </picture>
                <div class="container">

                    <div class="slideshow-content slideshow-overlay middle-left">

                        <div class="slideshow-content-in">

                            <div class="wrap-caption animation style1">
                                <p class="ss-small-title"></p>
                                <h2 class="ss-mega-title"></h2>
                                <p class="ss-sub-title xs-hide">
                                </p>
                                <div class="ss-btnWrap">
                                    <a class="btn btn-primary" href="">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
@endif
