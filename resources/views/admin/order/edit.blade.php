@extends('admin.master')

@section('title')
    Order Edit
@endsection

@section('body')

    <div class="row">

        <div class="col-xl-8 mx-auto">
            <div class="card">
                <div class="card-body">
                    <h4 class="text-center mb-2"> Order Edit Form</h4>
                    <h5 class="text-center text-success mb-3">{{ session('message') }}</h5>
                    <form action="{{route('order.update', ['id' => $order->id])}}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-4">
                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Order Id</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" readonly value="{{ '#'.$order->id }}" />
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Order Total</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" value="{{ $order->order_total }}" readonly />
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Delivery Address</label>
                            <div class="col-sm-9">
                                <textarea rows="3" name="delivery_address" class="form-control">{{ $order->delivery_address }}</textarea>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Order Status</label>
                            <div class="col-sm-9">
                                <select name="order_status" class="form-select">
                                        <option value="Pending" {{ $order->order_status == 'Pending' ? 'selected': '' }}>Pending</option>
                                        <option value="Processing" {{ $order->order_status == 'Processing' ? 'selected': '' }}>Processing</option>
                                        <option value="Complete" {{ $order->order_status == 'Complete' ? 'selected': '' }}>Complete</option>
                                        <option value="Cancel" {{ $order->order_status == 'Cancel' ? 'selected': '' }}>Cancel</option>
                                </select>
                            </div>
                        </div>

                        <div class="row justify-content-end">
                            <div class="col-sm-9">
                                <div>
                                    <button type="submit" class="btn btn-primary w-md">Update</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
    </div>
@endsection
