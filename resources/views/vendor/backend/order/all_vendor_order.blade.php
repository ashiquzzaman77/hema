@extends('vendor.vendor_dashboard')
@section('vendor')
    <div class="page-content">


        <h4 class="mb-3">Total Order Table</h4>

        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Sl No</th>
                                <th>Invoice No</th>
                                <th>Order Date</th>
                                <th>Amount</th>
                                <th>Payment Method</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($orderitems as $key => $order)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td class="text-danger fw-600">{{ $order->order->invoice_no }}</td>
                                    <td>{{ $order->order->order_date }}</td>
                                    <td>Tk {{ $order->order->amount }}</td>
                                    <td>{{ $order->order->payment_method }}</td>
                                    <td>
                                        @if ($order->order->status == 'pending')

                                            <span class="badge bg-dark">{{ $order->order->status }}</span>

                                        @elseif ($order->order->status == 'confirm')

                                            <span class="badge bg-danger">{{ $order->order->status }}</span>

                                        @elseif ($order->order->status == 'processing')

                                            <span class="badge bg-warning">{{ $order->order->status }}</span>

                                        @elseif ($order->order->status == 'deliver')

                                            <span class="badge bg-success">{{ $order->order->status }}</span>

                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ url('vendor/vendor_order_details/' . $order->id) }}" class="badge bg-info"
                                            title="Details"><i class="fa-solid fa-eye fs-5"></i></a>

                                        {{-- <a href="{{ url('vendor/vendor_order_invoice/' . $order->id) }}" class="badge bg-danger"
                                            title="Download"><i class="fa-solid fa-download fs-5"></i></a> --}}
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Sl No</th>
                                <th>Invoice No</th>
                                <th>Order Date</th>
                                <th>Amount</th>
                                <th>Payment Method</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
