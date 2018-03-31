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
        $customers = Customer::get();

        return view('customers.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
            'forename' => 'required',
            'lastname' => 'required',
            'street' => 'required',
            'number' => 'required',
            'zipcode' => 'required',
            'city' => 'required',
            'account_number' => 'required',
            'identification' => 'required'
        ]);

        // Creeer customer
        $customer = new Customer;
        $customer->forename = $request->input('forename');
        $customer->lastname = $request->input('lastname');
        $customer->street = $request->input('street');
        $customer->number = $request->input('number');
        $customer->zipcode = $request->input('zipcode');
        $customer->city = $request->input('city');
        $customer->account_number = $request->input('account_number');
        $customer->identification = $request->input('identification');
        $customer->discount = $request->input('discount');
        $customer->comment = $request->input('comment');
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
           'forename' => 'required',
            'lastname' => 'required',
            'street' => 'required',
            'number' => 'required',
            'zipcode' => 'required',
            'city' => 'required',
            'account_number' => 'required',
            'identification' => 'required'
        ]);
        
        // Update Customer
        $customer = Customer::find($id);
        $customer->forename = $request->input('forename');
        $customer->lastname = $request->input('lastname');
        $customer->street = $request->input('street');
        $customer->number = $request->input('number');
        $customer->zipcode = $request->input('zipcode');
        $customer->city = $request->input('city');
        $customer->account_number = $request->input('account_number');
        $customer->identification = $request->input('identification');
        $customer->discount = $request->input('discount');
        $customer->comment = $request->input('comment');
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
