<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use PDF;

class OrderController extends Controller
{
    public $order;

    public function index()
    {
        return view('admin.order.index', [
            'orders' => Order::where('order_status', 'Pending')
                ->orWhere('order_status', 'Processing')
                ->get()
        ]);
    }

    public function complete()
    {
        return view('admin.order.complete', [
            'orders' => Order::where('order_status', 'Complete')
                ->orWhere('order_status', 'Cancel')
                ->get()
        ]);
    }

    public function detail($id)
    {
        return view('admin.order.detail', [
            'order' => Order::find($id)
        ]);
    }

    public function invoice($id)
    {
        return view('admin.order.invoice', [
            'order' => Order::find($id)
        ]);
    }

    public function orderPrint($id)
    {
        $pdf = PDF::loadView('admin.order.print',['order' => Order::find($id)]);
        return $pdf->stream('invoice-no'. $id. '.pdf');
    }

    public function edit($id)
    {
        return view('admin.order.edit', [
            'order' => Order::find($id)
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->order = Order::find($id);

        if ($request->order_status == 'Pending')
        {
            $this->order->save();
            
            return back()->with('message', 'Order status update successful');
        }
        else if($request->order_status == 'Processing')
        {
            $this->order->order_status = $request->order_status;
            $this->order->delivery_address = $request->delivery_address;
            $this->order->delivery_status = 'Processing';
            $this->order->payment_status = 'Processing';
            $this->order->save();

            return back()->with('message', 'Order status update successful');

        }else if ($request->order_status == 'Complete')
        {
            $this->order->order_status = $request->order_status;
            $this->order->delivery_status = 'Complete';
            $this->order->delivery_date = date('Y-m-d');
            $this->order->delivery_timestamp = strtotime(date('y-m-d'));
            $this->order->payment_status = 'Complete';
            $this->order->payment_date = date('Y-m-d');
            $this->order->payment_timestamp = strtotime(date('y-m-d'));
            $this->order->save();

            return back()->with('message', 'Order status update successful');
        }
        else if($request->order_status == 'Cancel')
        {
            $this->order->order_status = $request->order_status;
            $this->order->delivery_status = 'Cancel';
            $this->order->payment_status = 'Cancel';
            $this->order->save();

            return back()->with('message', 'Order status update successful');
        }


    }

    public function delete($id)
    {
        $this->order = Order::find($id);
        $this->order->delete();

        foreach ($this->order->orderDetails as $orderDetail)
        {
            $orderDetail->delete();
        }

        return back()->with('message', 'Order delete successful.');
    }
}
