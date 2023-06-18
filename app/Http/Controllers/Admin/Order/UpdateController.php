<?php

namespace App\Http\Controllers\Admin\Order;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Order\UpdateRequest;
use App\Models\Courier;
use App\Models\Customer;
use App\Models\Loyality;
use App\Models\Order;
use App\Models\OrderStatus;
use App\Models\Receiving;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Order $order)
    {
        $customer = Customer::where('user_id', Auth::user()->id)->first();
        $loyality = Loyality::where('customer_id', $customer->id)->first();
        $data = $request->validated();
        if ($order->discount_used === 0 && $order->discount === 1) {
            $data["order_price"] = $data["order_price"] - ($data["order_price"] / 100 * $loyality->orders_count * 3);
            $loyality["orders_count"] = 0;
        }
        $loyality->save();
        $order->update($data);
        return redirect()->route('admin.orders.index');
    }
}
