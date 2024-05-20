@extends('frontend.frontend_dashboard')
@section('main')
@section('title')
    Ecommerce
@endsection


<!--Main Content-->
<div class="container my-5">


    <!--Order success-->
    <div class="success-text checkout-card text-center mb-4 mb-md-5">
        <i class="icon anm anm-shield-check"></i>
        <h2>Thank you for your order!</h2>
        <p class="mb-1">Payment is successfully processsed and your order is on the way</p>
        <p class="mb-1">You will receive an order confirmation email with details of your order and a link to track
            its progress.</p>
        <p class="text-order badge bg-success mt-3"><a class="text-light" href="{{ route('dashboard') }}">Dashboard</a></p>
    </div>
    <!--End Order success-->

</div>
<!--End Main Content-->

@endsection
