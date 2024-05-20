@extends('frontend.frontend_dashboard')
@section('main')
@section('title')
    Ecommerce
@endsection

<style>
    .vh2{
        padding-top: 150px;
    }
</style>

<!-- Body Container -->
<div id="page-content" class="p-0 m-0 vh-100 min-vh-100">
    <!-- Coming-soon -->
    <div class="password-page container">

        <!-- Main Content -->
        <div class="password-main d-flex-justify-center flex-column flex-nowrap text-center vh2">

            <h2 class="password-title">Track Your Product</h2>
            <p class="password-message fs-6 mb-4">We will reach your product as soon as possible</p>

            <!-- Password Form -->
            <form method="post" action="{{route('order.tracking.search')}}" id="password_form" class="password-form">

                @csrf

                <h3 class="password-form-heading mb-3">Saerch Product</h3>

                <div class="input-group">

                    <input type="text" autocomplete="off" class="form-control input-group-field" name="code"  placeholder="Enter Invoice No" required />

                    <button type="submit" class="action d-flex-justify-center btn">Track</button>

                </div>

            </form>
            <!-- End Password Form -->

            <!-- Social Sharing -->
            <div class="password-social-sharing mt-3 mt-md-4">
                <h3 class="password-form-heading mb-3">Spread the word</h3>
                <div class="social-sharing d-flex-justify-center lh-lg">
                    <a href="#" class="d-flex-center btn btn-link btn--share share-facebook"><i
                            class="icon anm anm-facebook-f"></i><span class="share-title">Facebook</span></a>
                    <a href="#" class="d-flex-center btn btn-link btn--share share-twitter"><i
                            class="icon anm anm-twitter"></i><span class="share-title">Twitter</span></a>
                    <a href="#" class="d-flex-center btn btn-link btn--share share-pinterest"><i
                            class="icon anm anm-pinterest-p"></i> <span class="share-title">Pinterest</span></a>
                    <a href="#" class="d-flex-center btn btn-link btn--share share-linkedin"><i
                            class="icon anm anm-linkedin-in"></i><span class="share-title">Linkedin</span></a>
                </div>
            </div>
            <!-- End Social Sharing -->

        </div>
        <!-- End Main Content -->

    </div>
    <!-- End Coming-soon -->
</div>
<!-- End Body Content -->

@endsection
