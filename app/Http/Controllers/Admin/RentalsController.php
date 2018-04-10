<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\admin\Customer;
use App\Model\admin\Product;
use App\Model\admin\Rental;
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
        
        return view('admin.rentals.index', compact('rentals'));
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

        return view('admin.rentals.create', compact('customers', 'products'));
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
            'customer_id' => 'required',
            'product_id' => 'required',
            'date_from' => 'required',
            'date_to' => 'required',
            'total_rent_money' => 'required'
        ]);

        $rental = new Rental;
        $rental->customer_id = $request->input('customer_id');
        $rental->product_id = $request->input('product_id');
        $rental->date_from = $request->input('date_from');
        $rental->date_to = $request->input('date_to');
        $rental->total_rent_money = $request->input('total_rent_money');
        $rental->bring_back = 0;
        
        $product = new Product();
        $productRented = $product->isProductRented($rental->product_id, $rental->date_from, $rental->date_to);
        if ($productRented)
        {
            $message = Product::find($rental->product_id)->product_name.' is al '.$productRented->count().' keer verhuurd.<br>';
            foreach($productRented as $productRent){
                $message .= 'Van '.date("d-m-Y", strtotime($productRent->date_from)).' tot '.date("d-m-Y", strtotime($productRent->date_to)).'.<br>';
            }
            return redirect()->route('rentals.create')->with('productRented', $message);
        }
        $rental->save();

        return redirect()->route('rentals.index')->with('success', 'Verhuur toegevoegd');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rental = Rental::find($id);

        return view('admin.rentals.show', compact('rental'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rental = Rental::find($id);
        $customers = Customer::all();
        $products = Product::all();

        return view('admin.rentals.edit', compact('rental', 'customers', 'products')); 
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
            'customer_id' => 'required',
            'product_id' => 'required',
            'date_from' => 'required',
            'date_to' => 'required',
            'total_rent_money' => 'required',
            'bring_back' => 'required'
        ]);

        $rental = Rental::find($id);
        $rental->customer_id = $request->input('customer_id');
        $rental->product_id = $request->input('product_id');
        $rental->date_from = $request->input('date_from');
        $rental->date_to = $request->input('date_to');
        $rental->total_rent_money = $request->input('total_rent_money');
        if (null !== $request->input('bring_back')) {
            $rental->bring_back = 1;
        } else {
            $rental->bring_back = 0;
        };
        $rental->save();

        return redirect('/rentals')->with('success', 'Verhuur bijgewerkt');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rental = Rental::find($id);
        $rental->delete();

        return redirect('/rentals')->with('success', 'Verhuur verwijderd');
    }
}
