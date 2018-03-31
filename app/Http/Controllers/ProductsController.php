<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Category;
use App\Product;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('created_at', 'ASC')->get();
        // return $products;
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::orderBy('category_name')->get();

        return view('products.create', compact('categories'));
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
            'product_name' => 'required',
            'rent_money' => 'required',
            'description' => 'required',
            'cover_image' => 'image|nullable|max:1999'
        ]);

        // Handle File Upload
        if ($request->hasFile('cover_image')) {
            $filename = $request->cover_image->getClientOriginalName();
            $request->cover_image->storeAs('public/cover_images', $filename);
        } else {
            $filename = 'noimage.jpg';
        }

        // Creeer product
        $product = new Product;
        $product->category_id = $request->input('category_id');
        $product->product_name = $request->input('product_name');
        $product->rent_money = $request->input('rent_money');
        $product->description = $request->input('description');
        $product->cover_image = $filename;
        $product->online = $request->input('online');
        if (null !== $request->input('online')) {
            $product->online = 1;
        } else {
            $product->online = 0;
        };
        $product->save();

        return redirect('/products')->with('success', 'Product toegevoegd');
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

        return view('products.show', compact('product'));
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
        $categories = Category::orderBy('category_name')->get();

        return view('products.edit', compact('product', 'categories')); 
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
            'product_name' => 'required',
            'rent_money' => 'required',
            'description' => 'required',
            'cover_image' => 'image|nullable|max:1999'
        ]);
        
        // Handle File Upload
        if ($request->hasFile('cover_image')) {
            $filename = $request->cover_image->getClientOriginalName();
            $request->cover_image->storeAs('public/cover_images', $filename);
        }

        // Update Post
        $product = Product::find($id);
        $product->category_id = $request->input('category_id');
        $product->product_name = $request->input('product_name');
        $product->rent_money = $request->input('rent_money');
        $product->description = $request->input('description');
        if ($request->hasFile('cover_image')) {
            $product->cover_image = $filename;
        }
        $product->online = $request->input('online');
        if (null !== $request->input('online')) {
            $product->online = 1;
        } else {
            $product->online = 0;
        };
        $product->save();

        return redirect('/products')->with('success', 'Product bijgewerkt');
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

        if($product->cover_image != 'noimage.jpg'){
            // Delete Image
            Storage::delete('public/cover_images/'.$product->cover_image);
        }

        $product->delete();
        return redirect('/products')->with('success', 'Product verwijderd');
    }
}
