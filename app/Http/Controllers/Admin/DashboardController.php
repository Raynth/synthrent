<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
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
        // Tel totaal aantal rijen van elke tabel
        $categories = Category::count();
        $customers = Customer::count();
        $products = Product::count();
        $rentals = Rental::count();
        return view('admin.dashboard.index', compact('categories', 'customers', 'products', 'rentals'));
    }

    public function chartSales()
    {
        // Query voor omzet per maand voor gebruik Chart.js
        $result = DB::table('rentals')->select(DB::raw('MONTH(created_at) AS month, SUM(total_rent_money) AS sum'))->groupBy('month')->get();
        return response()-> json($result);
    }
}