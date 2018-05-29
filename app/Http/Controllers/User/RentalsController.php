<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Session;
use App\Model\admin\Rental;
use App\Mail\Bestelling;
use Mail;

class RentalsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:');
    }

    /*
    * De inhoud van de winkelwagen opslaan in de database,
    * een bevestigingsmail naar de klant sturen en de
    * winkelwagen leegmaken.
    */
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
            $kortingPerc = Auth::user()->korting;
            $verhuur->korting = round($verhuur->totale_huurprijs * $kortingPerc / 100, 2);
            $verhuur->te_betalen = $verhuur->totale_huurprijs - $verhuur->korting;
            $verhuur->teruggebracht = 0;

            $verhuur->save();
        }

        // Bevestigingsemail naar de klant sturen
        $klant = Auth::user();
        $verhuren->klant = $klant;
        Mail::to($klant)->send(new Bestelling($verhuren));

        // Winkelwagen uit de sessie verwijderen
        Session::forget('cart');

        // Huidige betaling uit de sessie verwijderen
        Session::forget('betaling');

        return redirect()->route('winkelwagen.show')->with('success', 'Betaling in goede orde ontvanen!');
    }
}
