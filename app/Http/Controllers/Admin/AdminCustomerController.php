<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Filters\CustomerFilter;
use App\Http\Requests\Admin\Customer\FilterRequest;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminCustomerController extends Controller
{
    public function index(FilterRequest $request)
    {
        $data = $request->validated();
        $filter = app()->make(CustomerFilter::class, ['queryParams' => array_filter($data)]);
        $customers = Customer::filter($filter);
        $customers = $customers->paginate(10);
        return view('admin.customers.index', compact('customers'));
    }

}
