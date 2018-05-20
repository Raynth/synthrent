<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Model\admin\Category;
use App\Model\admin\Product;
use App\Model\admin\Mark;

class ProductsController extends Controller
{
    // Deze construct zorgt ervoor dat de Producten-pagina alleen benaderd kan worden als men is ingelogd.
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
        $producten = Product::all();
        
        return view('admin.producten.index', compact('producten'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::orderBy('naam')->get();
        $marks = Mark::orderBy('naam')->get();

        return view('admin.producten.create', compact('categories', 'marks'));
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
            'category_id' => 'required',
            'merk_id' => 'required',
            'naam' => 'required',
            'huurprijs' => 'required',
            'omschrijving' => 'required'
        ]);

        // Handle File Upload
        if ($request->hasFile('foto')) {
            $filename = $request->foto->getClientOriginalName();
            $request->foto->storeAs('public/cover_images', $filename);
        } else {
            $filename = 'noimage.jpg';
        }

        // Creeer product
        $product = new Product;
        $product->category_id = $request->input('category_id');
        $product->merk_id = $request->input('merk_id');
        $product->naam = $request->input('naam');
        $product->huurprijs = $request->input('huurprijs');
        $product->omschrijving = $request->input('omschrijving');
        $product->details = $request->input('details');
        $product->foto = $filename;
        $product->online = $request->input('online');
        if (null !== $request->input('online')) {
            $product->online = 1;
        } else {
            $product->online = 0;
        };
        $product->save();

        return redirect()->route('admin.producten.index')->with('success', 'Product toegevoegd');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);

        return view('admin.producten.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::orderBy('naam')->get();
        $marks = Mark::orderBy('naam')->get();
        
        return view('admin.producten.edit', compact('product', 'categories', 'marks')); 
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
            'category_id' => 'required',
            'merk_id' => 'required',
            'naam' => 'required',
            'huurprijs' => 'required',
            'omschrijving' => 'required'
        ]);
        
        // Handle File Upload
        if ($request->hasFile('foto')) {
            $filename = $request->foto->getClientOriginalName();
            $request->foto->storeAs('public/cover_images', $filename);
        }

        // Update Post
        $product = Product::find($id);
        $product->category_id = $request->input('category_id');
        $product->merk_id = $request->input('merk_id');
        $product->naam = $request->input('naam');
        $product->huurprijs = $request->input('huurprijs');
        $product->omschrijving = $request->input('omschrijving');
        $product->details = $request->input('details');
        if ($request->hasFile('foto')) {
            $product->foto = $filename;
        }
        $product->online = $request->input('online');
        if (null !== $request->input('online')) {
            $product->online = 1;
        } else {
            $product->online = 0;
        };
        $product->save();

        return redirect()->route('admin.producten.index')->with('success', 'Product bijgewerkt');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);

        if($product->foto != 'noimage.jpg'){
            // Delete Image
            Storage::delete('public/cover_images/'.$product->foto);
        }

        $product->delete();
        return redirect()->route('admin.producten.index')->with('success', 'Product verwijderd');
    }
}
