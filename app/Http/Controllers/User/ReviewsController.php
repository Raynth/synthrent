<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Review;

class ReviewsController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'naam' => 'required|min:2',
            'email' => 'required|email',
            'beoordeling' => 'required',
            'waardering' => 'required'
        ]);
    
        $review = new Review;
        $review->product_id = $request->input('product_id');
        $review->naam = $request->input('naam');
        $review->email = $request->input('email');
        $review->beoordeling = $request->input('beoordeling');
        $review->waardering = $request->input('waardering');
        $review->save();

        return redirect()->route('producten.show', $review->product_id);

    }
}
