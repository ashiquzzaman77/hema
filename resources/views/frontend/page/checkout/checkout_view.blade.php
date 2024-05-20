@extends('frontend.frontend_dashboard')
@section('main')

@section('title')
    ECommerce
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
                        class="main-title"><i class="icon anm anm-angle-right-l"></i>Checkout
                        Style1</span></div>
                <!--End Breadcrumbs-->
            </div>
        </div>
    </div>
</div>
<!--End Page Header-->

<!--Main Content-->
<div class="container">

    <!--Checkout Content-->

    <form class="checkout-form" method="post" action="{{ route('checkout.store') }}">

        @csrf

        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <!--Shipping Address-->
                <div class="block mb-3 shipping-address mb-4">
                    <div class="block-content">
                        <h3 class="title mb-3 text-uppercase">Shipping Address</h3>
                        <fieldset>
                            <div class="row">

                                <div class="form-group col-12 col-sm-6 col-md-6 col-lg-6">
                                    <label for="firstname" class="form-label">First Name <span
                                            class="required">*</span></label>

                                    <input name="shipping_name" value="{{ Auth::user()->name }}" type="text"
                                        required="" class="form-control">
                                </div>

                                <div class="form-group col-12 col-sm-6 col-md-6 col-lg-6">

                                    <label for="lastname" class="form-label">Email<span
                                            class="required">*</span></label>

                                    <input name="shipping_email" value="{{ Auth::user()->email }}" type="email"
                                        required="" class="form-control">

                                </div>

                                <div class="form-group col-12 col-sm-6 col-md-6 col-lg-6">

                                    <label for="lastname" class="form-label">Phone<span
                                            class="required">*</span></label>

                                    <input name="shipping_phone" value="{{ Auth::user()->phone }}" type="text"
                                        required="" class="form-control">

                                </div>

                                <div class="form-group col-12 col-sm-6 col-md-6 col-lg-6">

                                    <label for="lastname" class="form-label">Post Code<span
                                            class="required">*</span></label>

                                    <input name="post_code" type="text" required="" class="form-control">

                                </div>

                            </div>


                            <div class="row">

                                <div class="form-group col-12 col-sm-12 col-md-12 col-lg-12">

                                    <label for="address_country1" class="form-label">Country <span class="required">*</span></label>

                                    <select name="division_id" class="form-control">

                                        <option selected disabled>Select a Division</option>
                                        @foreach ($divisions as $item)
                                            <option value="{{ $item->id }}">{{ $item->division_name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-12 col-sm-12 col-md-6 col-lg-6">

                                    <label for="address_country1" class="form-label">District<span
                                            class="required">*</span></label>

                                    <select name="district_id" class="form-control">

                                        <option selected disabled>Select a District</option>

                                    </select>
                                </div>

                                <div class="form-group col-12 col-sm-12 col-md-6 col-lg-6">

                                    <label for="address_country1" class="form-label">State <span
                                            class="required">*</span></label>

                                    <select name="state_id" class="form-control">

                                        <option selected disabled>Select a State</option>

                                    </select>
                                </div>

                            </div>

                            <div class="row">
                                <div class="form-group col-12 col-sm-12 col-md-12 col-lg-12">
                                    <label for="address-1" class="form-label">Address <span
                                            class="required">*</span></label>
                                    <input name="shipping_address" value="{{ Auth::user()->address }}" id="address-1" type="text" required=""
                                        placeholder="Street address" class="form-control">
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-12 col-sm-12 col-md-12 col-lg-12">
                                    <label for="">Message</label>
                                    <textarea name="notes" id="" placeholder="Write Something" class="form-control" cols="5" rows="5"></textarea>
                                </div>
                            </div>


                        </fieldset>
                    </div>
                </div>
                <!--End Shipping Address-->
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">

                <!--Order Summery-->
                <div class="block mb-3 payment-methods mb-4">
                    <div class="block-content">

                        <!--Cart Summary-->
                        <div class="cart-info">
                            <div class="cart-order-detail cart-col">

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
                        <!--Cart Summary-->

                    </div>
                </div>
                <!--End Order Summery-->

                <!--Amount Summery-->
                <div class="block mb-3 payment-methods mb-4">
                    <div class="block-content">

                        <!--Cart Summary-->

                        @if (Session::has('coupon'))
                            <div class="cart-info">
                                <div class="cart-order-detail cart-col">


                                    <div class="row g-0 border-bottom pb-2">
                                        <span
                                            class="col-6 col-sm-6 cart-subtotal-title"><strong>Subtotal</strong></span>
                                        <span class="col-6 col-sm-6 cart-subtotal-title cart-subtotal text-end"><span
                                                class="money">Tk {{ $cartTotal }}</span></span>
                                    </div>

                                    <div class="row g-0 border-bottom py-2">
                                        <span class="col-6 col-sm-6 cart-subtotal-title"><strong>Coupon
                                                Name</strong></span>
                                        <span class="col-6 col-sm-6 cart-subtotal-title cart-subtotal text-end"><span
                                                class="money">{{ session()->get('coupon')['coupon_name'] }} (
                                                {{ session()->get('coupon')['coupon_discount'] }}% )</span></span>
                                    </div>

                                    {{-- <div class="row g-0 border-bottom py-2">
                                        <span class="col-6 col-sm-6 cart-subtotal-title"><strong>Tax</strong></span>
                                        <span class="col-6 col-sm-6 cart-subtotal-title cart-subtotal text-end"><span
                                                class="money">$10.00</span></span>
                                    </div> --}}
                                    <div class="row g-0 border-bottom py-2">
                                        <span class="col-6 col-sm-6 cart-subtotal-title"><strong>Discount
                                                Amount</strong></span>
                                        <span class="col-6 col-sm-6 cart-subtotal-title cart-subtotal text-end"><span
                                                class="money">Tk
                                                {{ session()->get('coupon')['discount_amount'] }}</span></span>
                                    </div>
                                    <div class="row g-0 pt-2">
                                        <span
                                            class="col-6 col-sm-6 cart-subtotal-title fs-6"><strong>Total</strong></span>
                                        <span
                                            class="col-6 col-sm-6 cart-subtotal-title fs-5 cart-subtotal text-end text-primary"><b
                                                class="money">Tk
                                                {{ session()->get('coupon')['total_amount'] }}</b></span>
                                    </div>

                                </div>
                            </div>
                        @else
                            <div class="cart-info">
                                <div class="cart-order-detail cart-col">
                                    <div class="row g-0 pt-2">
                                        <span
                                            class="col-6 col-sm-6 cart-subtotal-title fs-6"><strong>Total</strong></span>
                                        <span
                                            class="col-6 col-sm-6 cart-subtotal-title fs-5 cart-subtotal text-end text-primary"><b
                                                class="money">Tk {{ $cartTotal }}</b></span>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <!--Cart Summary-->

                    </div>
                </div>
                <!--End Amount Summery-->

                <!--Payment Methods-->
                <div class="block mb-3 delivery-methods mb-4">
                    <div class="block-content">
                        <h3 class="title mb-3 text-uppercase">Payment Methods</h3>
                        <div class="delivery-methods-content">

                            <div class="customRadio clearfix">

                                <input id="formcheckoutRadio1" name="payment_option" value="cash" type="radio"
                                    class="radio" checked="checked">

                                <label for="formcheckoutRadio1" class="mb-0">Cash On Delivery</label>

                            </div>

                            <div class="customRadio clearfix">

                                <input id="formcheckoutRadio2" name="payment_option" value="ssl" type="radio"
                                    class="radio">

                                <label for="formcheckoutRadio2" class="mb-0">SSl Commerez</label>

                            </div>

                            <button type="submit" class="btn btn-fill-out btn-block mt-3">Place an Order<i
                                    class="fi-rs-sign-out ml-15"></i></button>

                        </div>
                    </div>
                </div>
                <!--End Payment Methods-->

            </div>
        </div>
    </form>
    <!--End Checkout Content-->
</div>
<!--End Main Content-->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('select[name="division_id"]').on('change', function() {
            var division_id = $(this).val();
            if (division_id) {
                $.ajax({
                    url: "{{ url('/district-get/ajax') }}/" + division_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('select[name="state_id"]').html('');
                        var d = $('select[name="district_id"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="district_id"]').append(
                                '<option value="' + value.id + '">' + value
                                .district_name + '</option>');
                        });
                    },

                });
            } else {
                alert('danger');
            }
        });
    });


    // Show State Data

    $(document).ready(function() {
        $('select[name="district_id"]').on('change', function() {
            var district_id = $(this).val();
            if (district_id) {
                // function district() {
                $.ajax({
                    url: "{{ url('/state-get/ajax') }}/" + district_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('select[name="state_id"]').html('');
                        var d = $('select[name="state_id"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="state_id"]').append(
                                '<option value="' + value.id + '">' + value
                                .state_name + '</option>');
                        });
                    },

                });
                // }
            } else {
                alert('danger');
            }
        });
    });
</script>

@endsection
