<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\admin\Category;
use App\Model\admin\Product;
use App\Model\admin\ProductMark;
use App\Model\admin\Rental;

class CategoriesController extends Controller
{
    /*
    * Laat alle producten van de geselecteerde categorie zien
    */
    public function show($slug)
    {
        $selectedCategory = Category::where('slug', $slug)->first();
        $producten = Product::where('category_id', $selectedCategory->id)->where('online', 1)->paginate(12);
        $productMarks = ProductMark::orderBy('naam')->get();
        $categories = Category::orderBy('naam')->get();
        $top5 = Rental::top5();
        
        return view('category', compact('producten', 'selectedCategory', 'productMarks', 'categories', 'top5'));
    }
}
