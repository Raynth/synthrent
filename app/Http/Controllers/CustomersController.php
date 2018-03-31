<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Customer;

class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::orderBy('created_at', 'ASC')->get();

        return view('customers.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::orderBy('category_name')->get();

        return view('customers.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'category_id' => 'required',
            'customer_name' => 'required',
            'rent_money' => 'required',
            'description' => 'required',
            'cover_image' => 'image|nullable|max:1999'
        ]);

        // Creeer customer
        $customer = new Customer;
        $customer->category_id = $request->input('category_id');
        $customer->customer_name = $request->input('customer_name');
        $customer->rent_money = $request->input('rent_money');
        $customer->description = $request->input('description');
        $customer->cover_image = $fileNameToStore;
        $customer->online = $request->input('online');
        $customer->save();

        return redirect('/customers')->with('success', 'Klant toegevoegd');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer = Customer::find($id);

        return view('customers.show', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = Customer::find($id);

        return view('customers.edit', compact('customer', 'categories')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'category_id' => 'required',
            'customer_name' => 'required',
            'rent_money' => 'required',
            'description' => 'required',
            'cover_image' => 'image|nullable|max:1999'
        ]);
        
        // Update Customer
        $customer = Customer::find($id);
        $customer->category_id = $request->input('category_id');
        $customer->customer_name = $request->input('customer_name');
        $customer->rent_money = $request->input('rent_money');
        $customer->description = $request->input('description');
        $customer->online = $request->input('online');
        $customer->save();

        return redirect('/customers')->with('success', 'Klant bijgewerkt');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = Customer::find($id);
        $customer->delete();

        return redirect('/customers')->with('success', 'Klant verwijderd');
    }
}
