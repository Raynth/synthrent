<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Model\admin\Category;
use App\Model\admin\Product;
use App\Model\admin\ProductMark;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::orderBy('category_name')->get();
        $productMarks = ProductMark::orderBy('product_mark_name')->get();

        return view('admin.products.create', compact('categories', 'productMarks'));
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
            'product_mark_id' => 'required',
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
        $product->product_mark_id = $request->input('product_mark_id');
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

        return redirect()->route('proudcts.index')->with('success', 'Product toegevoegd');
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

        return view('admin.products.show', compact('product'));
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
        $productMarks = ProductMark::orderBy('product_mark_name')->get();
        
        return view('admin.products.edit', compact('product', 'categories', 'productMarks')); 
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
            'product_mark_id' => 'required',
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
        $product->product_mark_id = $request->input('product_mark_id');
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

        return redirect()->route('proudcts.index')->with('success', 'Product bijgewerkt');
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
        return redirect()->route('proudcts.index')->with('success', 'Product verwijderd');
    }

    // Controleer of het geselecteerde product voor de gekozen periode beschikbaar is
    public function isProductRented($customer_id, Request $request)
    {
        $dateFrom = $request->input('dateFrom');
        $dateTo = $request->input('dateTo');
        $customer = new Customer();
        $product = new Product();

        $data = [];
        $data['dateFrom'] = $dateFrom;
        $data['dateTo'] = $dateTo;
        $data['products']= $product->isProductRented($dateFrom, $dateTo);
        $data['customer'] = $customer->find($customer_id);

        return view('rooms/checkAvailableRooms', $data);
    }
}
