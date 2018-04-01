<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Product;
use App\Rental;
use DateTime;

class RentalsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rentals = Rental::all();
        
        return view('rentals.index', compact('rentals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customers = Customer::all();
        $products = Product::all();

        return view('rentals.create', compact('customers', 'products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rental = new Rental;
        $rental->customer_id = $request->input('customer_id');
        $rental->product_id = $request->input('product_id');
        $rental->date_from = $request->input('date_from');
        $rental->date_to = $request->input('date_to');
        // Berekening aantal dagen tussen 'date_from' en 'date_to'
        $dateFrom = new DateTime($rental->date_from);
        $dateTo = new DateTime($rental->date_to);
        $interval = $dateFrom->diff($dateTo);
        $days = $interval->format('%a');
        // Berekening totaal huurprijs
        $rental->total_rent_money = 0;
        $rental->bring_back = 0;
        $rental->save();

        return redirect('/rentals')->with('success', 'Verhuur toegevoegd');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
