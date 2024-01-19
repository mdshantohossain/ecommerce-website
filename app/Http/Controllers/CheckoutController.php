<?php

namespace App\Http\Controllers;

use App\Mail\EmailMail;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Session;

class CheckoutController extends Controller
{
    public $customer, $order;

    public function index()
    {
        return view('website.checkout.index');
    }

    public function newOrder(Request $request)
    {
        if($request->payment_method == 1)
        {
            $this->validate($request,[
                'delivery_address' => 'required'
            ]);

            if (Session::has('customer_id'))
            {
                $this->customer = Customer::where('id', Session::get('customer_id'))->first();
            }else{
                $this->validate($request,[
                    'name' => 'required',
                    'email' => 'required|unique:customers',
                    'password' => 'required',
                    'phone' => 'required|unique:customers|max:14|min:11',
                    'delivery_address' => 'required'
                ]);
                $this->customer = Customer::newCustomer($request);

            }

            $this->order = Order::newOrder($request, $this->customer->id);
            OrderDetail::newOrderDetail($this->order->id);

            return redirect('/customer/dashboard');
        }
        else{
            return 'OK';
        }
    }
}
