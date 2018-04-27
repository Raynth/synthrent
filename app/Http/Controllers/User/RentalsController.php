<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Session;
use App\Model\admin\Rental;

class RentalsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:');
    }

    public function store()
    {
        $verhuren = Session::get('cart');
        $klant_id = Auth::id();

        // Elke item in de winkelwagen opslaan in de database
        foreach ($verhuren->items as $item) {
            $verhuur = new Rental;
            $verhuur->klant_id = $klant_id;
            $verhuur->product_id = $item['id'];
            $verhuur->begindatum = $item['begindatum'];
            $verhuur->einddatum = $item['einddatum'];
            $verhuur->dagen = $item['dagen'];
            $verhuur->totale_huurprijs = $item['totale_huurprijs'];
            $verhuur->teruggebracht = 0;
            
            $verhuur->save();
        }
        // Winkelwagen leegmaken
        Session::forget('cart');

        return redirect()->route('winkelwagen.show')->with('success', 'Betaling in goede orde ontvanen!');
    }
}
