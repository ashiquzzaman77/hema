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

            <div class="card">

                <div class="card-header">
                    <h2>My Order</h2>
                </div>

                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table">

                            <tr>
                                <th>Sl No</th>
                                <th>Invoice No</th>
                                <th>Order Date</th>
                                <th>Amount</th>
                                <th>Payment Method</th>
                                <th>Return Reason</th>
                                <th>Status</th>
                            </tr>

                            @foreach ($orders as $key => $order)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td class="text-danger fw-600">{{ $order->invoice_no }}</td>
                                    <td>{{ $order->order_date }}</td>
                                    <td>Tk {{ $order->amount }}</td>
                                    <td>{{ $order->payment_method }}</td>
                                    <td>{{ $order->return_reason }}</td>
                                    <td>

                                        @if ($order->return_order == 1)
                                            <span class="badge bg-danger">Retutn</span>
                                        @elseif ($order->return_order == 2)
                                            <span class="badge bg-success">Retutn Accept</span>
                                        @endif

                                    </td>

                                </tr>
                            @endforeach

                        </table>
                    </div>

                </div>

            </div>

        </div>
    </div>
</div>
<!--End Main Content-->

@endsection
