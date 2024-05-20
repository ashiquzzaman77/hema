@php
    $banner = App\Models\Banner::find(1);
@endphp

@if ($banner)
    <div class="section parallax-banner-style1 py-0">
        <div class="hero hero-large hero-overlay bg-size">
            <img class="bg-img" src="{{ asset($banner->image) }}" alt="Clearance Sale - Flat 50% Off" width="1920"
                height="645" />
            <div class="hero-inner d-flex-justify-center">
                <div class="container">
                    <div class="wrap-text center text-white">
                        <h1 class="hero-title text-white">{{ $banner->title }}</h1>
                        <p class="hero-subtitle h3 text-white">{{ $banner->sub_title }}</p>
                        <!--Countdown Timer-->
                        <div class="hero-saleTime d-flex-center text-center justify-content-center"
                            data-countdown="{{ $banner->counter }}"></div>
                        <!--End Countdown Timer-->
                        <p class="hero-details">{{ $banner->descp }}</p>
                        <a href="{{ $banner->url }}" class="hero-btn btn btn-light">Shop now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@else
    <p>No Banner Added</p>
@endif
