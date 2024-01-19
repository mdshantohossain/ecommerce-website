<?php

namespace App\Models;

use App\Mail\EmailMail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Mail;
use Session;

class Customer extends Model
{
    use HasFactory;

    private static $customer;

    public static function newCustomer($request)
    {
        self::$customer = new Customer();
        self::$customer->name = $request->name;
        self::$customer->email = $request->email;
        self::$customer->phone = $request->phone;
        self::$customer->password = bcrypt($request->password);
        self::$customer->delivery_address = $request->delivery_address;
        self::$customer->save();

        Session::put('customer_name', self::$customer->name);
        Session::put('customer_id', self::$customer->id);


        return self::$customer;
    }

    public function orders():HasMany
    {
        return  $this->hasMany(Order::class);
    }
}
