@extends('admin.admin_dashboard')
@section('admin')
    <div class="page-content">

        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Coupon</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Coupon</li>
                    </ol>
                </nav>
            </div>

        </div>
        <!--end breadcrumb-->
        <div class="container">
            <div class="main-body">
                <div class="row">

                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">

                                <form action="{{ route('update.coupon') }}" method="POST" enctype="multipart/form-data">

                                    @csrf

                                    <input type="hidden" name="id" value="{{ $editcoupon->id }}">

                                    <div class="modal-body">

                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Coupon Name</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <input autocomplete="off" required type="text" value="{{ $editcoupon->coupon_name }}" name="coupon_name" class="form-control" />
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Coupon Discount</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <input autocomplete="off" value="{{ $editcoupon->coupon_discount }}" required type="text" name="coupon_discount"
                                                    class="form-control" />
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Date</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <input autocomplete="off" required type="date"  value="{{ $editcoupon->coupon_validity }}"  name="coupon_validity"
                                                    min="{{ Carbon\Carbon::now()->format('Y-m-d') }}" class="form-control" />
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-3"></div>
                                            <div class="col-sm-9 text-secondary">
                                                <input type="submit" class="rounded-0 btn btn-dark px-3" value="Update Coupon" />
                                            </div>
                                        </div>

                                    </div>

                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
