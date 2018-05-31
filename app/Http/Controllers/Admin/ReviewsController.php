<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Model\admin\Category;
use App\Model\Review;
use App\Model\admin\Mark;

class ReviewsController extends Controller
{
    // Deze construct zorgt ervoor dat de reviews-pagina alleen benaderd kan worden als men is ingelogd.
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reviews = Review::all();
        
        return view('admin.reviews.index', compact('reviews'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $review = Review::find($id);

        return view('admin.reviews.show', compact('review'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $review = Review::find($id);
        
        return view('admin.reviews.edit', compact('review')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'naam' => 'required|min:2',
            'email' => 'required|email',
            'beoordeling' => 'required',
            'waardering' => 'required'
        ]);
        
        $review = Review::find($id);
        $review->product_id = $request->input('product_id');
        $review->naam = $request->input('naam');
        $review->email = $request->input('email');
        $review->beoordeling = $request->input('beoordeling');
        $review->waardering = $request->input('waardering');
        $review->save();

        return redirect()->route('admin.reviews.index')->with('success', 'Review bijgewerkt');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $review = Review::find($id);
        $review->delete();

        return redirect()->route('admin.reviews.index')->with('success', 'Review verwijderd');
    }
}
