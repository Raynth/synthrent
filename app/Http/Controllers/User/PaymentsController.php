<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mollie;
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
    * De betaling wordt gedaan met de Mollie API
    */
    public function getPayment()
    {
        try
        {
            if (Session::has('betaling'))
            {
                $payment = Session::get('betaling');
            } else {
                // De haal de gegevens uit de winkelwagen op.
                $oldCart = Session::get('cart');
                $cart = new Cart($oldCart);
                $total = $cart->totalPrice;
                $orderNumber = time();
    
                // Maak de betaling klaar met Mollie.
                $payment = Mollie::api()->payments()->create([
                    "amount"      => $total,
                    "description" => 'Betalingnr. ' . $orderNumber,
                    "redirectUrl" => route('kassa.controleren', $orderNumber),
                    "metadata" => array(
                        "order_id" => $orderNumber
                    )
                ]);
            }
            return redirect($payment->getPaymentUrl())->with('betaling', $payment);
        }
        catch (Mollie_API_Exception $e)
        {
            echo "API call failed: " . htmlspecialchars($e->getMessage());
        }
    }
    
    /*
    * Controleert of de betaling is voldaan.
    */
    public function checkPayment()
    {
        try
        {
            /*
            * Controleer de status van de betaling.
            */
            if (Session::has('betaling'))
            {
                $betaling = Session::get('betaling');
                $betaling_id = $betaling->id;
                $checkBetaling = Mollie::api()->payments()->get($betaling_id);
                if ($checkBetaling->isPaid())
                {
                    return redirect()->route('verhuren.store');
                }
                elseif ($checkBetaling->isOpen())
                {
                    return redirect()->route('winkelwagen.show')->with('warning', 'De betaling staat nog open!');
                }
                elseif ($checkBetaling->isCanceled())
                {
                    return redirect()->route('winkelwagen.show')->with('warning', 'De betaling is geannuleerd!');
                }            
                elseif ($checkBetaling->isExpired())
                {
                    return redirect()->route('winkelwagen.show')->with('warning', 'De betaling is verlopen, mogelijk heeft u de betaling geannuleerd!');
                }
                elseif ($checkBetaling->isFailed())
                {
                    return redirect()->route('winkelwagen.show')->with('warning', 'De betaling is mislukt en kan niet worden voltooid met een andere betaalmethode!');
                }            
            }
            return redirect()->route('winkelwagen.show');
        }
        catch (Mollie_API_Exception $e)
        {
            echo "API call failed: " . htmlspecialchars($e->getMessage());
        }
    }
}
