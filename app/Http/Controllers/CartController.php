<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Cart;

class CartController extends Controller
{
    public  $product;

    public function index(Request $request, $id)
    {
        $this->product = Product::find($id);

        Cart::add([
            'id' => $this->product->id,
            'name' => $this->product->name,
            'qty' => $request->quantity,
            'price' => $this->product->selling_price,
            'options' => [
                'image' => $this->product->image,
                'description' => $this->product->short_description,
            ]
        ]);

        return redirect('/cart/show');
    }

    public function show()
    {
        return view('website.cart.index');
    }

    public function remove($id)
    {
        Cart::remove($id);
        return back()->with('message', 'Remove cart item successful');
    }

    public function update(Request $request, $id)
    {
        Cart::update($id, [
            'qty' => $request->quantity
        ]);
        return back()->with('message', 'Cart item update successful');
    }
}
