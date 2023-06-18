<?php

namespace App\Http\Controllers;


use App\Http\Requests\Customer\StoreRequest;
use App\Http\Requests\Customer\UpdateRequest;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class CustomerController extends Controller
{
    public function index(){
        return inertia('Customer/Create');
    }

    public function store(StoreRequest $request){
        $customerData = $request->all();
        $customerData['user_id'] = Auth::user()->id;
        Customer::create($customerData);
        return redirect()->route('profile.edit');
    }

    public function edit(Customer $customer){
        return Inertia::render('Customer/Edit', [
            'customer' => Customer::where('user_id', Auth::user()->id)->first(),
        ]);
    }

    public function update(UpdateRequest $request){
        $customer = Customer::where('user_id', Auth::user()->id)->first();
        $customer->update($request->validated());
        return redirect()->route('profile.edit');
    }
}
