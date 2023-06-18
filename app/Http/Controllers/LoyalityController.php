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

class LoyalityController extends Controller
{
    public function index()
    {

    }

    public function store()
    {
        $loyality = new Loyality;
        $loyality->customer_id = Customer::where('user_id', Auth::user()->id)->first()->id;
        $loyality->orders_count = 0;
        $loyality->save();
        return redirect()->route('orders.index');
    }
}
