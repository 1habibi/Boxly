<?php

namespace App\Http\Controllers\Admin\Order;

use App\Http\Controllers\Controller;
use App\Models\Order;


class QueryController extends Controller
{
    public function __invoke()
    {
        $orders = Order::with('customer', 'order_status')->where('order_status_id', 1)->get();
        return view('admin.orders.query', compact('orders'));
    }
}
