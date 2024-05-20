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
                        <li class="breadcrumb-item active" aria-current="page">Coupon Table</li>
                    </ol>
                </nav>
            </div>

            <div class="ms-auto">
                <button type="button" data-bs-toggle="modal" data-bs-target="#exampleVerticallycenteredModal"
                    class="btn btn-outline-primary rounded-0">Add Coupon</button>
            </div>

        </div>
        <!--end breadcrumb-->

        <h6 class="mb-0 text-uppercase">Total Coupon <span class="badge bg-danger">{{ count($coupon) }}</span></h6>
        <hr />
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Sl No</th>
                                <th>Name</th>
                                <th>Discount(%)</th>
                                <th>Validity</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($coupon as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->coupon_name }}</td>
                                    <td>{{ $item->coupon_discount }}%</td>
                                    <td>{{ Carbon\Carbon::parse($item->coupon_validity)->format('D,d F Y') }}</td>
                                    <td>
                                        @if ($item->coupon_validity >= Carbon\Carbon::now()->format('Y-m-d'))
                                            <span class="badge bg-success">Valid</span>
                                        @else
                                            <span class="badge bg-danger">Invalid</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('edit.coupon', $item->id) }}" class="btn btn-success btn-sm"
                                            title="Edit"><i class="fa-solid fa-pen-to-square"></i></a>

                                        <a href="{{ route('delete.coupon', $item->id) }}" class="btn btn-danger btn-sm"
                                            id="delete" title="Delete"><i class="fa-solid fa-trash-can"></i></a>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Sl No</th>
                                <th>Name</th>
                                <th>Discount(%)</th>
                                <th>Validity</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>

    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleVerticallycenteredModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Add Coupon</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="{{ route('store.coupon') }}" method="POST" enctype="multipart/form-data">

                    @csrf

                    <div class="modal-body">


                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Coupon Name</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input autocomplete="off" required type="text" name="coupon_name" class="form-control" />
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Coupon Discount</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input autocomplete="off" type="text" name="coupon_discount"
                                    class="form-control" />
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Date</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input autocomplete="off" required type="date" name="coupon_validity"
                                    min="{{ Carbon\Carbon::now()->format('Y-m-d') }}" class="form-control" />
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-9 text-secondary">
                                <input type="submit" class="btn btn-dark px-3" value="Save Changes" />
                            </div>
                        </div>

                    </div>

                </form>

            </div>
        </div>
    </div>
@endsection
