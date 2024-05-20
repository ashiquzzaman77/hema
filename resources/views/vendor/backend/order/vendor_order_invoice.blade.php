{{-- <!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Invoice</title>

    <style type="text/css">
        * {
            font-family: Verdana, Arial, sans-serif;
        }

        table {
            font-size: x-small;
        }

        tfoot tr td {
            font-weight: bold;
            font-size: x-small;
        }

        .gray {
            background-color: lightgray
        }

        .font {
            font-size: 15px;
        }

        .authority {
            /*text-align: center;*/
            float: right
        }

        .authority h5 {
            margin-top: -10px;
            color: green;
            /*text-align: center;*/
            margin-left: 35px;
        }

        .thanks p {
            color: green;
            ;
            font-size: 16px;
            font-weight: normal;
            font-family: serif;
            margin-top: 20px;
        }
    </style>

</head>

<body>



    <table width="100%" style="background: #F7F7F7; padding:10px;" class="font">
        <tr>
            <td>
                <p><strong>Name:</strong><span>{{ $order->name }}</span></p>

                <p><strong>Email:</strong><span>{{ $order->email }}</span></p>

                <p><strong>Phone:</strong><span>{{ $order->phone }}</span></p>

                @php
                    $div = $order->division->division_name;
                    $dis = $order->district->district_name;
                    $state = $order->state->state_name;
                @endphp

                <p><strong>Address:</strong><span
                        class="text-danger">{{ $order->adress }},{{ $div }},{{ $dis }},{{ $state }}</span>
                </p>

                <p><strong>Post Code:</strong><span>{{ $order->post_code }}</span>
                </p>

            </td>

            <td>
                <h3><strong style="color: green;">Invoice:</strong> <span
                        style="color: red">#{{ $order->invoice_no }}</span> </h3>

                <p class="fw"><strong>Order Date:</strong><span>{{ $order->order_date }}</span></p>

                <p class="fw"><strong>Payment Type:</strong><span>{{ $order->payment_method }}</span></p>

                <p class="fw"><strong>Transaction Id:</strong><span>{{ $order->transaction_id }}</span></p>

            </td>

        </tr>
    </table>

    <br />

    <h3>All Order Product</h3>


    <table width="100%">
        <thead style="background-color: green; color:#FFFFFF;">
            <tr class="font">
                <th>Image</th>
                <th>Product Name</th>
                <th>Color</th>
                <th>Size</th>
                <th>Vendor Name </th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Total </th>
            </tr>
        </thead>
        <tbody>


            @foreach ($orderItem as $item)
                <tr class="font">
                    <td align="center">
                        <img src="{{ public_path($item->product->product_image) }}" height="50px;" width="50px;"
                            alt="">
                    </td>

                    <td align="center">{{ $item->product->product_name }}</td>

                    @if ($item->color == null)
                        <td align="center"> ...</td>
                    @else
                        <td align="center"> {{ $item->color }}</td>
                    @endif

                    @if ($item->size == null)
                        <td align="center"> ...</td>
                    @else
                        <td align="center"> {{ $item->size }}</td>
                    @endif


                    @if ($item->vendor_id == null)
                        <td align="center">Owner</td>
                    @else
                        <td align="center">{{ $item->product->user->name }}</td>
                    @endif

                    <td align="center">{{ $item->qty }}</td>
                    <td align="center">{{ $item->price }}</td>

                    <td align="center">Tk {{ $item->qty * $item->price }}</td>

                </tr>
            @endforeach

        </tbody>
    </table>

    <br>

    <table width="100%" style=" padding:0 10px 0 10px;">
        <tr>
            <td align="right">

                <h4><span style="color: green;">Delivery Cost: </span>Free</h4>
                <h2><span style="color: black;">Total Amount:</span> <span style="color: red;">Tk
                        {{ $order->amount }}</span> </h2>
            </td>
        </tr>
    </table>

    <div class="thanks mt-3">
        <p>Thanks For Buying Products..!!</p>
    </div>

    <div class="authority float-right mt-5">
        <p>-----------------------------------</p>
        <h5>Authority Signature:</h5>
    </div>

</body>

</html> --}}
