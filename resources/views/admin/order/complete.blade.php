@extends('admin.master')

@section('title')
    Completed Order
@endsection

@section('body')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h3 class="text-center mb-2">All Complete Order information</h3>

                    <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                        <thead>
                        <tr class="text-center">
                            <th>Sl.</th>
                            <th>Order Total</th>
                            <th>Order Date</th>
                            <th>Order Status</th>
                            <th>Delivery Address</th>
                            <th>Payment Method</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($orders as $order)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $order->order_total }}</td>
                                <td>{{ $order->order_date }}</td>
                                <td>{{ $order->order_status }}</td>
                                <td>{{ $order->delivery_address }}</td>
                                <td>{{ $order->payment_method === 1 ? 'Cash On' : '' }}</td>
                                <td>
                                    <a href="{{ route('order.detail', ['id' => $order->id]) }}" class="btn btn-primary btn-sm">
                                        <i class="fa fa-book-open"></i>
                                    </a>
                                    <a href="{{ route('invoice.print', ['id' => $order->id]) }}" class="btn btn-primary btn-sm">
                                        <i class="fa fa-book-open"></i>
                                    </a>
                                    <a href="{{ route('order.edit', ['id' => $order->id]) }}" class="btn btn-success btn-sm">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div> <!-- end col -->
    </div>
@endsection
