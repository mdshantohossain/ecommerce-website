@extends('website.master')

@section('title')
    Checkout Page
@endsection

@section('body')
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="{{ route('home') }}" rel="nofollow">Home</a>
                    <span></span> Shop
                    <span></span> Checkout
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-25">
                            <h4>Billing Details</h4>
                        </div>
                        <form action="{{ route('order.new') }}" method="POST">
                            @csrf
                            @if(!Session::has('customer_id'))
                                <div class="form-group">
                                    <input type="text" name="name" placeholder="Full Name *" />
                                    <span class="text-center text-danger">{{ $errors->has('name') ? $errors->first('name') : '' }}</span>
                                </div>
                                <div class="form-group">
                                    <input type="email"  name="email" placeholder=" your email *" />
                                    <span class="text-center text-danger">{{ $errors->has('email') ? $errors->first('email') : '' }}</span>
                                </div>
                                <div class="form-group">
                                    <input type="password"  name="password" placeholder=" your password *" />
                                    <span class="text-center text-danger">{{ $errors->has('password') ? $errors->first('password') : '' }}</span>
                                </div>
                                <div class="form-group">
                                <input type="text" name="phone" placeholder=" your phone *" />
                                <span class="text-center text-danger">{{ $errors->has('phone') ? $errors->first('phone') : '' }}</span>
                            </div>
                            @endif
                            <div class="form-group">
                                <textarea name="delivery_address" rows="3" placeholder=" your delivery address"></textarea>
                                <span class="text-center text-danger">{{ $errors->has('delivery_address') ? $errors->first('delivery_address') : '' }}</span>
                            </div>
                            <div class="payment_method">
                                <div class="mb-25">
                                    <h5>Payment</h5>
                                </div>
                                <div class="payment_option">
                                    <div class="custome-radio">
                                        <input class="form-check-input" checked type="radio" name="payment_method" value="1" id="exampleRadios4" />
                                        <label class="form-check-label" for="exampleRadios4" data-bs-toggle="collapse" data-target="#checkPayment" aria-controls="checkPayment">Cash On</label>
                                    </div>
                                    <div class="custome-radio">
                                        <input class="form-check-input" type="radio" name="payment_method" value="2" id="exampleRadios5" />
                                        <label class="form-check-label" for="exampleRadios5" data-bs-toggle="collapse" data-target="#paypal" aria-controls="paypal">Online</label>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-fill-out btn-block mt-30">Place Order</button>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <div class="order_review">
                            <div class="mb-20">
                                <h4 class="text-center">Your Orders</h4>
                            </div>
                            <div class="table-responsive order_table text-center">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th colspan="2">Product</th>
                                        <th>Total</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php($sum = 0)
                                    @foreach(Cart::content() as $item)
                                        <tr>
                                            <td class="image product-thumbnail">
                                                <img src="{{asset($item->options->image)}}" width="80" height="80" alt="#" />
                                            </td>
                                            <td>
                                                <h5><a href="{{ route('detail', ['id' => $item->id]) }}">{{ substr($item->name, 0, 100). '...' }}</a></h5> <span class="product-qty">x {{ $item->qty }}</span>
                                            </td>
                                            <td>{{ $item->price * $item->qty }}</td>
                                        </tr>
                                        @php($sum = $sum + ($item->price * $item->qty))
                                    @endforeach
                                    <tr>
                                        <th>SubTotal</th>
                                        <td class="product-subtotal" colspan="2">{{ $sum. ' ' }}TK.</td>
                                    </tr>
                                    <tr>
                                        <th>Tax Total</th>
                                        <td colspan="2">{{ $tax_total = $sum/100 * 10 . ' '}}TK.</td>
                                    </tr>
                                    <tr>
                                        <th>Shipping</th>
                                        <td colspan="2">{{ $shipping_total = 200 . ' '}}TK.</td>
                                    </tr>
                                    <tr>
                                        <th>Total</th>
                                        <td colspan="2" class="product-subtotal"><span class="font-xl text-brand fw-900">TK.{{' '. $total_payable = $sum + $tax_total + $shipping_total }}</span></td>
                                    </tr>
                                    <?php
                                        Session::put('order_total', $sum);
                                        Session::put('tax_total', $tax_total);
                                        Session::put('shipping_total', $shipping_total);
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
