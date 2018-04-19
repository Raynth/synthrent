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
        
        return view('account.show', compact('rented'));
    }

    // Het wijzigen van klant account gegevens
    public function edit()
    {
        $customer = User::find(Auth::id());
        
        return view('account.edit', compact('customer'));
    }

    //
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'forename' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        $customer = User::find($id);
        $customer->forename = $request->input('forename');
        $customer->lastname = $request->input('lastname');
        $customer->email = $request->input('email');
        $customer->password = Hash::make($request->input('password'));
        $customer->street = $request->input('street');
        $customer->number = $request->input('number');
        $customer->zipcode = $request->input('zipcode');
        $customer->city = $request->input('city');
        $customer->phone = $request->input('phone');
        $customer->account_number = $request->input('account_number');
        $customer->identification = $request->input('identification');
        $customer->discount = $request->input('discount');
        $customer->save();

        return redirect()->route('account.index')->with('success', 'Gegevens bijgewerkt');
    }
}
