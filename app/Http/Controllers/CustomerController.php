<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Session;

class CustomerController extends Controller
{
    public $customer;

    public function index()
    {
        return view('admin.customer.index', [
            'customers' => Customer::all()
        ]);
    }

    public function detail($id)
    {
        return view('admin.customer.detail', [
            'customer' => Customer::find($id)
        ]);
    }

    public function edit($id)
    {
        return view('admin.customer.edit', [
            'customer' => Customer::find($id)
        ]);
    }

    public function update(Request $request, $id)
    {
        $customer = Customer::find($id);
        $customer->status = $request->status;
        $customer->save();

        return redirect('/customer/manage')->with('message', 'Customer update successful');
    }
}
