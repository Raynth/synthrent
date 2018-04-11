<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Model\admin\User;
use App\Model\admin\Rental;

class UsersController extends Controller
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
        $users = User::get();

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create', compact('categories'));
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
            'forename' => 'required',
            'lastname' => 'required',
            'street' => 'required',
            'number' => 'required',
            'zipcode' => 'required',
            'city' => 'required',
            'account_number' => 'required',
            'identification' => 'required'
        ]);

        // Creeer user
        $user = new User;
        $user->forename = $request->input('forename');
        $user->lastname = $request->input('lastname');
        $user->street = $request->input('street');
        $user->number = $request->input('number');
        $user->zipcode = $request->input('zipcode');
        $user->city = $request->input('city');
        $user->phone = $request->input('phone');
        $user->email = $request->input('email');
        $user->account_number = $request->input('account_number');
        $user->identification = $request->input('identification');
        $user->discount = $request->input('discount');
        $user->comment = $request->input('comment');
        $user->save();

        return redirect('/users')->with('success', 'Gebruiker toegevoegd');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        $rentals = Rental::where('user_id', $id)->get();

        return view('admin.users.show', compact('user', 'rentals'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);

        return view('admin.users.edit', compact('user', 'categories')); 
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
           'forename' => 'required',
            'lastname' => 'required',
            'street' => 'required',
            'number' => 'required',
            'zipcode' => 'required',
            'city' => 'required',
            'account_number' => 'required',
            'identification' => 'required'
        ]);
        
        // Update User
        $user = User::find($id);
        $user->forename = $request->input('forename');
        $user->lastname = $request->input('lastname');
        $user->street = $request->input('street');
        $user->number = $request->input('number');
        $user->zipcode = $request->input('zipcode');
        $user->city = $request->input('city');
        $user->phone = $request->input('phone');
        $user->email = $request->input('email');
        $user->account_number = $request->input('account_number');
        $user->identification = $request->input('identification');
        $user->discount = $request->input('discount');
        $user->comment = $request->input('comment');
        $user->save();

        return redirect('/users')->with('success', 'Gebruiker bijgewerkt');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect('/users')->with('success', 'Gebruiker verwijderd');
    }
}
