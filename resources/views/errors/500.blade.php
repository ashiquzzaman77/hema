@extends('frontend.frontend_dashboard')
@section('main')
@section('title')
    Ecommerce | 500
@endsection

<!--Main Content-->
<div class="container">
    <div class="row">
        <div class="col-12 col-sm-10 col-md-8 col-lg-6 mx-auto text-center">
            <div class="error-content py-2">
                <div class="four0-img">

                    <img src="{{ asset('upload/500.jpg') }}" style="height: 430px;" alt="">

                </div>
                <h2 class="fs-4">Enternal Server Error!</h2>
                <p class="mb-2">The page you are looking for was moved, removed, renamed or might never
                    existed.</p>
            </div>
        </div>
    </div>
</div>
<!--End Main Content-->

@endsection
