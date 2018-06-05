<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Model\admin\Category;
use App\Model\admin\Rental;
use App\Model\user\User;
use Illuminate\Support\Facades\Hash;

class CustomerAccountController extends Controller
{
    // Deze construct zorgt ervoor dat de Dashboard-pagina alleen benaderd kan worden als men is ingelogd.
    public function __construct()
    {
        $this->middleware('auth:');
    }
    
    // Deze methode haalt de gegevens van eerder gehuurde producten van de klant op.
    public function index()
    {
        $rented = Rental::where('klant_id', Auth::id())->get();
        $categories = Category::orderBy('naam')->get();
        
        return view('account.show', compact('rented', 'categories'));
    }

    // Het wijzigen van klant account gegevens
    public function edit()
    {
        $klant = User::find(Auth::id());
        $categories = Category::orderBy('naam')->get();        
        
        return view('account.edit', compact('klant', 'categories'));
    }

    // Het opslaan van de gewijzigde klant account gegevens
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'voornaam' => 'required',
            'achternaam' => 'required',
            'email' => 'required'
        ]);

        $klant = User::find($id);
        $klant->voornaam = $request->input('voornaam');
        $klant->achternaam = $request->input('achternaam');
        $klant->email = $request->input('email');
        $klant->straat = $request->input('straat');
        $klant->huisnummer = $request->input('huisnummer');
        $klant->postcode = $request->input('postcode');
        $klant->woonplaats = $request->input('woonplaats');
        $klant->telefoon = $request->input('telefoon');
        $klant->rekeningnummer = $request->input('rekeningnummer');
        $klant->identificatie = $request->input('identificatie');
        $klant->korting = $request->input('korting');
        $klant->save();

        return redirect()->route('account.index')->with('success', 'Gegevens gewijzigd');
    }

    // Het wijzigen van het wachtwoord van de klant
    public function editPassword()
    {
        $klant = User::find(Auth::id());
        $categories = Category::orderBy('naam')->get();
        
        return view('account.edit-password', compact('klant', 'categories'));
    }

    // Het opslaan van de gewijzigde wachtwoord van de klant
    public function updatePassword(Request $request, $id)
    {
        $this->validate($request, [
            'old_password' => 'required',
            'new_password' => 'required|confirmed'
        ]);
        
        $klant = User::find($id);

        // Controle oud en nieuw wachtwoord
        $old_password = $request->input('old_password');
        $new_password = $request->input('new_password');
        
        if (!Hash::check($old_password, $klant->password)) {
            return redirect()->route('account.edit-password', compact('id'))->with('error', 'Oud wachtwoord is onjuist!');
        }

        if ( $old_password == $new_password) {
            return redirect()->route('account.edit-password', compact('id'))->with('error', 'Oud en nieuw wachtwoord zijn gelijk!');
        }

        $klant->password = Hash::make($new_password);
        $klant->save();

        return redirect()->route('account.index')->with('success', 'Wachtwoord gewijzigd');
    }
}
