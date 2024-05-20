@php
    $cat = App\Models\Category::orderBy('category_name', 'ASC')->get();
@endphp

<section class="section collection-slider pb-0">
    <div class="container">
        <div class="section-header">
            <p class="mb-2 mt-0">Shop by category</p>
            <h2>Popular Collections</h2>
        </div>

        <div class="collection-slider-5items gp15 arwOut5 hov-arrow">

            @foreach ($cat as $category)
                @php
                    $product = App\Models\Product::where('category_id', $category->id)->get();
                @endphp

                <div class="category-item zoomscal-hov">

                    <a href="{{ url('category-wise-product' . '/' . $category->id . '/' . $category->category_slug) }}" class="category-link clr-none">

                        <div class="zoom-scal zoom-scal-nopb rounded-3"><img class="blur-up lazyload"
                                data-src="{{ asset($category->image) }}" src="{{ asset($category->image) }}"
                                alt="Men's Jakets" title="Category" width="365" height="365" /></div>
                        <div class="details mt-3 text-center">
                            <h4 class="category-title mb-0">{{ $category->category_name }}</h4>
                            <p class="counts">{{ count($product) }} Products</p>
                        </div>
                    </a>
                </div>
            @endforeach

        </div>
    </div>
</section>
