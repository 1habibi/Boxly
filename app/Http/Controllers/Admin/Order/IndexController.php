<?php

namespace App\Http\Controllers\Admin\Order;

use App\Http\Controllers\Controller;
use App\Http\Filters\OrderFilter;
use App\Http\Requests\Admin\Order\FilterRequest;
use App\Models\Order;


class IndexController extends Controller
{
    public function __invoke(FilterRequest $request)
    {
        $data = $request->validated();
        $filter = app()->make(OrderFilter::class, ['queryParams' => array_filter($data)]);
        $orders = Order::filter($filter);
        $orders = $orders->with('customer', 'order_status')->paginate(10);
        // $orders = Order::with('customer', 'order_status')->paginate(1);
        return view('admin.orders.index', compact('orders'));
    }
}
