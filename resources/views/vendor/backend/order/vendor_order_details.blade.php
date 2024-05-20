@extends('vendor.vendor_dashboard')
@section('vendor')
    <div class="page-content">

        <div class="row">

            {{-- Shipping Address --}}
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Shipping Address</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">

                                <tbody>

                                    <tr>
                                        <td class="fw-700">Name</td>
                                        <td>{{ $order->name }}</td>
                                    </tr>

                                    <tr>
                                        <td class="fw-700">Email</td>
                                        <td>{{ $order->email }}</td>
                                    </tr>

                                    <tr>
                                        <td class="fw-700">Phone</td>
                                        <td>{{ $order->phone }}</td>
                                    </tr>

                                    <tr>
                                        <td class="fw-700">Division</td>
                                        <td>{{ $order->division->division_name }}</td>
                                    </tr>

                                    <tr>
                                        <td class="fw-700">District</td>
                                        <td>{{ $order->district->district_name }}</td>
                                    </tr>

                                    <tr>
                                        <td class="fw-700">State</td>
                                        <td>{{ $order->state->state_name }}</td>
                                    </tr>

                                    <tr>
                                        <td class="fw-700">Address</td>
                                        <td>{{ $order->adress }}</td>
                                    </tr>

                                    <tr>
                                        <td class="fw-700">Post Code</td>
                                        <td>{{ $order->post_code }}</td>
                                    </tr>


                            </table>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Shipping Address --}}

            {{-- Shipping Details --}}
            <div class="col-6">

                <div class="card">

                    <div class="card-header">
                        <h4>Shipping Details</h4>
                    </div>


                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table">

                                <tbody>

                                    <tr>
                                        <td class="fw-700">Invoice</td>
                                        <td class="text-danger fw-700">{{ $order->invoice_no }}</td>
                                    </tr>

                                    <tr>
                                        <td class="fw-700">Order Date</td>
                                        <td>{{ $order->order_date }}</td>
                                    </tr>

                                    <tr>
                                        <td class="fw-700">Amount</td>
                                        <td>Tk {{ $order->amount }}</td>
                                    </tr>

                                    <tr>
                                        <td class="fw-700">Payment Method</td>
                                        <td>{{ $order->payment_method }}</td>
                                    </tr>

                                    <tr>
                                        <td class="fw-700">Transaction</td>
                                        <td>{{ $order->transaction_id }}</td>
                                    </tr>

                                    <tr>
                                        <td class="fw-700">Status</td>
                                        <td>
                                            @if ($order->status == 'pending')
                                                <span class="badge bg-dark">{{ $order->status }}</span>
                                            @elseif ($order->status == 'confirm')
                                                <span class="badge bg-danger">{{ $order->status }}</span>
                                            @elseif ($order->status == 'processing')
                                                <span class="badge bg-warning">{{ $order->status }}</span>
                                            @elseif ($order->status == 'deliver')
                                                <span class="badge bg-success">{{ $order->status }}</span>
                                            @endif
                                        </td>
                                    </tr>

                            </table>
                        </div>

                    </div>

                </div>

            </div>
            {{-- Shipping Details --}}

            {{-- Product Details  --}}
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Products Details</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">

                                    <tr>
                                        <th>Sl No</th>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Color</th>
                                        <th>Size</th>
                                        <th>Vendor Id</th>
                                        <th>Qty</th>
                                        <th>Price</th>
                                        <th>Total Amount</th>
                                    </tr>

                                    @foreach ($orderItem as $key => $item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>
                                                <img src="{{ asset($item->product->product_image) }}"
                                                    style="width: 50px; height: 50px;" alt="">
                                            </td>
                                            <td>{{ $item->product->product_name }}</td>
                                            <td>
                                                @if ($item->color == null)
                                                    <span>--</span>
                                                @else
                                                    {{ $item->color }}
                                                @endif
                                            </td>
                                            <td>
                                                @if ($item->size == null)
                                                    <span>--</span>
                                                @else
                                                    {{ $item->size }}
                                                @endif
                                            </td>
                                            <td>
                                                @if ($item->vendor_id == null)
                                                    <span>Admin</span>
                                                @else
                                                    {{ $item->user->name }}
                                                @endif
                                            </td>
                                            <td>{{ $item->qty }}</td>
                                            <td>Tk {{ $item->price }}</td>
                                            <td>Tk {{ $item->qty * $item->price }}</td>

                                        </tr>
                                    @endforeach

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Product Details  --}}

        </div>

    </div>
@endsection
