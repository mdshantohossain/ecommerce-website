@extends('admin.master')

@section('title')
    Order Detail
@endsection

@section('body')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h3 class="text-center mb-2"> Order Detail information</h3>

                    <table class="table table-bordered dt-responsive  nowrap w-100">
                        <tr>
                            <th>Order Id.</th>
                            <td>#{{ $order->id }}</td>
                        </tr>
                        <tr>
                            <th>Order Total</th>
                            <td>{{ $order->order_total }}</td>
                        </tr>
                        <tr>
                            <th>Tax Total</th>
                            <td>{{ $order->tax_total }}</td>
                        </tr>
                        <tr>
                            <th>Shipping Total</th>
                            <td>{{ $order->shipping_total }}</td>
                        </tr>
                        <tr>
                            <th>Order Date</th>
                            <td>{{ $order->order_date }}</td>
                        </tr>
                        <tr>
                            <th>Order Status</th>
                            <td>{{ $order->order_status }}</td>
                        </tr>
                        <tr>
                            <th>Delivery Address</th>
                            <td>{{ $order->delivery_address }}</td>
                        </tr>
                        <tr>
                            <th>Delivery Date</th>
                            <td>{{ $order->delivery_date }}</td>
                        </tr>
                        <tr>
                            <th>Delivery Status</th>
                            <td>{{ $order->delivery_status }}</td>
                        </tr>
                        <tr>
                            <th>Payment Method</th>
                            <td>{{ $order->payment_method == 1 ? 'Cash On' : 'Online' }}</td>
                        </tr>
                        <tr>
                            <th>Payment Date</th>
                            <td>{{ $order->payment_date }}</td>
                        </tr>
                        <tr>
                            <th>Payment Status</th>
                            <td>{{ $order->payment_status }}</td>
                        </tr>
                        <tr>
                            <th>Customer Info</th>
                            <td>{{$order->customer->phone}}</td>
                        </tr>
                    </table>

                </div>
            </div>
        </div> <!-- end col -->
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h3 class="text-center mb-2"> Product information</h3>

                    <table class="table table-bordered dt-responsive  nowrap w-100">
                        <thead>
                        <tr class="text-center">
                            <th>Sl.</th>
                            <th> Name</th>
                            <th>Price </th>
                            <th> Quantity</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($order->orderDetails as $product)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->quantity }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
        <!-- end col -->
    </div>
@endsection
