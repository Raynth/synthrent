<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Model\admin\Category;
use App\Model\user\User;
use App\Model\admin\Product;
use App\Model\admin\Rental;
use DateTime;
use Carbon\Carbon;

class DashboardController extends Controller
{
    // Deze construct zorgt ervoor dat de Dashboard-pagina alleen benaderd kan worden als men is ingelogd.
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Tel totaal aantal rijen van elke tabel
        $categories = Category::count();
        $customers = User::count();
        $products = Product::count();
        $rentals = Rental::count();
        
        // Overzicht van producten die niet zijn teruggebracht op de einddatum
        $notBringBacks = Rental::where([
            ['bring_back', 0],
            ['date_to', '<', Carbon::now()]
        ])->get();

        return view('admin.dashboard.index', compact('categories', 'customers', 'products', 'rentals', 'notBringBacks'));
    }

    /*
    * Overzicht van de omzet per maand, gedurende de laatste 6 maanden in een grafiek.
    */
    public function chartSales()
    {
        // Query voor omzet per maand voor gebruik Chart.js
        $date = date('Y-m-d H:i:s', strtotime('first day of 5 month ago midnight'));
        $result = DB::table('rentals')
                    ->selectRaw('MONTH(created_at) AS month')
                    ->selectRaw('YEAR(created_at) AS year')
                    ->selectRaw('SUM(total_rent_money) AS sum')
                    ->groupBy('month')
                    ->orderBy('year', 'asc')
                    ->orderBy('month', 'asc')
                    ->whereDate('created_at', '>=', $date)
                    ->get();
        
        return response()->json($result);
    }
}