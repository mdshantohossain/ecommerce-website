<?php

namespace App\Models;

use App\Mail\EmailMail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Mail;
use Session;

class Order extends Model
{
    use HasFactory;

    public static $order, $customer;


    public static function newOrder($request, $id)
    {
        self::$order = new Order();
        self::$order->customer_id = $id;
        self::$order->order_total = Session::get('order_total');
        self::$order->tax_total = Session::get('tax_total');
        self::$order->shipping_total = Session::get('shipping_total');
        self::$order->order_date = date('m-d-Y');
        self::$order->order_timestamp = strtotime(date('Y-m-d'));
        self::$order->delivery_address = $request->delivery_address;
        self::$order->payment_method = $request->payment_method;
        self::$order->save();

        self::$customer = Customer::find($id);

        $data = [
            'name' => self::$customer->name,
            'title' => '',
            'body' => 'Your order is pending. You would get your product within 2/3 days. We will call you'
        ];
        Mail::to(self::$customer->email)->send(new EmailMail($data));

        return self::$order;
    }

    public function orderDetails(): HasMany
    {
        return  $this->hasMany(OrderDetail::class);
    }
    public function customer(): BelongsTo
    {
        return  $this->belongsTo(Customer::class);
    }
}
