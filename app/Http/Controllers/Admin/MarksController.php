<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Model\admin\Product;
use App\Model\admin\Mark;

class MarksController extends Controller
{
    // Deze construct zorgt ervoor dat de Merken-pagina alleen benaderd kan worden als men is ingelogd.
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
        $marks = Mark::all();
        
        return view('admin.merken.index', compact('marks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.merken.create');
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

        // Creeer Merk
        $mark = new Mark;
        $mark->naam = $request->input('naam');
        $mark->slug = str_slug($mark->naam);
        $mark->save();

        return redirect()->route('admin.merken.index')->with('success', 'Merk toegevoegd');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mark = Mark::find($id);

        return view('admin.merken.show', compact('mark'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mark = Mark::find($id);

        return view('admin.merken.edit', compact('mark')); 
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
        
        // Update Merk
        $mark = Mark::find($id);
        $mark->naam = $request->input('naam');
        $mark->slug = str_slug($mark->naam);
        $mark->save();

        return redirect()->route('admin.merken.index')->with('success', 'Merk bijgewerkt');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mark = Mark::find($id);
        $mark->delete();
        
        return redirect()->route('admin.merken.index')->with('success', 'Merk verwijderd');
    }
}
