<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class VendorOrderController extends Controller
{
    //All Vendor Order
    public function AllVendorOrder()
    {
        $id = Auth::user()->id;
        $orderitems = OrderItem::where('vendor_id', $id)->latest()->get();

        return view('vendor.backend.order.all_vendor_order', compact('orderitems'));
    }

    //Vendor Order Details
    public function VendorOrderDetails($order_id)
    {
        $order = Order::with('division', 'district', 'state', 'user')->where('id', $order_id)->first();

        $orderItem = OrderItem::with('product')->where('order_id', $order_id)->orderBy('id', 'DESC')->get();


        return view('vendor.backend.order.vendor_order_details', compact('orderItem','order'));
    }
}
