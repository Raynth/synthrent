<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Model\admin\Admin;
use App\Model\admin\Role;

class AdminsController extends Controller
{
    // Deze construct zorgt ervoor dat de Gebruikers-pagina alleen benaderd kan worden als men is ingelogd.
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
        $admins = Admin::get();

        return view('admin.admins.index', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();

        return view('admin.admins.create', compact('roles'));
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
            'email' => 'required|email',
            'role_id' => 'required'
        ]);

        // Creeer admin
        $admin = new Admin;
        $admin->naam = $request->input('naam');
        $admin->email = $request->input('email');
        $admin->telefoon = $request->input('telefoon');
        $admin->role_id = $request->input('role_id');
        $admin->save();

        return redirect()->route('admin.admins.index')->with('success', 'Gebruiker toegevoegd');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $admin = Admin::find($id);

        return view('admin.admins.show', compact('admin'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admin = Admin::find($id);
        $roles = Role::all();

        return view('admin.admins.edit', compact('admin', 'roles')); 
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
            'email' => 'required|email',
            'role_id' => 'required'
        ]);
        
        // Update admin
        $admin = Admin::find($id);
        $admin->naam = $request->input('naam');
        $admin->email = $request->input('email');
        $admin->telefoon = $request->input('telefoon');
        $admin->role_id = $request->input('role_id');
        $admin->save();

        return redirect()->route('admin.admins.index')->with('success', 'Gebruiker bijgewerkt');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $admin = Admin::find($id);
        $admin->delete();

        return redirect()->route('admin.admins.index')->with('success', 'Gebruiker verwijderd');
    }
}
