<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\admin\Product;
use App\Model\admin\Category;
use App\Model\admin\Mark;
use App\Model\user\Cart;
use Session;
use Mollie;
use Auth;

class CartController extends Controller
{
    /*
    * Voeg een verhuur toe aan de winkelwagen
    */
    public function addToCart(Request $request, $id)
    {
        $this->validate($request, [
            'begindatum' => 'required|date',
            'einddatum' => 'required|date|after:begindatum'
        ]);

        $begindatum = $request->input('begindatum');
        $einddatum = $request->input('einddatum');
        
        // Controle of het gekozen product in de winkelwagen al is verhuurd in de gekozen periode
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        if (isset($oldCart)) {
            foreach ($oldCart->items as $item) {
                if ($id == $item['id']) {
                    if (!($item['einddatum'] < $begindatum || $item['begindatum'] > $einddatum)) {
                        $product = Product::find($id);
                        $message = $product->merk->naam.' '.$product->naam.' met de gekozen periode van '.date("d-m-Y", strtotime($begindatum)).' tot '.date("d-m-Y", strtotime($einddatum)).' overlapt met de periode in uw winkelwagen!';
                        return redirect()->route('winkelwagen.show')->with('itemInWinkelwagen', $message);
                    }
                }
            }
        }

        // Controle of het gekozen product in de database al is verhuurd in de gekozen periode
        $productRented = Product::isProductRentedStore($id, $begindatum, $einddatum);
        if ($productRented->count() > 0)
        {
            $product = Product::find($id);
            $message = $product->merk->naam.' '.$product->naam.' is in de gekozen periode van '.date("d-m-Y", strtotime($begindatum)).' tot '.date("d-m-Y", strtotime($einddatum)).' verhuurd. Zie bovenstaande gegevens.';
            return redirect()->route('producten.show', $id)->with('productRented', $message);
        }

        $product = Product::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id, $begindatum, $einddatum);
        $request->session()->put('cart', $cart);
        return redirect()->route('winkelwagen.show');
    }

    public function removeItem($id)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);

        if ($cart->aantalItems > 0) {
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }
        
        return redirect()->route('winkelwagen.show');
        
    }

    public function show()
    {
        $categories = Category::orderBy('naam')->get();
        if (!Session::has('cart')) {
            return view('shop.shopping-cart', compact('categories'));
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $items = $cart->items;
        $subTotaal = $cart->subTotaal;
        $kortingPerc = 0;
        if (Auth::check()) {
            $kortingPerc = Auth::user()->korting;
        }
        $korting = round($subTotaal * $kortingPerc / 100, 2);
        $teBetalen = $subTotaal - $korting;        
        return view('shop.shopping-cart', compact('categories', 'korting', 'kortingPerc', 'items', 'teBetalen', 'subTotaal'));
    }
}
