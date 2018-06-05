<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\admin\Category;
use App\Model\admin\Product;
use App\Model\admin\Mark;
use App\Model\admin\Rental;

class CategoriesController extends Controller
{
    /*
     * Laat alle producten tonen gesorteerd op nieuwste eerst
     */
    public function index($slug)
    {
        $selectedCategory = Category::where('slug', $slug)->first();
        $producten = Product::where('category_id', $selectedCategory->id)->where('online', 1)->orderBy('created_at', 'desc')->paginate(12);
        $marks = Mark::orderBy('naam')->get();
        $categories = Category::orderBy('naam')->get();
        $top5 = Rental::top5();

        return view('category', compact('producten', 'selectedCategory', 'marks', 'categories', 'top5'));
    }
}
