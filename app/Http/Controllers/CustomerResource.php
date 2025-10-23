<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerResource extends Controller
{
    /**
     * Display a listing of the customer.
     */
    public function index()
    {
        $mylist = Customer::all();
        return view('customer.list',compact('mylist'));
    }

    /**
     * Show the form for creating a new customer.
     */
    public function create()
    {
        return view('customer.add');
    }

    /**
     * Store a newly created customer in storage.
     */
    public function store(Request $request)
    {
        $c2 = Customer::create($request->all());
        return redirect()->route('customer.index');
    }

    /**
     * Display the specified customer.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified customer.
     */
    public function edit(string $id)
    {
        $obj  = Customer::findOrFail($id);
        return view('customer.edit',compact('obj'));
    }

    /**
     * Update the specified customer in storage.
     */
    public function update(Request $request, string $id)
    {
        $obj  = Customer::findOrFail($id);
        $obj->fill($request->all());
        $obj->save();
        return redirect()->route('customer.index');

    }

    /**
     * Remove the specified customer from storage.
     */
    public function destroy(string $id)
    {
        $obj  = Customer::findOrFail($id);
        $obj->delete();
        return redirect()->route('customer.index');
    }
}
