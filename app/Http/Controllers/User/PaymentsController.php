<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use App\Model\user\Cart;

class PaymentsController extends Controller
{
    /*
    * Deze construct zorgt ervoor dat de Dashboard-pagina alleen benaderd kan worden als men is ingelogd.
    */
    public function __construct()
    {
        $this->middleware('auth:');
    }

    /*
    * 
    */
    public function getPayment()
    {
        // Controleer of er producten in de winkelwagen zitten, zo niet terug naar de winkelwagen.
        if (!Session::has('cart')) {
            return view('shop.shopping-cart');
        }
        // De haal de gegevens uit de winkelwagen op.
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $total = $cart->totalPrice;
        $orderNumber = time();

        // Maak de betaling klaar met Mollie.
        $payment = Mollie::api()->payments()->create([
            "amount"      => $total,
            "description" => "Factuurnummer: " . $orderNumber,
            "redirectUrl" => "{{ route('producten.cart') }}",
        ]);
        
        $payment = Mollie::api()->payments()->get($payment->id);
        
        if ($payment->isPaid())
        {
            echo "Payment received.";
        }
    }

}
