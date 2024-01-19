@extends('website.master')

@section('title')
    Wishlist
@endsection

@section('body')
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="{{ route('home') }}" rel="nofollow">Home</a>
                    <span></span> Shop
                    <span></span> Wishlist
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="table shopping-summery text-center">
                                <thead>
                                <tr class="main-heading">
                                    <th scope="col" colspan="2">Product</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Stock Status</th>
                                    <th scope="col">Action</th>
                                    <th scope="col">Remove</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($wishlists as $wishlist)
                                    <tr>
                                        <td class="image product-thumbnail"><img src="{{asset($wishlist->product->image)}}" height="100" width="100" alt="#"></td>
                                        <td class="product-des product-name">
                                            <h5 class="product-name">
                                                <a href="shop-product-right.html">{{ $wishlist->product->name }}</a>
                                            </h5>
                                            <p>{{ $wishlist->product->short_description }}</p>
                                        </td>
                                        <td class="price" data-title="Price"><span>{{ 'TK. ' .$wishlist->product->selling_price}}</span></td>
                                        @if(!$wishlist->product->stoke_amount == 0)
                                            <td class="text-center" data-title="Stock">
                                                <span class="color3 font-weight-bold">In Stock</span>
                                            </td>
                                        @else
                                            <td class="text-center" data-title="Stock">
                                                <span class="text-danger font-weight-bold">Out of stock</span>
                                            </td>
                                        @endif
                                        @if(!$wishlist->product->stoke_amount == 0)
                                            <td class="text-right" data-title="Cart">
                                                <form action="{{ route('cart.add', ['id' => $wishlist->product->id]) }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="quantity" value="1" />
                                                <button type="submit" class="btn btn-sm"><i class="fi-rs-shopping-bag mr-5"></i>Add to cart</button>
                                                </form>
                                            </td>
                                        @else
                                            <td class="text-right" data-title="Cart">
                                                <button class="btn btn-sm btn-secondary"><i class="fi-rs-headset mr-5"></i>Contact Us</button>
                                            </td>
                                        @endif
                                        <td class="action" data-title="Remove"><a href="{{ route('wishlist.remove', ['id' => $wishlist->product->id]) }}"><i class="fi-rs-trash"></i></a></td>
                                    </tr>
                                @endforeach
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
