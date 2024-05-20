@extends('admin.admin_dashboard')
@section('admin')
    <div class="page-content">

        <h4 class="mb-2">Total Order <span class="badge bg-danger">{{ count($orders) }}</span></h4>

        <h5 class="mb-3 text-danger">{{ $formatDate }}</h5>

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

                            @foreach ($orders as $key => $order)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td class="text-danger fw-600">{{ $order->invoice_no }}</td>
                                    <td>{{ $order->order_date }}</td>
                                    <td>Tk {{ $order->amount }}</td>
                                    <td>{{ $order->payment_method }}</td>
                                    <td>
                                        @if ($order->status == 'pending')
                                            <span class="badge bg-dark">{{ $order->status }}</span>
                                        @elseif ($order->status == 'confirm')
                                            <span class="badge bg-danger">{{ $order->status }}</span>
                                        @elseif ($order->status == 'processing')
                                            <span class="badge bg-warning">{{ $order->status }}</span>
                                        @elseif ($order->status == 'deliver')
                                            <span class="badge bg-success">{{ $order->status }}</span>

                                            @if ($order->return_order == 1)
                                                <span class="badge bg-danger">Retutn</span>
                                            @elseif ($order->return_order == 2)
                                                <span class="badge bg-danger">Retutn Accept</span>
                                            @endif
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ url('admin/order_details/' . $order->id) }}" class="badge bg-info"
                                            title="Details"><i class="fa-solid fa-eye fs-5"></i></a>

                                        <a href="{{ url('admin/order_invoice/' . $order->id) }}" class="badge bg-danger"
                                            title="Download"><i class="fa-solid fa-download fs-5"></i></a>
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
