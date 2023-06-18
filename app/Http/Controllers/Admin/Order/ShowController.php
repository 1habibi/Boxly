<?php

namespace App\Http\Controllers\Admin\Order;

use App\Http\Controllers\Controller;
use App\Models\Courier;
use App\Models\Order;
use App\Models\OrderStatus;
use App\Models\Receiving;


class ShowController extends Controller
{
    public function __invoke(Order $order)
    {

        $order = Order::with('order_status', 'order_details', 'customer', 'receiving')->where('id', $order->id)->first();
        $receivings = Receiving::all();
        $couriers = Courier::all();
        $statuses = OrderStatus::all();
        return view('admin.orders.show', compact('order', 'receivings', 'couriers', 'statuses'));
    }
}
