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
                <div class="page-title"><h1>My Account</h1></div>
                <!--Breadcrumbs-->
                <div class="breadcrumbs"><a href="{{ route('index') }}" title="Back to the home page">Home</a><span class="title"><i class="icon anm anm-angle-right-l"></i>Pages</span><span class="main-title fw-bold"><i class="icon anm anm-angle-right-l"></i>My Account</span></div>
                <!--End Breadcrumbs-->
            </div>
        </div>
    </div>
</div>
<!--End Page Header-->

<!--Main Content-->
<div class="container">
    <div class="row">

        <div class="col-12 col-sm-12 col-md-12 col-lg-3 mb-4 mb-lg-0">

            <!-- Dashboard sidebar -->
            @include('frontend.body.dashboard_sidebar')
            <!-- End Dashboard sidebar -->

        </div>

        <div class="col-12 col-sm-12 col-md-12 col-lg-9">
            <div class="dashboard-content tab-content h-100" id="top-tabContent">
                <!-- Account Info -->
                <div class="tab-pane fade h-100 show active" id="info">
                    <div class="account-info h-100">
                        <div class="welcome-msg mb-4">
                            <h2>Hello, <span class="text-primary">{{ $profileData->name }}</span></h2>
                            <p>From your My Account Dashboard you have the ability to view a snapshot of your recent account activity and update your account information. Select a link below to view or edit information.</p>
                        </div>

                        <div class="row g-3 row-cols-lg-3 row-cols-md-3 row-cols-sm-3 row-cols-1 mb-4">
                            <div class="counter-box">
                                <div class="bg-block d-flex-center flex-nowrap">
                                    <img class="blur-up lazyload" src="{{ asset('frontend/assets/images/icons/sale.png') }}" alt="icon" width="64" height="64" />
                                    <div class="content">
                                        <h3 class="fs-5 mb-1 text-primary">238</h3>
                                        <p>Total Order</p>
                                    </div>
                                </div>
                            </div>

                            <div class="counter-box">
                                <div class="bg-block d-flex-center flex-nowrap">
                                    <img class="blur-up lazyload" src="{{ asset('frontend/assets/images/icons/homework.png') }}" alt="icon" width="64" height="64" />
                                    <div class="content">
                                        <h3 class="fs-5 mb-1 text-primary">124</h3>
                                        <p>Pending Orders</p>
                                    </div>
                                </div>
                            </div>

                            <div class="counter-box">
                                <div class="bg-block d-flex-center flex-nowrap">
                                    <img class="blur-up lazyload" src="{{ asset('frontend/assets/images/icons/order.png') }}" alt="icon" width="64" height="64" />
                                    <div class="content">
                                        <h3 class="fs-5 mb-1 text-primary">102</h3>
                                        <p>Awaiting Payments</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- End Account Info -->
            </div>
        </div>
    </div>
</div>
<!--End Main Content-->

@endsection
