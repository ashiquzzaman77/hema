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
                    <h1>Checkout</h1>
                </div>
                <!--Breadcrumbs-->
                <div class="breadcrumbs"><a href="{{ route('index') }}" title="Back to the home page">Home</a><span
                        class="main-title"><i class="icon anm anm-angle-right-l"></i>SSl Commerez</span></div>
                <!--End Breadcrumbs-->
            </div>
        </div>
    </div>
</div>
<!--End Page Header-->


<!--Main Content-->
<div class="container">
    <!--Checkout Content-->
    <div class="checkout-form">
        <div class="row">

            <div class="col-lg-5 col-md-5 col-sm-12">
                <!--Payment Methods-->
                <div class="block mb-3 payment-methods mb-4">

                    <!--Order Summary-->
                    <div class="block order-summary">
                        <div class="block-content">
                            <h3 class="title mb-3 text-uppercase">Order Summary</h3>
                            <div class="table-responsive-sm table-bottom-brd order-table">

                                <table class="table align-middle">
                                    <thead class="cart-row cart-header small-hide position-relative">
                                        <tr>
                                            <th class="text-center">Image</th>
                                            <th class="text-start">Product</th>
                                            <th class="text-center">Price</th>
                                            <th class="text-center">Total</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($carts as $item)
                                            <tr class="cart-row cart-flex position-relative">

                                                <td class="cart-image cart-flex-item">
                                                    <a href="javascript:;"><img
                                                            class="cart-image rounded-0 blur-up lazyload"
                                                            data-src="{{ asset($item->options->image) }}"
                                                            src="{{ asset($item->options->image) }}"
                                                            alt="Sunset Sleep Scarf Top"
                                                            style="width: 70px; height: 70px;;" /></a>
                                                </td>

                                                <td class="cart-meta small-text-left cart-flex-item">
                                                    <div class="list-view-item-title mb-0">
                                                        <a href="javascript:;">{{ $item->name }}</a>
                                                    </div>
                                                    <div class="cart-meta-text">

                                                        @if ($item->options->color == null)
                                                        @else
                                                            Color: {{ $item->options->color }}
                                                        @endif

                                                        @if ($item->options->size == null)
                                                        @else
                                                            <br>Size: {{ $item->options->size }}
                                                        @endif

                                                        <br>Qty: {{ $item->qty }}
                                                    </div>
                                                </td>

                                                <td class="cart-price cart-flex-item text-center small-hide">
                                                    <span class="money">Tk {{ $item->price }}</span>
                                                </td>

                                                @php
                                                    $total = $item->qty * $item->price;
                                                @endphp

                                                <td class="cart-price cart-flex-item text-center small-hide">
                                                    <span class="money fw-500">Tk {{ $total }}</span>
                                                </td>


                                            </tr>
                                        @endforeach
                                    </tbody>

                                </table>

                            </div>
                        </div>
                    </div>
                    <!--End Order Summary-->

                    <div class="col-12 mt-3">
                        <!--Cart Summary-->
                        <div class="cart-info">
                            <div class="cart-order-detail cart-col">


                                <div class="row g-0 pt-2">
                                    <span class="col-6 col-sm-6 cart-subtotal-title fs-6"><strong>Total
                                            Amount</strong></span>
                                    <span
                                        class="col-6 col-sm-6 cart-subtotal-title fs-5 cart-subtotal text-end text-primary"><b
                                            class="money">Tk
                                            {{ $total_amount }}</b></span>
                                </div>

                            </div>
                        </div>
                        <!--Cart Summary-->
                    </div>

                </div>
                <!--End Payment Methods-->
            </div>

            <div class="col-lg-7 col-md-7 col-sm-12">


                <!--Shipping Address-->

                <div class="block mb-3 shipping-address mb-4">

                    <h3 class="tp-checkout-place-title">Shipping Details</h3>


                    <form action="{{ url('/pay') }}" method="POST" class="needs-validation">


                        <input type="hidden" value="{{ csrf_token() }}" name="_token" />

                        <input type="hidden" value="{{ $total_amount }}" name="amount" id="total_amount" required />

                        <div class="row">

                            <div class="col-6 mb-3">

                                <input type="text" readonly class="form-control" name="name" value="{{ $data['shipping_name'] }}">

                            </div>

                            <div class="col-6 mb-3">

                                <input type="email" readonly name="email" class="form-contol" value="{{ $data['shipping_email'] }}">

                            </div>

                            <div class="col-12 mb-3">

                                <input type="text" readonly name="phone" value="{{ $data['shipping_phone'] }}">

                            </div>

                            <div class="col-12 mb-3">

                                <input type="text" readonly name="address" value="{{ $data['shipping_address'] }}">

                            </div>


                        </div>


                        <input type="hidden" name="post_code" value="{{ $data['post_code'] }}">

                        <input type="hidden" name="division_id" value="{{ $data['division_id'] }}">

                        <input type="hidden" name="district_id" value="{{ $data['district_id'] }}">

                        <input type="hidden" name="state_id" value="{{ $data['state_id'] }}">

                        <input type="hidden" name="notes" value="{{ $data['notes'] }}">

                        <div class="row">

                            <div class="custom-control custom-checkbox">

                                <input type="checkbox" class="custom-control-input" id="same-address">

                                <label class="custom-control-label" for="same-address">Shipping address is the same as
                                    my billing address</label>

                            </div>

                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="save-info">
                                <label class="custom-control-label" for="save-info">Save this information for next
                                    time</label>
                            </div>

                            <button class="btn btn-primary btn-lg btn-block ms-2 mt-3" type="submit">Pay Now</button>

                        </div>

                    </form>

                </div>



                <!--End Shipping Address-->

            </div>

        </div>
    </div>
    <!--End Checkout Content-->
</div>
<!--End Main Content-->

@endsection
