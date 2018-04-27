<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Model\admin\Category;
use App\Model\admin\Product;

class CategoriesController extends Controller
{
    // Deze construct zorgt ervoor dat de Categorie-pagina alleen benaderd kan worden als men is ingelogd.
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
        $categories = Category::orderBy('naam', 'ASC')->get();
        
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create', compact('categories'));
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
            'naam' => 'required',
        ]);

        // Creeer Category
        $category = new Category;
        $category->naam = $request->input('naam');
        $category->slug = str_slug($category->naam);
        if (null !== $request->input('online')) {
            $category->online = 1;
        } else {
            $category->online = 0;
        };
        $category->save();

        return redirect()->route('categories.index')->with('success', 'Categorie toegevoegd');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::find($id);

        return view('admin.categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);

        return view('admin.categories.edit', compact('category')); 
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
            'naam' => 'required',
        ]);
        
        // Update Category
        $category = Category::find($id);
        $category->naam = $request->input('naam');
        $category->slug = str_slug($category->naam);
        if (null !== $request->input('online')) {
            $category->online = 1;
        } else {
            $category->online = 0;
        };
        $category->save();

        return redirect()->route('categories.index')->with('success', 'Categorie bijgewerkt');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        
        return redirect()->route('categories.index')->with('success', 'Categorie verwijderd');
    }
}
