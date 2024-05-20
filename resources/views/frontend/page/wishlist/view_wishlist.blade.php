@extends('frontend.frontend_dashboard')
@section('main')
    @section('title')
        Ecommerce
    @endsection

    <!--Page Header-->
    <div class="page-header text-center">

        <div class="container">
            <div class="row">
                <div
                    class="col-12 col-sm-12 col-md-12 col-lg-12 d-flex justify-content-between align-items-center">
                    <div class="page-title">
                        <h1>Wishlist Style</h1>
                    </div>
                    <!--Breadcrumbs-->
                    <div class="breadcrumbs"><a href="{{ route('index') }}" title="Back to the home page">Home</a><span
                            class="main-title"><i class="icon anm anm-angle-right-l"></i>Wishlist Style</span>
                    </div>
                    <!--End Breadcrumbs-->
                </div>
            </div>
        </div>
    </div>
    <!--End Page Header-->

    <!--Main Content-->
    <div class="container">
        <!--Wishlist Form-->

        <form action="#" method="post">
            <div class="wishlist-table table-content table-responsive">
                <table class="table align-middle text-nowrap table-bordered">
                    <thead class="thead-bg">
                        <tr>
                            <th class="product-name text-start" colspan="2">Product</th>
                            <th class="product-price text-center">Price</th>
                            <th class="stock-status text-center">Stock Status</th>
                            <th class="product-subtotal text-center">Add to Cart</th>
                        </tr>
                    </thead>

                    <tbody id="wishlist">

                    </tbody>

                </table>
            </div>
        </form>
        <!--End Wishlist Form-->
    </div>
    <!--End Main Content-->

@endsection
