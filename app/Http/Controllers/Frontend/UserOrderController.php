<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

class UserOrderController extends Controller
{
    //User Order
    public function UserOrder()
    {
        $id = Auth::user()->id;
        $orders = Order::where('user_id', $id)->latest()->get();

        return view('frontend.user.user_order',compact('orders'));
    }

    //UserOrderDetails
    public function UserOrderDetails($order_id)
    {
        $order = Order::with('division', 'district', 'state', 'user')->where('id', $order_id)->where('user_id', Auth::id())->first();

        $orderItem = OrderItem::with('product')->where('order_id', $order_id)->orderBy('id', 'DESC')->get();


        return view('frontend.user.user_order_details', compact('order', 'orderItem'));
    }

     //UserOrderInvoice
     public function UserOrderInvoice($order_id)
     {
         $order = Order::with('division', 'district', 'state', 'user')->where('id', $order_id)->where('user_id', Auth::id())->first();

         $orderItem = OrderItem::with('product')->where('order_id', $order_id)->orderBy('id', 'DESC')->get();

         $pdf = Pdf::loadView('frontend.user.order_invoice', compact('order', 'orderItem'))->setPaper('a4')->setOption([
             'tempDir' => public_path(),
             'chroot' => public_path(),
         ]);

         return $pdf->download('user_invoice.pdf');
     }

      // ReturnOrder

    public function ReturnOrder(Request $request, $order_id)
    {

        Order::findOrFail($order_id)->update([
            'return_date' => Carbon::now()->format('d F Y'),
            'return_reason' => $request->return_reason,
            'return_order' => 1,
        ]);

        $notification = array(
            'message' => 'Return Request Send Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('frontend.user.return.order')->with($notification);
    }

    //Return Order Page

    public function ReturnOrderPage()
    {
        $orders = Order::where('user_id', Auth::id())->where('return_reason', '!=', null)->orderBy('id', 'DESC')->get();

        return view('frontend.user.return_order_view', compact('orders'));
    }

}
