<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\admin\Category;
use App\Model\admin\Product;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('naam')->get();        
        $laatsteProducten = Product::orderBy('created_at', 'desc')->take(8)->get();

        return view('home', compact('categories', 'laatsteProducten'));
    }
}
