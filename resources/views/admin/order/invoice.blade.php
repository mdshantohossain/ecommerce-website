@extends('admin.master')

@section('title')
    Order Invoice
@endsection

@section('body')
    <style>
        body {
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            text-align: center;
            color: #777;
        }

        body h1 {
            font-weight: 300;
            margin-bottom: 0px;
            padding-bottom: 0px;
            color: #000;
        }

        body h3 {
            font-weight: 300;
            margin-top: 10px;
            margin-bottom: 20px;
            font-style: italic;
            color: #555;
        }

        body a {
            color: #06f;
        }

        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
            font-size: 16px;
            line-height: 24px;
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color: #555;
        }

        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
            border-collapse: collapse;
        }

        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }

        .invoice-box table tr td:nth-child(2) {
            text-align: right;
        }

        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.top table td.title {
            font-size: 45px;
            line-height: 45px;
            color: #333;
        }

        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }

        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }

        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.item td {
            border-bottom: 1px solid #eee;
        }

        .invoice-box table tr.item.last td {
            border-bottom: none;
        }

        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }

        @media only screen and (max-width: 600px) {
            .invoice-box table tr.top table td {
                width: 100%;
                display: block;
                text-align: center;
            }

            .invoice-box table tr.information table td {
                width: 100%;
                display: block;
                text-align: center;
            }
        }
    </style>
    <div class="row">
        <div class="col-md-12">
            <div class="invoice-box">
                <table>
                    <tr class="top">
                        <td colspan="2">
                            <table>
                                <tr>
                                    <td class="title">

                                    </td>

                                    <td>
                                        Invoice #: {{ $order->id }}<br />
                                        Order Date: {{ $order->order_date }}<br />
                                        Invoice Date: {{ date('m-d-y') }}
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <tr class="information">
                        <td colspan="2">
                            <table>
                                <tr>
                                    <td>
                                        <h2>Billing Info</h2>
                                        <p>Name: {{ $order->customer->name }}</p>
                                        <p>Email: {{ $order->customer->phone }}</p>
                                    </td>

                                    <td>
                                        <h2>Shipping Info</h2>
                                        {{ $order->delivery_address }}
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <tr class="heading">
                        <td>Item</td>
                        <td>Price</td>
                    </tr>
                    @php($sum = 0)
                    @foreach($order->orderDetails as $product)
                        <tr class="body">
                            <td>{{ $product->name }} &nbsp x{{ $product->quantity }}</td>
                            <td>{{ $product->price * $product->quantity}}</td>
                        </tr>
                        @php($sum = $sum + ($product->price * $product->quantity))
                    @endforeach
                    <tr class="total">
                        <td></td>

                        <td>Order Total: {{ $sum }}TK</td>
                    </tr>
                    <tr>
                    <tr class="heading">
                        <td>Tax Total</td>
                        <td>{{ $order->tax_total }}</td>
                    </tr>
                    <tr>
                    <tr class="heading">
                        <td>Shipping Total</td>
                        <td>{{ $order->shipping_total }}</td>
                    </tr>
                    <tr class="heading">
                        <td>Payment Method</td>

                        <td>{{ $order->payment_type == 1 ? 'Cash On' : 'Online' }}</td>
                    </tr>

                    <tr class="total">
                        <td></td>

                        <td> Total: {{ $sum }}TK</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection
