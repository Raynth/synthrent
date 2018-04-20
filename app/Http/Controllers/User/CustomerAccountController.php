<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
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
        $rented = Rental::where('customer_id', Auth::id())->get();
        
        return view('account.show', compact('customer', 'rented'));
    }

    // Het wijzigen van klant account gegevens
    public function edit()
    {
        $customer = User::find(Auth::id());
        
        return view('account.edit', compact('customer'));
    }

    // Het opslaan van de gewijzigde klant account gegevens
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'forename' => 'required',
            'lastname' => 'required',
            'email' => 'required'
        ]);

        $customer = User::find($id);
        $customer->forename = $request->input('forename');
        $customer->lastname = $request->input('lastname');
        $customer->email = $request->input('email');
        $customer->street = $request->input('street');
        $customer->number = $request->input('number');
        $customer->zipcode = $request->input('zipcode');
        $customer->city = $request->input('city');
        $customer->phone = $request->input('phone');
        $customer->account_number = $request->input('account_number');
        $customer->identification = $request->input('identification');
        $customer->discount = $request->input('discount');
        $customer->save();

        return redirect()->route('account.index')->with('success', 'Gegevens gewijzigd');
    }

    // Het wijzigen van het wachtwoord van de klant
    public function editPassword()
    {
        $customer = User::find(Auth::id());
        
        return view('account.edit-password', compact('customer'));
    }

    // Het opslaan van de gewijzigde wachtwoord van de klant
    public function updatePassword(Request $request, $id)
    {
        $this->validate($request, [
            'old_password' => 'required',
            'new_password' => 'required',
            'new_password_confirmation' => 'required'
        ]);
        
        $customer = User::find($id);

        // Controle oud en nieuw wachtwoord
        $old_password = $request->input('old_password');
        $new_password = $request->input('new_password');
        $new_password_confirmation = $request->input('new_password_confirmation');
        
        if (!Hash::check($old_password, $customer->password)) {
            dd($old_password, $customer->password);
            // return redirect()->route('account.edit-password', compact('password', 'id'))->with('error', 'Oud wachtwoord is onjuist!');
        }
        if ($old_password == $new_password) {
            return redirect()->route('account.edit-password', compact('password', 'id'))->with('error', 'Oud en nieuw wachtwoord zijn niet verschillend!');            
        }
        if ($new_password != $new_password_confirmation) {
            return redirect()->route('account.edit-password', compact('password', 'id'))->with('error', 'Nieuw wachtwoord is niet juist bevestigd!');            
        }

        $customer->password = Hash::make($new_password);
        $customer->save();

        return redirect()->route('account.index')->with('success', 'Wachtwoord gewijzigd');
    }
}
