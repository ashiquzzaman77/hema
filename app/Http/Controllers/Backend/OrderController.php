<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    //All Order
    public function AllOrder()
    {
        $orders = Order::latest()->get();
        return view('admin.backend.order.all_order', compact('orders'));
    }

    //Admin Order Details
    public function AdminOrderDetails($order_id)
    {
        $order = Order::with('division', 'district', 'state', 'user')->where('id', $order_id)->first();

        $orderItem = OrderItem::with('product')->where('order_id', $order_id)->orderBy('id', 'DESC')->get();

        return view('admin.backend.order.admin_order_details', compact('order', 'orderItem'));
    }

    //AdminOrderInvoice
    public function AdminOrderInvoice($order_id)
    {
        $order = Order::with('division', 'district', 'state', 'user')->where('id', $order_id)->first();

        $orderItem = OrderItem::with('product')->where('order_id', $order_id)->orderBy('id', 'DESC')->get();

        $pdf = Pdf::loadView('admin.backend.order.admin_order_invoice', compact('order', 'orderItem'))->setPaper('a4')->setOption([
            'tempDir' => public_path(),
            'chroot' => public_path(),
        ]);

        return $pdf->download('admin_invoice.pdf');
    }

    //Confirm Order
    public function ConfirmOrder()
    {
        $orders = Order::where('status', 'confirm')->latest()->get();
        return view('admin.backend.order.confirm_order', compact('orders'));
    }

    //Processing Order
    public function PrcessingOrder()
    {
        $orders = Order::where('status', 'processing')->latest()->get();
        return view('admin.backend.order.processing_order', compact('orders'));
    }

    //Deliver Order
    public function DeliverOrder()
    {
        $orders = Order::where('status', 'deliver')->latest()->get();
        return view('admin.backend.order.deliver_order', compact('orders'));
    }

    //Admin Confirm Order
    public function AdminConfirmOrder($id)
    {
        Order::find($id)->update([

            'status' => 'confirm',
            'confirmed_date' => Carbon::now()->format('d F Y'),

        ]);

        $notification = array(
            'message' => 'Order Confirmed Successfully',
            'alert-type' => 'info',
        );

        return redirect()->route('confirm.order')->with($notification);
    }

    //Admin Processing Order
    public function AdminProcessingOrder($id)
    {
        Order::find($id)->update([

            'status' => 'processing',
            'processing_date' => Carbon::now()->format('d F Y'),

        ]);

        $notification = array(
            'message' => 'Order Processing Successfully',
            'alert-type' => 'info',
        );

        return redirect()->route('processing.order')->with($notification);
    }

    //Admin DeliverOrder
    public function AdminDeliverOrder($id)
    {

        $product = OrderItem::where('order_id', $id)->get();
        foreach ($product as $item) {
            Product::where('id', $item->product_id)
                ->update(['product_qty' => DB::raw('product_qty-' . $item->qty)]);
        }

        Order::find($id)->update([

            'status' => 'deliver',
            'delivered_date' => Carbon::now()->format('d F Y'),

        ]);

        $notification = array(
            'message' => 'Order Deliver Successfully',
            'alert-type' => 'info',
        );

        return redirect()->route('deliver.order')->with($notification);
    }

    //ReturnOrder
    public function AdminReturnOrder()
    {
        $orders = Order::where('return_order', 1)->latest()->get();
        return view('admin.backend.order.return_order', compact('orders'));
    }

    //Admin Return OrderAccept
    public function AdminReturnOrderAccept($order_id)
    {
        Order::find($order_id)->update([

            'return_order' => 2,

        ]);

        $notification = array(
            'message' => 'Return Order Accept Successfully',
            'alert-type' => 'info',
        );

        return redirect()->back()->with($notification);
    }

}
