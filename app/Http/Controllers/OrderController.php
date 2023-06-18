<?php

namespace App\Http\Controllers;

use App\Http\Requests\Order\StoreRequest;
use App\Http\Resources\Order\OrderResource;
use App\Models\Customer;
use App\Models\Loyality;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $customer = Customer::where('user_id', Auth::user()->id)->first();
        $orders = Order::with('order_status')->where('customer_id', $customer->id)->get();
        $ordersRes = OrderResource::collection($orders)->resolve();
        $loyality = Loyality::where('customer_id', $customer->id)->first();
        return inertia('Order/Index', [
            'orders' => $orders,
            'ordersRes' => $ordersRes,
            'loyality' => $loyality,
        ]);
    }

    public function create()
    {
        $customer = Customer::where('user_id', Auth::user()->id)->first();
        $loyality = Loyality::where('customer_id', $customer->id)->first();
        return inertia('Order/Create', [
            'loyality' => $loyality,
        ]);
    }

    public function show(Order $order)
    {
        // $orderDetails = OrderDetail::where('order_id', $order->id)->get();
        $order = Order::with('order_status', 'order_details')->where('id', $order->id)->first();
        return inertia('Order/Show', compact('order'));
    }

    public function store(Request $request)
    {
        $request->validate([
           'products.*.url' => ['required'],
            'products.*.count' => ['required', 'numeric'],
        ]);
        $customer = Customer::where('user_id', Auth::user()->id)->first();
        $order = Order::create([
            'customer_id' => $customer->id,
            'order_price' => 0,
            'discount' => $request->discount,
            'receiving_id' => 1,
            'courier_id' => 1,
            'order_status_id' => 1,
        ]);

        $products = $request->all()["products"];

        $orderDetails = [];

        foreach ($products as $product){
            $orderDetails[] = new OrderDetail([
                'url' => $product['url'],
                'count' => $product['count'],
                'note' => $product['note']
            ]);
        }

        $order->order_details()->saveMany($orderDetails);

        return redirect()->route('orders.index', [
            'orders' => Order::where('customer_id', $customer->id)->get()
        ]);
    }

    public function delete(Order $order){
        $order->delete();
        return redirect()->route('orders.index');
    }

    public function update(Order $order){
        $loyality = Loyality::where('customer_id', $order->customer_id)->first();
        $orders_count = $loyality->orders_count;
        if($orders_count < 10){
            $orders_count = $loyality->orders_count + 1;
        }
        else if($orders_count === 10){
            $orders_count = 0;
            $order->discount = 1;
        }
        $loyality->orders_count = $orders_count;
        $loyality->save();
        $order->discount_used = 1;
        $order->order_status_id = 3;
        $order->save();
        return redirect()->route('orders.index');
    }
}
