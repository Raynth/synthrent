<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\admin\Product;
use App\Model\admin\Category;
use App\Model\admin\ProductMark;
use App\Model\admin\Rental;
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
        $producten = Product::where('online', 1)->paginate(12);
        $productMarks = ProductMark::orderBy('naam')->get();
        $categories = Category::orderBy('naam')->get();
        $top5 = Rental::selectRaw('product_id, SUM(dagen) as somdagen')
            ->groupBy('product_id')
            ->orderBy('somdagen', 'DESC')
            ->take(5)->get();
        
        return view('producten', compact('producten', 'productMarks', 'categories', 'top5'));
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
        $categories = Category::orderBy('naam')->get();

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
        $producten = Product::where('product_mark_id', $selectedProductMark->id)->where('online', 1)->paginate(12);
        $productMarks = ProductMark::orderBy('naam')->get();
        $categories = Category::orderBy('naam')->get();
        
        return view('productmark', compact('producten', 'selectedProductMark', 'productMarks', 'categories'));
    }

    /*
    * Laat alle producten van de geselecteerde categorie zien
    */
    public function categoryShow($slug)
    {
        $selectedCategory = Category::where('slug', $slug)->first();
        $producten = Product::where('category_id', $selectedCategory->id)->where('online', 1)->paginate(12);
        $productMarks = ProductMark::orderBy('naam')->get();
        $categories = Category::orderBy('naam')->get();
        
        return view('category', compact('producten', 'selectedCategory', 'productMarks', 'categories'));
    }
}
