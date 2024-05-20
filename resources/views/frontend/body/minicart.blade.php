<div id="minicart-drawer" class="minicart-right-drawer offcanvas offcanvas-end" tabindex="-1">



    <!--MiniCart Content-->
    {{-- @if (Cart::count() > 0) --}}
        <div id="cart-drawer" class="block block-cart">
            <div class="minicart-header">
                <button class="close-cart border-0" data-bs-dismiss="offcanvas" aria-label="Close"><i
                        class="icon anm anm-times-r" data-bs-toggle="tooltip" data-bs-placement="left"
                        title="Close"></i></button>
                <h4 class="fs-6">Your cart</h4>
            </div>

            <div class="minicart-content">

                <div id="miniCart">

                </div>

            </div>

            <div class="minicart-bottom">

                <div class="subtotal clearfix my-3">

                    <div class="totalInfo clearfix mb-1 d-none"><span>Shipping:</span><span
                            class="item product-price">$10.00</span></div>

                    <div class="totalInfo clearfix mb-1 d-none"><span>Tax:</span><span
                            class="item product-price">$0.00</span></div>

                    <div class="totalInfo clearfix">
                        <span>Total:</span><span class="float-end">Tk</span><span class="item product-price"
                            id="cartSubTotal"></span>
                    </div>

                </div>

                <div class="minicart-action d-flex mt-3">
                    <a href="{{ route('checkout') }}" class="proceed-to-checkout btn btn-primary w-50 me-1">Check
                        Out</a>
                    <a href="{{ route('mycart') }}" class="cart-btn btn btn-secondary w-50 ms-1">View Cart</a>
                </div>

            </div>
        </div>
    {{-- @else
        <div id="cartEmpty" class="cartEmpty d-flex-justify-center flex-column text-center p-3 text-muted">
            <div class="minicart-header d-flex-center justify-content-between w-100">
                <h4 class="fs-6">Your cart</h4>
                <button class="close-cart border-0" data-bs-dismiss="offcanvas" aria-label="Close"><i
                        class="icon anm anm-times-r" data-bs-toggle="tooltip" data-bs-placement="left"
                        title="Close"></i></button>
            </div>
            <div class="cartEmpty-content mt-4">
                <i class="icon anm anm-cart-l fs-1 text-muted"></i>
                <p class="my-3">No Products in the Cart</p>
                <a href="index.html" class="btn btn-primary cart-btn">Continue shopping</a>
            </div>
        </div>
    @endif --}}
    <!--MiniCart Content-->

</div>
