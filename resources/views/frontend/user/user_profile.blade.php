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
                    <h1>My Account</h1>
                </div>
                <!--Breadcrumbs-->
                <div class="breadcrumbs"><a href="{{ route('index') }}" title="Back to the home page">Home</a><span
                        class="title"><i class="icon anm anm-angle-right-l"></i>Pages</span><span
                        class="main-title fw-bold"><i class="icon anm anm-angle-right-l"></i>My Account</span></div>
                <!--End Breadcrumbs-->
            </div>
        </div>
    </div>
</div>
<!--End Page Header-->

<!--Main Content-->
<div class="container mb-4">
    <div class="row">

        <div class="col-12 col-sm-12 col-md-12 col-lg-3 mb-4 mb-lg-0">

            <!-- Dashboard sidebar -->
            @include('frontend.body.dashboard_sidebar')
            <!-- End Dashboard sidebar -->

        </div>

        <div class="col-12 col-sm-12 col-md-12 col-lg-9">
            <div class="dashboard-content tab-content h-100" id="top-tabContent">
                <!-- Account Info -->
                <div class="card">
                    <div class="card-body">
                        <h3>Profile Information</h3>
                    </div>

                    <form action="{{ route('user.profile.update') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="row p-4">

                            <div class="col-6 mb-3">
                                <label for="">Name</label>
                                <input type="text" class="form-control" autocomplete="off" name="name"
                                    value="{{ $profileData->name }}">
                            </div>

                            <div class="col-6 mb-3">
                                <label for="">Last Name</label>
                                <input type="text" class="form-control" autocomplete="off" name="last_name"
                                    value="{{ $profileData->last_name }}">
                            </div>

                            <div class="col-6 mb-3">
                                <label for="">Email</label>
                                <input type="email" class="form-control  @error('email') is-invalid @enderror"
                                    autocomplete="off" name="email" value="{{ $profileData->email }}">

                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-6 mb-3">
                                <label for="">Phone</label>
                                <input type="text" class="form-control  @error('phone') is-invalid @enderror"
                                    autocomplete="off" name="phone" value="{{ $profileData->phone }}">

                                @error('phone')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12 mb-3">
                                <label for="">Address</label>
                                <input type="text" class="form-control" autocomplete="off" name="address"
                                    value="{{ $profileData->address }}">
                            </div>

                            <div class="col-12 mb-3">
                                <button type="submit" class="btn btn-secondary">Save Change</button>
                            </div>


                        </div>

                    </form>
                </div>
                <!-- End Account Info -->
            </div>
        </div>
    </div>
</div>
<!--End Main Content-->

@endsection
