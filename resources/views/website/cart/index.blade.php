@extends('website.master')

@section('title')
    Cart Product
@endsection

@section('body')
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="index.html" rel="nofollow">Home</a>
                    <span></span> Shop
                    <span></span> Your Cart
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-12">

                        <div class="table-responsive">

                            <table class="table shopping-summery text-center clean">
                                <thead>
                                <tr class="main-heading">
                                    <th scope="col">Image</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Subtotal</th>
                                    <th scope="col">Remove</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php($sum = 0)
                                @foreach(Cart::content() as $item)
                                    <form action="{{ route('cart.update', ['id' => $item->rowId]) }}" method="POST">
                                        @csrf
                                <tr>
                                    <td class="image product-thumbnail"><img src="{{asset($item->options->image)}}" width="150" height="100" alt="Product image"></td>
                                    <td class="product-des product-name">
                                        <h5 class="product-name"><a href="{{ route('detail', ['id' => $item->id]) }}">{{ substr($item->name, 0, 60). '...' }}</a></h5>
                                    </td>
                                    <td class="price" data-title="Price"><span>{{ $item->price }}</span></td>
                                    <td class="text-center" data-title="Stock">
                                        <input type="number" class="qty-button" name="quantity" min="1" value="{{ $item->qty }}" />
                                    </td>
                                    <td class="text-right" data-title="Cart">
                                        <span>{{ $item->price * $item->qty }} </span>
                                    </td>
                                    <td class="action" data-title="Remove"><a href="{{ route('cart.remove', ['id' => $item->rowId]) }}" class="text-muted"><i class="fi-rs-trash"></i></a></td>
                                </tr
                                    @php($sum = $sum + ($item->qty * $item->price))
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="cart-action text-end">
                            <button type="submit" class="btn  mr-10 mb-sm-15"><i class="fi-rs-shuffle mr-10"></i>Update Cart</button>
                        </div>
                        </form>
                        <div class="divider center_icon mt-50 mb-50"><i class="fi-rs-fingerprint"></i></div>
                        <div class="row mb-50">
                            <div class="col-lg-6 col-md-12 mx-auto">
                                <div class="border p-md-4 p-30 border-radius cart-totals">
                                    <div class="heading_s1 mb-3">
                                        <h4>Cart Totals</h4>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tbody>
                                            <tr>
                                                <td class="cart_total_label">Cart Subtotal</td>
                                                <td class="cart_total_amount"><span class="font-lg fw-900 text-brand"> {{ $sum }} TK.</span></td>
                                            </tr>
                                            <tr>
                                                <td class="cart_total_label">Shipping</td>
                                                <td class="cart_total_amount"> <i class="ti-gift mr-5"></i>{{ $tax = $sum/100 * 10 }} TK.</td>
                                            </tr>
                                            <tr>
                                                <td class="cart_total_label">Shipping</td>
                                                <td class="cart_total_amount"> <i class="ti-gift mr-5"></i>{{ $shipping = 100 }} TK.</td>
                                            </tr>
                                            <tr>
                                                <td class="cart_total_label">Total</td>
                                                <td class="cart_total_amount"><strong><span class="font-xl fw-900 text-brand">TK.{{ $total_payable = $sum + $tax + $shipping }}</span></strong></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <a href="{{ route('checkout') }}" class="btn "> <i class="fi-rs-box-alt mr-10"></i> Proceed To CheckOut</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
