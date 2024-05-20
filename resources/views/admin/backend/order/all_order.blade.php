@extends('admin.admin_dashboard')
@section('admin')
    <div class="page-content">



        @php
            $allorders = App\Models\Order::latest()->get();
            $confirmorders = App\Models\Order::where('status', 'confirm')
                ->latest()
                ->get();
            $processingorders = App\Models\Order::where('status', 'processing')
                ->latest()
                ->get();
            $deliverorders = App\Models\Order::where('status', 'deliver')
                ->latest()
                ->get();
        @endphp

        <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
            <div class="col">
                <div class="card radius-10 border-start border-0 border-4 border-info">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0 text-secondary">Total Orders</p>
                                <h4 class="my-1 text-info">{{ count($allorders) }}</h4>
                                <p class="mb-0 font-13">+2.5% from last week</p>
                            </div>
                            <div class="widgets-icons-2 rounded-circle bg-gradient-blues text-white ms-auto"><i
                                    class='bx bxs-cart'></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card radius-10 border-start border-0 border-4 border-danger">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0 text-secondary">Confirm Order</p>
                                <h4 class="my-1 text-danger">{{ count($confirmorders) }}</h4>
                                <p class="mb-0 font-13">+5.4% from last week</p>
                            </div>
                            <div class="widgets-icons-2 rounded-circle bg-gradient-burning text-white ms-auto"><i
                                    class='bx bxs-wallet'></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card radius-10 border-start border-0 border-4 border-success">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0 text-secondary">Processing Order</p>
                                <h4 class="my-1 text-success">{{ count($processingorders) }}</h4>
                                <p class="mb-0 font-13">-4.5% from last week</p>
                            </div>
                            <div class="widgets-icons-2 rounded-circle bg-gradient-ohhappiness text-white ms-auto"><i
                                    class='bx bxs-bar-chart-alt-2'></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card radius-10 border-start border-0 border-4 border-warning">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0 text-secondary">Deliver Order</p>
                                <h4 class="my-1 text-warning">{{ count($deliverorders) }}</h4>
                                <p class="mb-0 font-13">+8.4% from last week</p>
                            </div>
                            <div class="widgets-icons-2 rounded-circle bg-gradient-orange text-white ms-auto"><i
                                    class='bx bxs-cart'></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end row-->

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
