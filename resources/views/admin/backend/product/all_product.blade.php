@extends('admin.admin_dashboard')
@section('admin')
    <div class="page-content">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <style>
            .large-checkbox {
                transform: scale(1.7);
            }
        </style>

        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Product</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Product Table</li>
                    </ol>
                </nav>
            </div>

            <div class="ms-auto">
                <a href="{{ route('add.product') }}" class="rounded-0 btn btn-outline-primary">Add Product</a>
            </div>

        </div>
        <!--end breadcrumb-->

        <h6 class="mb-0 text-uppercase">Total Product <span class="badge bg-danger">{{ count($alldata) }}</span></h6>
        <hr />
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Sl No</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Qty</th>
                                <th>Selling Price</th>
                                <th>Discount Price</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($alldata as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>
                                        <img src="{{ asset($item->product_image) }}" style="width: 50px;height: 50px;"
                                            alt="">
                                    </td>
                                    <td>{{ $item->product_name }}</td>
                                    <td>{{ $item->product_qty }}</td>
                                    <td>{{ $item->selling_price }}</td>
                                    <td>
                                        @if ($item->discount_price == null)
                                            <span class="badge bg-dark">No Discount</span>
                                        @else
                                            @php
                                                $amount = $item->selling_price - $item->discount_price;

                                                $discount = ($amount / $item->selling_price) * 100;
                                            @endphp

                                            <span class="badge bg-danger">{{ round($discount) }}%</span>
                                        @endif
                                    </td>

                                    <td class="px-3">


                                        <div class="form-check-danger form-check form-switch">
                                            <input class="form-check-input status-toggle large-checkbox" type="checkbox"
                                                id="flexSwitchCheckCheckedDanger" data-user-id="{{ $item->id }}"
                                                {{ $item->status ? 'checked' : '' }}>
                                            <label class="form-check-label" for="flexSwitchCheckCheckedDanger"> </label>
                                        </div>

                                    </td>

                                    <td>

                                        <a href="{{ route('edit.product', $item->id) }}" class="btn btn-success btn-sm"
                                            title="Edit"><i class="fa-solid fa-pen-to-square"></i></a>

                                        <a href="{{ route('delete.product', $item->id) }}" class="btn btn-danger btn-sm"
                                            id="delete" title="Delete"><i class="fa-solid fa-trash-can"></i></a>

                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Sl No</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Qty</th>
                                <th>Selling Price</th>
                                <th>Discount Price</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>

    </div>

    <script>
        $(document).ready(function() {
            $('.status-toggle').on('change', function() {
                var userId = $(this).data('user-id');
                var isChecked = $(this).is(':checked');

                // send an ajax request to update status

                $.ajax({
                    url: "{{ route('update.user.stauts') }}",
                    method: "POST",
                    data: {
                        user_id: userId,
                        is_checked: isChecked ? 1 : 0,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        toastr.info(response.message);
                    },
                    error: function() {

                    }
                });

            });
        });
    </script>
@endsection
