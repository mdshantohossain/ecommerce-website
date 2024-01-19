<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cart;
use Session;

class OrderDetail extends Model
{
    use HasFactory;

    public static $order_detail, $product;

    public static function newOrderDetail($id)
    {
        foreach (Cart::content() as $item)
        {
            self::$order_detail = new OrderDetail();
            self::$order_detail->order_id = $id;
            self::$order_detail->product_id = $item->id;
            self::$order_detail->name = $item->name;
            self::$order_detail->price = $item->price;
            self::$order_detail->quantity = $item->qty;
            self::$order_detail->save();

            Cart::remove($item->rowId);

            Session::forget('order_total');
            Session::forget('tax_total');
            Session::forget('shipping_total');

           self::$product =  Product::find( $item->id);
           self::$product->stoke_amount = self::$product->stoke_amount - $item->qty;
           self::$product->save();
        }
    }

}
