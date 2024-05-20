@if ($products->isEmpty())
    <h4 class="text-center text-danger">Product Not Found</h4>
@else
    <div class="search-products">
        <ul class="items g-2 g-md-3 row row-cols-lg-4 row-cols-md-3 row-cols-sm-2">


            @foreach ($products as $product)
                <li class="item">
                    <div class="mini-list-item d-flex align-items-center w-100 clearfix">
                        <div class="mini-image text-center"><a class="item-link"
                                href="{{ url('product-details' . '/' . $product->id . '/' . $product->product_slug) }}"><img
                                    class="blur-up lazyload" data-src="{{ asset($product->product_image) }}"
                                    src="{{ asset($product->product_image) }}" alt="image" title="product"
                                    width="120" height="170" /></a>
                        </div>
                        <div class="ms-3 details text-left">
                            <div class="product-name"><a class="item-title"
                                    href="{{ url('product-details' . '/' . $product->id . '/' . $product->product_slug) }}">{{ $product->product_name }}</a>
                            </div>
                            <div class="product-price"><span class="price">Tk
                                    {{ $product->selling_price }}</span>
                            </div>
                        </div>
                    </div>
                </li>
            @endforeach


        </ul>
    </div>

@endif
