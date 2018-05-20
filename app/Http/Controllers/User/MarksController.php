<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\admin\Category;
use App\Model\admin\Product;
use App\Model\admin\ProductMark;
use App\Model\admin\Rental;

class MarksController extends Controller
{
    public function show($slug)
    {
        $selectedProductMark = ProductMark::where('slug', $slug)->first();
        $producten = Product::where('product_mark_id', $selectedProductMark->id)->where('online', 1)->paginate(12);
        $productMarks = ProductMark::orderBy('naam')->get();
        $categories = Category::orderBy('naam')->get();
        $top5 = Rental::top5();
        
        return view('productmark', compact('producten', 'selectedProductMark', 'productMarks', 'categories', 'top5'));
    }
}
