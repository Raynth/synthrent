<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Model\admin\Product;
use App\Model\admin\ProductMark;

class ProductMarksController extends Controller
{
    // Deze construct zorgt ervoor dat de Productmerken-pagina alleen benaderd kan worden als men is ingelogd.
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
        $productMarks = ProductMark::all();
        
        return view('admin.productmarks.index', compact('productMarks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.productmarks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'product_mark_name' => 'required',
        ]);

        // Creeer Productmerk
        $productMark = new ProductMark;
        $productMark->product_mark_name = $request->input('product_mark_name');
        $productMark->slug = str_slug($productMark->product_mark_name);
        if (null !== $request->input('online')) {
            $productMark->online = 1;
        } else {
            $productMark->online = 0;
        };
        $productMark->save();

        return redirect()->route('productmarks.index')->with('success', 'Productmerk toegevoegd');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $productMark = ProductMark::find($id);

        return view('admin.productmarks.show', compact('productMark'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $productMark = ProductMark::find($id);

        return view('admin.productmarks.edit', compact('productMark')); 
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
            'product_mark_name' => 'required',
        ]);
        
        // Update Productmerk
        $productMark = ProductMark::find($id);
        $productMark->product_mark_name = $request->input('product_mark_name');
        $productMark->slug = str_slug($productMark->product_mark_name);
        if (null !== $request->input('online')) {
            $productMark->online = 1;
        } else {
            $productMark->online = 0;
        };
        $productMark->save();

        return redirect()->route('productmarks.index')->with('success', 'Productmerk bijgewerkt');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $productMark = ProductMark::find($id);
        $productMark->delete();
        
        return redirect()->route('productmarks.index')->with('success', 'Productmerk verwijderd');
    }
}
