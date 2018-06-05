<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Model\admin\User;
use App\Model\admin\Rental;

class UsersController extends Controller
{
    // Deze construct zorgt ervoor dat de Klanten-pagina alleen benaderd kan worden als men is ingelogd.
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
        $klanten = User::get();

        return view('admin.klanten.index', compact('klanten'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.klanten.create', compact('categories'));
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
            'voornaam' => 'required',
            'achternaam' => 'required',
            'straat' => 'required',
            'huisnummer' => 'required',
            'postcode' => 'required',
            'woonplaats' => 'required',
            'rekeningnummer' => 'required',
            'identificatie' => 'required'
        ]);

        // Creeer klant
        $klant = new User;
        $klant->voornaam = $request->input('voornaam');
        $klant->achternaam = $request->input('achternaam');
        $klant->straat = $request->input('straat');
        $klant->huisnummer = $request->input('huisnummer');
        $klant->postcode = $request->input('postcode');
        $klant->woonplaats = $request->input('woonplaats');
        $klant->telefoon = $request->input('telefoon');
        $klant->email = $request->input('email');
        $klant->rekeningnummer = $request->input('rekeningnummer');
        $klant->identificatie = $request->input('identificatie');
        $klant->korting = $request->input('korting');
        $klant->opmerking = $request->input('opmerking');
        $klant->save();

        return redirect()->route('admin.klanten.index')->with('success', 'Klant toegevoegd');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $klant = User::find($id);
        $verhuren = Rental::where('klant_id', $id)->get();

        return view('admin.klanten.show', compact('klant', 'verhuren'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $klant = User::find($id);

        return view('admin.klanten.edit', compact('klant')); 
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
            'voornaam' => 'required',
            'achternaam' => 'required',
            'straat' => 'required',
            'huisnummer' => 'required',
            'postcode' => 'required',
            'woonplaats' => 'required',
            'rekeningnummer' => 'required',
            'identificatie' => 'required'
        ]);
        
        // Update Customer
        $klant = User::find($id);
        $klant->voornaam = $request->input('voornaam');
        $klant->achternaam = $request->input('achternaam');
        $klant->straat = $request->input('straat');
        $klant->huisnummer = $request->input('huisnummer');
        $klant->postcode = $request->input('postcode');
        $klant->woonplaats = $request->input('woonplaats');
        $klant->telefoon = $request->input('telefoon');
        $klant->email = $request->input('email');
        $klant->rekeningnummer = $request->input('rekeningnummer');
        $klant->identificatie = $request->input('identificatie');
        $klant->korting = $request->input('korting');
        $klant->opmerking = $request->input('opmerking');
        $klant->save();

        return redirect()->route('admin.klanten.index')->with('success', 'Klant bijgewerkt');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $klant = User::find($id);
        $klant->delete();

        return redirect()->route('admin.klanten.index')->with('success', 'Klant verwijderd');
    }
}
