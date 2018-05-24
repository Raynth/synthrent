<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\admin\Category;
use App\Model\admin\Mark;
use App\Model\admin\Rental;

class AboutUsController extends Controller
{
    public function index()
    {
        $marks = Mark::orderBy('naam')->get();
        $categories = Category::orderBy('naam')->get();
        $top5 = Rental::top5();
        
        return view('over_ons', compact('marks', 'categories', 'top5'));
    }
}
