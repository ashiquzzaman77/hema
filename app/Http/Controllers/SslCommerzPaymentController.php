<?php

namespace App\Http\Controllers;

use App\Library\SslCommerz\SslCommerzNotification;
use App\Mail\OrderMail;
use App\Models\Order;
use App\Models\OrderItem;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class SslCommerzPaymentController extends Controller
{

    // public function exampleEasyCheckout()
    // {
    //     return view('exampleEasycheckout');
    // }

    // public function exampleHostedCheckout()
    // {
    //     return view('exampleHosted');
    // }

    public function index(Request $request)
    {
        # Here you have to receive all the order data to initate the payment.
        # Let's say, your oder transaction informations are saving in a table called "orders"
        # In "orders" table, order unique identity is "transaction_id". "status" field contain status of the transaction, "amount" is the order amount to be paid and "currency" is for storing Site Currency which will be checked with paid currency.

        //dd($request->all());

        $post_data = array();
        $post_data['total_amount'] = $request->amount; # You cant not pay less than 10
        $post_data['currency'] = "BDT";
        $post_data['tran_id'] = uniqid(); // tran_id must be unique

        # CUSTOMER INFORMATION

        $post_data['cus_name'] = $request->name;
        $post_data['cus_email'] = $request->email;
        $post_data['cus_add1'] = $request->address;
        $post_data['cus_add2'] = "";
        $post_data['cus_city'] = "";
        $post_data['cus_state'] = "";
        $post_data['cus_postcode'] = $request->post_code;
        $post_data['cus_country'] = "Bangladesh";
        $post_data['cus_phone'] = $request->phone;
        $post_data['cus_fax'] = "";

        //custom
        $post_data['user_id'] = Auth::id();
        $post_data['division_id'] = $request->division_id;
        $post_data['district_id'] = $request->district_id;
        $post_data['state_id'] = $request->state_id;
        $post_data['notes'] = $request->notes;
        $post_data['payment_method'] = "SSl Payment";
        $post_data['invoice_no'] = 'EOS' . mt_rand(10000000, 99999999);

        # SHIPMENT INFORMATION
        $post_data['ship_name'] = "Store Test";
        $post_data['ship_add1'] = "Dhaka";
        $post_data['ship_add2'] = "Dhaka";
        $post_data['ship_city'] = "Dhaka";
        $post_data['ship_state'] = "Dhaka";
        $post_data['ship_postcode'] = "1000";
        $post_data['ship_phone'] = "";
        $post_data['ship_country'] = "Bangladesh";

        // $post_data['success_url'] = "http://127.0.0.1:8000/sucesss";

        $post_data['shipping_method'] = "NO";
        $post_data['product_name'] = "Computer";
        $post_data['product_category'] = "Goods";
        $post_data['product_profile'] = "physical-goods";

        #Before  going to initiate the payment order status need to insert or update as pending.

        $update_product = DB::table('orders')
            ->where('transaction_id', $post_data['tran_id'])
            ->updateOrInsert([

                'user_id' => $post_data['user_id'],
                'name' => $post_data['cus_name'],
                'email' => $post_data['cus_email'],
                'adress' => $post_data['cus_add1'],
                'phone' => $post_data['cus_phone'],
                'amount' => $post_data['total_amount'],
                'status' => 'pending',
                'transaction_id' => $post_data['tran_id'],
                'currency' => $post_data['currency'],
                'division_id' => $post_data['division_id'],
                'district_id' => $post_data['district_id'],
                'state_id' => $post_data['state_id'],
                'notes' => $post_data['notes'],
                'post_code' => $post_data['cus_postcode'],
                'payment_method' => $post_data['payment_method'],
                'invoice_no' => $post_data['invoice_no'],
                'order_date' => Carbon::now()->format('d F Y'),

                'confirmed_date' => Carbon::now()->format('d F Y'),
                'processing_date' => Carbon::now()->format('d F Y'),

                'order_month' => Carbon::now()->format('F'),
                'order_year' => Carbon::now()->format('Y'),
                'created_at' => Carbon::now(),

            ]);

        $order_id = \Illuminate\Support\Facades\DB::getPdo()->lastInsertId();

        $carts = Cart::content();

        foreach ($carts as $cart) {

            OrderItem::insert([

                'order_id' => $order_id,
                'product_id' => $cart->id,
                'color' => $cart->options->color,
                'size' => $cart->options->size,
                'qty' => $cart->qty,
                'price' => $cart->price,
                'created_at' => Carbon::now(),

            ]);
        }

        $invoice = Order::findOrFail($order_id);

        # OPTIONAL PARAMETERS
        $post_data['value_a'] = $invoice->invoice_no;
        $post_data['value_b'] = $post_data['cus_email'];
        $post_data['value_c'] = $post_data['cus_name'];
        $post_data['value_d'] = "ref004";

        $sslc = new SslCommerzNotification();
        # initiate(Transaction Data , false: Redirect to SSLCOMMERZ gateway/ true: Show all the Payement gateway here )
        $payment_options = $sslc->makePayment($post_data, 'hosted');

        if (!is_array($payment_options)) {
            print_r($payment_options);
            $payment_options = array();
        }

    }

    // // kkkkkkkkkkkkk
    // public function payViaAjax(Request $request)
    // {

    //     # Here you have to receive all the order data to initate the payment.
    //     # Lets your oder trnsaction informations are saving in a table called "orders"
    //     # In orders table order uniq identity is "transaction_id","status" field contain status of the transaction, "amount" is the order amount to be paid and "currency" is for storing Site Currency which will be checked with paid currency.

    //     $post_data = array();
    //     $post_data['total_amount'] = '10'; # You cant not pay less than 10
    //     $post_data['currency'] = "BDT";
    //     $post_data['tran_id'] = uniqid(); // tran_id must be unique

    //     # CUSTOMER INFORMATION
    //     $post_data['cus_name'] = 'Customer Name';
    //     $post_data['cus_email'] = 'customer@mail.com';
    //     $post_data['cus_add1'] = 'Customer Address';
    //     $post_data['cus_add2'] = "";
    //     $post_data['cus_city'] = "";
    //     $post_data['cus_state'] = "";
    //     $post_data['cus_postcode'] = "";
    //     $post_data['cus_country'] = "Bangladesh";
    //     $post_data['cus_phone'] = '8801XXXXXXXXX';
    //     $post_data['cus_fax'] = "";

    //     # SHIPMENT INFORMATION
    //     $post_data['ship_name'] = "Store Test";
    //     $post_data['ship_add1'] = "Dhaka";
    //     $post_data['ship_add2'] = "Dhaka";
    //     $post_data['ship_city'] = "Dhaka";
    //     $post_data['ship_state'] = "Dhaka";
    //     $post_data['ship_postcode'] = "1000";
    //     $post_data['ship_phone'] = "";
    //     $post_data['ship_country'] = "Bangladesh";

    //     $post_data['shipping_method'] = "NO";
    //     $post_data['product_name'] = "Computer";
    //     $post_data['product_category'] = "Goods";
    //     $post_data['product_profile'] = "physical-goods";

    //     # OPTIONAL PARAMETERS
    //     $post_data['value_a'] = "ref001";
    //     $post_data['value_b'] = "ref002";
    //     $post_data['value_c'] = "ref003";
    //     $post_data['value_d'] = "ref004";

    //     #Before  going to initiate the payment order status need to update as pending.
    //     $update_product = DB::table('orders')
    //         ->where('transaction_id', $post_data['tran_id'])
    //         ->updateOrInsert([
    //             'name' => $post_data['cus_name'],
    //             'email' => $post_data['cus_email'],
    //             'phone' => $post_data['cus_phone'],
    //             'amount' => $post_data['total_amount'],
    //             'status' => 'pending',
    //             'address' => $post_data['cus_add1'],
    //             'transaction_id' => $post_data['tran_id'],
    //             'currency' => $post_data['currency'],
    //         ]);

    //     $sslc = new SslCommerzNotification();
    //     # initiate(Transaction Data , false: Redirect to SSLCOMMERZ gateway/ true: Show all the Payement gateway here )
    //     $payment_options = $sslc->makePayment($post_data, 'checkout', 'json');

    //     if (!is_array($payment_options)) {
    //         print_r($payment_options);
    //         $payment_options = array();
    //     }

    // }

    public function success(Request $request)
    {
        // echo "Transaction is Successful";

        $tran_id = $request->input('tran_id');
        $amount = $request->input('amount');
        $currency = $request->input('currency');

        $sslc = new SslCommerzNotification();

        #Check order status in order tabel against the transaction id or order id.

        $order_details = DB::table('orders')
            ->where('transaction_id', $tran_id)
            ->select('transaction_id', 'status', 'currency', 'amount')->first();

        if ($order_details->status == 'pending') {
            $validation = $sslc->orderValidate($request->all(), $tran_id, $amount, $currency);

            if ($validation) {
                /*
                That means IPN did not work or IPN URL was not set in your merchant panel. Here you need to update order status
                in order table as processing or Complete.
                Here you can also sent sms or email for successfull transaction to customer
                 */
                $update_product = DB::table('orders')
                    ->where('transaction_id', $tran_id)
                    ->update(['status' => 'processing']);

                // echo "<br >Transaction is successfully Completed";

                // Start Send Email

                $data = [

                    'invoice_no' => $request->value_a,
                    'amount' => $amount,
                    'name' => $request->value_c,
                    'email' => $request->value_b,

                ];

                Mail::to($request->value_b)->send(new OrderMail($data));

                // End Send Email

                if (Session::has('coupon')) {
                    Session::forget('coupon');
                }

                Cart::destroy();

                $notification = array(
                    'message' => 'Your Order Place Successfully',
                    'alert-type' => 'info',
                );

                return redirect()->route('order.success')->with($notification);

            }
        } else if ($order_details->status == 'processing' || $order_details->status == 'Complete') {
            /*
            That means through IPN Order status already updated. Now you can just show the customer that transaction is completed. No need to udate database.
             */
            echo "Transaction is successfully Completed";
        } else {
            #That means something wrong happened. You can redirect customer to your product page.
            echo "Invalid Transaction";
        }

    }

    public function fail(Request $request)
    {
        $tran_id = $request->input('tran_id');

        $order_details = DB::table('orders')
            ->where('transaction_id', $tran_id)
            ->select('transaction_id', 'status', 'currency', 'amount')->first();

        if ($order_details->status == 'pending') {
            $update_product = DB::table('orders')
                ->where('transaction_id', $tran_id)
                ->update(['status' => 'Failed']);
            echo "Transaction is Falied";
        } else if ($order_details->status == 'processing' || $order_details->status == 'Complete') {
            echo "Transaction is already Successful";
        } else {
            echo "Transaction is Invalid";
        }

    }

    public function cancel(Request $request)
    {
        $tran_id = $request->input('tran_id');

        $order_details = DB::table('orders')
            ->where('transaction_id', $tran_id)
            ->select('transaction_id', 'status', 'currency', 'amount')->first();

        if ($order_details->status == 'pending') {
            $update_product = DB::table('orders')
                ->where('transaction_id', $tran_id)
                ->update(['status' => 'Canceled']);
            echo "Transaction is Cancel";
        } else if ($order_details->status == 'processing' || $order_details->status == 'Complete') {
            echo "Transaction is already Successful";
        } else {
            echo "Transaction is Invalid";
        }

    }

    public function ipn(Request $request)
    {
        #Received all the payement information from the gateway
        if ($request->input('tran_id')) #Check transation id is posted or not.
        {

            $tran_id = $request->input('tran_id');

            #Check order status in order tabel against the transaction id or order id.
            $order_details = DB::table('orders')
                ->where('transaction_id', $tran_id)
                ->select('transaction_id', 'status', 'currency', 'amount')->first();

            if ($order_details->status == 'pending') {
                $sslc = new SslCommerzNotification();
                $validation = $sslc->orderValidate($request->all(), $tran_id, $order_details->amount, $order_details->currency);
                if ($validation == true) {
                    /*
                    That means IPN worked. Here you need to update order status
                    in order table as processing or Complete.
                    Here you can also sent sms or email for successful transaction to customer
                     */
                    $update_product = DB::table('orders')
                        ->where('transaction_id', $tran_id)
                        ->update(['status' => 'processing']);

                    echo "Transaction is successfully Completed";
                }
            } else if ($order_details->status == 'processing' || $order_details->status == 'Complete') {

                #That means Order status already updated. No need to udate database.

                echo "Transaction is already successfully Completed";
            } else {
                #That means something wrong happened. You can redirect customer to your product page.

                echo "Invalid Transaction";
            }
        } else {
            echo "Invalid Data";
        }
    }

}
