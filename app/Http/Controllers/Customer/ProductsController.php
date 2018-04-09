<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\admin\Product;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::where('online', 1)->paginate(1);
        
        return view('products', compact('products'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);

        return view('product', compact('product'));
    }

    // Controleer of het geselecteerde product voor de gekozen periode beschikbaar is
    public function isProductRented($customer_id, Request $request)
    {
        $dateFrom = $request->input('dateFrom');
        $dateTo = $request->input('dateTo');
        $customer = new Customer();
        $product = new Product();

        $data = [];
        $data['dateFrom'] = $dateFrom;
        $data['dateTo'] = $dateTo;
        $data['products']= $product->isProductRented($dateFrom, $dateTo);
        $data['customer'] = $customer->find($customer_id);

        return view('rooms/checkAvailableRooms', $data);
    }
}
