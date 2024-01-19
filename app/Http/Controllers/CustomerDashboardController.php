<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use Illuminate\Http\Request;
use Session;

class CustomerDashboardController extends Controller
{
    public $customer;

    public function index()
    {
        return view('website.customer.dashboard', [
            'orders' => Order::where('customer_id', Session::get('customer_id'))->get(),
            'customer' => Customer::find(Session::get('customer_id'))
        ]);
    }

    public function signIn(Request $request)
    {

        $this->customer = Customer::where('phone', $request->phone)->first();

        if ($this->customer)
        {
            if (password_verify($request->password, $this->customer->password))
            {
                Session::put('customer_id', $this->customer->id);
                Session::put('customer_name', $this->customer->name);

                return back()->with('message', 'Login successful');
            }else{
                return  back()->with('message', 'Wrong password.');
            }
        }else{
            return back()->with('message', "Those number didn't match our records.");
        }
    }

    public function signUp(Request $request)
    {

        $this->customer = new Customer();
        $this->customer->name = $request->name;
        $this->customer->email = $request->email;
        $this->customer->password = bcrypt($request->password);
        $this->customer->save();

        return  back()->with('message', 'Register successful. Please login.');
    }

    public function logout()
    {
        Session::forget('customer_id');
        Session::forget('customer_name');

        return back()->with('message', 'Logout successful');
    }

    public function update(Request $request)
    {

        $this->customer = Customer::find(Session::get('customer_id'));
        if ($request->new_password)
        {
            if (password_verify($request->current_password, $this->customer->password))
            {
                $this->customer->name = $request->name;
                $this->customer->email = $request->email;
                $this->customer->phone = $request->phone;
                $this->customer->password = bcrypt($request->new_password);
                $this->customer->address = $request->address;
                $this->customer->delivery_address = $request->delivery_address;
                $this->customer->save();
            }else{
                return back()->with('wrongPassword', 'wrong password');
            }
        }

        $this->customer->name = $request->name;
        $this->customer->email = $request->email;
        $this->customer->phone = $request->phone;
        $this->customer->address = $request->address;
        $this->customer->delivery_address = $request->delivery_address;
        $this->customer->save();



        return back()->with('message', 'Profile info update successful');
    }
}
