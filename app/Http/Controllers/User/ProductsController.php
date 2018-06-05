<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\admin\Category;
use App\Model\admin\Product;
use App\Model\admin\Mark;
use App\Model\admin\Rental;
use App\Model\Review;

class ProductsController extends Controller
{
    /*
     * Laat alle producten tonen gesorteerd op nieuwste eerst
     */
    public function index()
    {
        $producten = Product::where('online', 1)->orderBy('created_at', 'desc')->paginate(12);
        $marks = Mark::orderBy('naam')->get();
        $categories = Category::orderBy('naam')->get();
        $top5 = Rental::top5();
        $sorteer = 1;

        return view('producten', compact('producten', 'marks', 'categories', 'top5', 'sorteer'));
    }

    /*
     * Toont de specificaties van een geselecteerde product
     */
    public function show($id)
    {
        $product = Product::find($id);
        $categories = Category::orderBy('naam')->get();
        $reviews = Review::where('product_id', $id)->paginate(3);
        $reviewsAmount = Review::where('product_id', $id)->count();

        // Controle of het gekozen product al is verhuurd in de gekozen periode
        $productRented = Product::allProductRented($id);

        return view('product', compact('product', 'productRented', 'categories', 'reviews', 'reviewsAmount'));
    }

    /*
     * Laat alle producten tonen gesorteerd op merk en product
     */
    public function showName()
    {
        $producten = Product::select('products.id', 'merk_id', 'marks.naam', 'products.naam', 'huurprijs', 'foto', 'products.created_at')
            ->join('marks', 'marks.id', '=', 'products.merk_id')
            ->orderBy('marks.naam')
            ->orderBy('products.naam')
            ->where('online', 1)
            ->paginate(12);
        $marks = Mark::orderBy('naam')->get();
        $categories = Category::orderBy('naam')->get();
        $top5 = Rental::top5();
        $sorteer = 2;
        
        return view('producten', compact('producten', 'marks', 'categories', 'top5', 'sorteer'));
    }

    /*
     * Zoek functie toont producten aan de hand van ingetypte trefwoord
     */
    public function searchAutocomplete(Request $request)
    {
        $trefwoord = $request->term;
        $resultaat = Product::where('online', 1)->where('naam', 'LIKE', '%'.$trefwoord.'%')->orderBy('naam')->get();
        if (count($resultaat) == 0) {
            $zoekResultaat[] = 'Geen producten gevonden';
        } else {
            foreach ($resultaat as $sleutel => $waarde) {
                $zoekResultaat[$sleutel] = ['value' => $waarde->naam, 'id' =>$waarde->id];
            }
        }
        return $zoekResultaat;
    }

    /*
     * Zoekt alle producten aan de hand van trefwoord, nadat op enter is gedrukt
     */
    public function search(Request $request)
    {
        $marks = Mark::orderBy('naam')->get();
        $categories = Category::orderBy('naam')->get();
        $top5 = Rental::top5();
        $sorteer = 2;
        
        $trefwoord = $request->trefwoord;
        $producten = Product::where('online', 1)->where('naam', 'LIKE', '%'.$trefwoord.'%')->paginate(12);

        return view('zoeken', compact('producten', 'marks', 'categories', 'top5', 'sorteer'));
    }
}
