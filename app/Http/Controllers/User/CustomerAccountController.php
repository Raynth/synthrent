<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Model\admin\Rental;
use App\Model\user\User;

class CustomerAccountController extends Controller
{
    // Deze construct zorgt ervoor dat de Dashboard-pagina alleen benaderd kan worden als men is ingelogd.
    public function __construct()
    {
        $this->middleware('auth:');
    }
    
    // Deze methode haalt de gegevens van eerder gehuurde producten van de klant op.
    public function index()
    {
        $rented = Rental::where('customer_id', Auth::id())->get();
        
        return view('account.show', compact('rented'));
    }

    // Het wijzigen van klant account gegevens
    public function edit()
    {
        $customer = User::find(Auth::id());
        
        return view('account.edit', compact('customer'));
    }
}
