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
                    <h1>Contact Us</h1>
                </div>
                <!--Breadcrumbs-->
                <div class="breadcrumbs"><a href="{{ route('index') }}" title="Back to the home page">Home</a><span
                        class="title"><i class="icon anm anm-angle-right-l"></i>Pages</span><span
                        class="main-title fw-bold"><i class="icon anm anm-angle-right-l"></i>Contact Us</span></div>
                <!--End Breadcrumbs-->
            </div>
        </div>
    </div>
</div>
<!--End Page Header-->

<!--Main Content-->
<!-- Destination section -->
<div class="destination-section section pt-0">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 col-sm-12 col-md-6">
                <div class="about-images mb-4 mb-md-0">
                    <div class="row g-3">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3652.1440783028315!2d90.42828817502391!3d23.742241039090192!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b86b2f4dba1d%3A0x290aef73c25f2789!2sBashabo%2C%20Dhaka!5e0!3m2!1sen!2sbd!4v1704735774319!5m2!1sen!2sbd"
                            width="600" height="485" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-12 col-md-6">
                <div class="about-details px-50 py-5">

                    <div class="card shadow p-4">

                        <h2 class="mb-3">Contact For Any Query</h2>

                        <form action="{{ route('contact.store') }}" method="post">

                            @csrf
                            <div class="row">

                                <div class="col-6 mb-3">
                                    <label for="">Name</label>
                                    <input required type="text" name="name" class="form-control">
                                </div>

                                <div class="col-6 mb-3">
                                    <label for="">Email</label>
                                    <input required type="email" name="email" class="form-control">
                                </div>

                                <div class="col-12 mb-3">
                                    <label for="">Subject</label>
                                    <input required type="subject" name="subject" class="form-control">
                                </div>

                                <div class="col-12 mb-3">
                                    <label for="">Message</label>
                                    <textarea required name="message" class="form-control" id="" cols="5" rows="5"></textarea>
                                </div>

                                <div class="col-12 mb-3">
                                    <label for=""></label>
                                    <button class="btn btn-dark" type="submit">Send</button>
                                </div>

                            </div>
                        </form>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
<!-- End Destination section -->

<!-- Service section -->

@php
    $sitting = App\Models\Sitting::find(1);
@endphp

<div class="service-section section section-color-light mb-5">
    <div class="container">
        <div class="service-info row col-row row-cols-lg-3 row-cols-md-3 row-cols-sm-2 row-cols-2 text-center">
            <div class="service-wrap col-item">
                <div class="service-icon mb-3">
                    <i class="icon anm anm-phone-l fs-2"></i>
                </div>
                <div class="service-content">
                    <h3 class="fs-6 mb-1 text-uppercase">Contact Number</h3>
                    <span class="text-muted">{{ $sitting->phone }}</span>
                </div>
            </div>
            <div class="service-wrap col-item">
                <div class="service-icon mb-3">
                    <i class="icon anm anm-envelope-l fs-2"></i>
                </div>
                <div class="service-content">
                    <h3 class="fs-6 mb-1 text-uppercase">Email</h3>
                    <span class="text-muted">{{ $sitting->email }}</span>
                </div>
            </div>
            <div class="service-wrap col-item">
                <div class="service-icon mb-3">
                    <i class="icon anm anm-location fs-2"></i>
                </div>
                <div class="service-content">
                    <h3 class="fs-6 mb-1 text-uppercase">Address</h3>
                    <span class="text-muted">{{ $sitting->address }}</span>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- End Service section -->

@endsection
