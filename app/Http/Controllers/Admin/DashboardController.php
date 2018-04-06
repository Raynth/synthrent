<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\admin\Category;
use App\Model\admin\Customer;
use App\Model\admin\Product;
use App\Model\admin\Rental;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::count();
        $customers = Customer::count();
        $products = Product::count();
        $rentals = Rental::count();
        return view('admin.dashboard.index', compact('categories', 'customers', 'products', 'rentals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function calculateRentalsPerMonth()
    {
        $dateFrom = '2018-04-05';
        echo $dateFrom;
        $monthFrom = date("m",strtotime($dateFrom));
        echo $maand;
        $dateTo = '2018-05-02';
        echo $dateTo;
        $monthTo = date("m",strtotime($dateTo));
        
        // if (date_from en date_to zijn in dezelfde maand)

        // elseif (date_from en date_to zijn in 2 maanden)

        // else (date_from en date_to zijn over 3 of meerdere maanden)
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
