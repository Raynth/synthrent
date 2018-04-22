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

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::where('online', 1)->paginate(12);
        $productMarks = ProductMark::orderBy('product_mark_name')->get();
        $categories = Category::orderBy('category_name')->get();
        
        return view('products', compact('products', 'productMarks', 'categories'));
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
        $categories = Category::orderBy('category_name')->get();

        // Controle of het gekozen product al is verhuurd in de gekozen periode
        $productRented = Product::allProductRented($id);

        return view('product', compact('product', 'productRented', 'categories'));
    }

    /*
    * Laat alle producten van de geselecteerde productmerk zien
    */
    public function productMarkShow($slug)
    {
        $selectedProductMark = ProductMark::where('slug', $slug)->first();
        $products = Product::where('product_mark_id', $selectedProductMark->id)->where('online', 1)->paginate(12);
        $productMarks = ProductMark::orderBy('product_mark_name')->get();
        $categories = Category::orderBy('category_name')->get();
        
        return view('productmark', compact('products', 'selectedProductMark', 'productMarks', 'categories'));
    }

    /*
    * Laat alle producten van de geselecteerde categorie zien
    */
    public function categoryShow($slug)
    {
        $selectedCategory = Category::where('slug', $slug)->first();
        $products = Product::where('category_id', $selectedCategory->id)->where('online', 1)->paginate(12);
        $productMarks = ProductMark::orderBy('product_mark_name')->get();
        $categories = Category::orderBy('category_name')->get();
        
        return view('category', compact('products', 'selectedCategory', 'productMarks', 'categories'));
    }

    /*
    * Voeg een verhuur toe aan de winkelwagen
    */
    public function addToCart(Request $request, $id)
    {
        $this->validate($request, [
            'date_from' => 'required',
            'date_to' => 'required'
        ]);

        $dateFrom = $request->input('date_from');
        $dateTo = $request->input('date_to');
        
        // Controle of het gekozen product al is verhuurd in de gekozen periode
        $productRented = Product::isProductRented($id, $dateFrom, $dateTo);
        if ($productRented->count() > 0)
        {
            $message = Product::find($id)->product_name.' is in de gekozen periode van '.date("d-m-Y", strtotime($dateFrom)).' tot '.date("d-m-Y", strtotime($dateTo)).' verhuurd. Zie bovenstaande gegevens.';
            return redirect()->route('producten.show', $id)->with('productRented', $message);
        }

        $product = Product::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id, $dateFrom, $dateTo);
        $request->session()->put('cart', $cart);
        return redirect()->route('producten.cart');
    }

    public function removeItem($id)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);

        if ($cart->totalQuantity > 0) {
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }
        
        return redirect()->route('producten.cart');
        
    }

    public function cart()
    {
        if (!Session::has('cart')) {
            return view('shop.shopping-cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $categories = Category::orderBy('category_name')->get();

        return view('shop.shopping-cart', ['items' => $cart->items, 'totalPrice' => $cart->totalPrice, 'categories' => $categories]);
    }

    public function getCheckout()
    {
        if (!Session::has('cart')) {
            return view('shop.shopping-cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $total = $cart->totalPrice;
        return view('shop.checkout', ['total' => $total]);
    }
}
