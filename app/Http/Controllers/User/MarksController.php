<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\admin\Category;
use App\Model\admin\Product;
use App\Model\admin\Mark;
use App\Model\admin\Rental;

class MarksController extends Controller
{
    public function show($slug)
    {
        $selectedMark = Mark::where('slug', $slug)->first();
        $producten = Product::where('product_mark_id', $selectedMark->id)->where('online', 1)->paginate(12);
        $marks = Mark::orderBy('naam')->get();
        $categories = Category::orderBy('naam')->get();
        $top5 = Rental::top5();
        
        return view('mark', compact('producten', 'selectedMark', 'marks', 'categories', 'top5'));
    }
}
