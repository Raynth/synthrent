<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\admin\Role;
use Auth;

class RolesController extends Controller
{
    // Deze construct zorgt ervoor dat de Rollen-pagina alleen benaderd kan worden als men is ingelogd.
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
        $rollen = Role::all();
        return view('admin.rollen.index', compact('rollen'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.rollen.create');
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
            'naam' => 'required'
        ]);

        $rol = new Role;
        $rol->naam = $request->input('naam');
        $rol->admin = ($request->input('admin') == 'on') ? 1 : 0;
        $rol->bekijken = ($request->input('bekijken') == 'on') ? 1 : 0;
        $rol->toevoegen = ($request->input('toevoegen') == 'on') ? 1 : 0;
        $rol->wijzigen = ($request->input('wijzigen') == 'on') ? 1 : 0;
        $rol->verwijderen = ($request->input('verwijderen') == 'on') ? 1 : 0;
        $rol->save();

        return redirect()->route('admin.rollen.index')->with('success', 'Rol toegevoegd');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rol = Role::find($id);

        return view('admin.rollen.show', compact('rol'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rol = Role::find($id);

        return view('admin.rollen.edit', compact('rol')); 
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
        
        // Update Role
        $rol = Role::find($id);
        $rol->naam = $request->input('naam');
        $rol->admin = ($request->input('admin') == 'on') ? 1 : 0;
        $rol->bekijken = ($request->input('bekijken') == 'on') ? 1 : 0;
        $rol->toevoegen = ($request->input('toevoegen') == 'on') ? 1 : 0;
        $rol->wijzigen = ($request->input('wijzigen') == 'on') ? 1 : 0;
        $rol->verwijderen = ($request->input('verwijderen') == 'on') ? 1 : 0;
        $rol->save();

        return redirect()->route('admin.rollen.index')->with('success', 'Rol bijgewerkt');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rol = Role::find($id);
        $rol->delete();
        
        return redirect()->route('admin.rollen.index')->with('success', 'Rol verwijderd');
    }
}
