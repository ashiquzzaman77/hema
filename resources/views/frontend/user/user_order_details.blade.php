@extends('frontend.frontend_dashboard')
@section('main')
@section('title')
    Ecommerce
@endsection

<div class="page-content pt-5 pb-5">
    <div class="container">

        <div class="row">

            {{-- Shipping Address --}}
            <div class="col-6">

                <div class="card">

                    <div class="card-header">
                        <h2>Shipping Address</h2>
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
                        <h2>Shipping Details</h2>
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
                                                <span class="badge bg-primary">{{ $order->status }}</span>
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
                            <h2>Products Details</h2>
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

        {{-- Return Order --}}

        <div class="row">
            <div class="col-12">
                @if ($order->status !== 'deliver')
                @else
                    @php
                        $order = App\Models\Order::where('id', $order->id)
                            ->where('return_reason', '=', null)
                            ->first();
                    @endphp
                    @if ($order)
                        <div class="card">

                            <div class="card-body">
                                <form action="{{ route('return.order', $order->id) }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <h6>Product Return</h6>
                                            <div class="row mt-3">

                                                <div class="col-lg-8">
                                                    <input type="text" class="form-control" name="return_reason"
                                                        placeholder="Return Reason" autocomplete="off">
                                                </div>

                                                <div class="col-lg-4">
                                                    <button type="submit" class="btn btn-success">Order
                                                        Return</button>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                    @else
                        <div class="page-content pt-20">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-11 m-auto">
                                        <h5 class="text-danger">This Product already have return request</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endif
            </div>
        </div>

        {{-- Return Order --}}

    </div>
</div>


@endsection
