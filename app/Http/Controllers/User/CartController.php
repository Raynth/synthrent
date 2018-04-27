<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\user\Product;
use App\Model\admin\Category;
use App\Model\admin\ProductMark;
use App\Model\user\Cart;
use Session;
use Mollie;

class CartController extends Controller
{
    /*
    * Voeg een verhuur toe aan de winkelwagen
    */
    public function addToCart(Request $request, $id)
    {
        $this->validate($request, [
            'begindatum' => 'required',
            'einddatum' => 'required'
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
                        $message = $product->product_mark->naam.' '.$product->naam.' met de gekozen periode van '.date("d-m-Y", strtotime($begindatum)).' tot '.date("d-m-Y", strtotime($einddatum)).' overlapt met de periode in uw winkelwagen!';
                        return redirect()->route('winkelwagen.show')->with('itemInWinkelwagen', $message);
                    }
                }
            }
        }

        // Controle of het gekozen product in de database al is verhuurd in de gekozen periode
        $productRented = Product::isProductRented($id, $begindatum, $einddatum);
        if ($productRented->count() > 0)
        {
            $product = Product::find($id);
            $message = $product->product_mark->naam.' '.$product->naam.' is in de gekozen periode van '.date("d-m-Y", strtotime($begindatum)).' tot '.date("d-m-Y", strtotime($einddatum)).' verhuurd. Zie bovenstaande gegevens.';
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

    public function cart()
    {
        if (!Session::has('cart')) {
            return view('shop.shopping-cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $categories = Category::orderBy('naam')->get();

        return view('shop.shopping-cart', [
            'items' => $cart->items,
            'totalPrice' => $cart->totalPrice,
            'categories' => $categories
            ]);
    }
}
