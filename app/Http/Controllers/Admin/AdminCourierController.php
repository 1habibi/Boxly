<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Filters\CustomerFilter;
use App\Http\Requests\Admin\Courier\StoreRequest;
use App\Http\Requests\Admin\Courier\UpdateRequest;
use App\Http\Requests\Admin\Customer\FilterRequest;
use App\Models\Courier;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminCourierController extends Controller
{
    public function index()
    {
        $couriers = Courier::all();
        return view('admin.couriers.index', compact('couriers'));
    }

    public function create()
    {
        return view('admin.couriers.create');
    }

    public function update(UpdateRequest $request, Courier $courier)
    {
        $data = $request->validated();
        $courier->update($data);
        return redirect()->route('admin.couriers.show', $courier->id);
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        Courier::create($data);
        return redirect()->route('admin.couriers.index');
    }

    public function show(Courier $courier)
    {
        return view('admin.couriers.show', compact('courier'));
    }

    public function edit(Courier $courier)
    {
        return view('admin.couriers.edit', compact('courier'));
    }

    public function destroy(Courier $courier)
    {
        $courier->delete();
        return redirect()->route('admin.couriers.index');
    }

}
