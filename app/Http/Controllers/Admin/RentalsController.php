<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\admin\User;
use App\Model\admin\Product;
use App\Model\admin\Rental;
use DateTime;

class RentalsController extends Controller
{
    // Deze construct zorgt ervoor dat de Verhuren-pagina alleen benaderd kan worden als men is ingelogd.
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
        $verhuren = Rental::all();
        return view('admin.verhuren.index', compact('verhuren'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $klanten = User::all();
        $producten = Product::select('products.id', 'product_mark_id', 'product_marks.naam', 'products.naam', 'huurprijs')
                            ->join('product_marks', 'product_marks.id', '=', 'products.product_mark_id')
                            ->orderBy('product_marks.naam', 'asc')
                            ->orderBy('products.naam', 'asc')
                            ->get();

        return view('admin.verhuren.create', compact('klanten', 'producten'));
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
            'klant_id' => 'required',
            'product_id' => 'required',
            'begindatum' => 'required|date',
            'einddatum' => 'required|date|after:begindatum',
            'dagen' => 'required',
            'totale_huurprijs' => 'required'
        ]);

        $verhuur = new Rental;
        $verhuur->klant_id = $request->input('klant_id');
        $verhuur->product_id = $request->input('product_id');
        $verhuur->begindatum = $request->input('begindatum');
        $verhuur->einddatum = $request->input('einddatum');
        $verhuur->dagen = $request->input('dagen');
        $verhuur->totale_huurprijs = $request->input('totale_huurprijs');
        $verhuur->teruggebracht = 0;
        
        // Controle of het gekozen product al is verhuurd in de gekozen periode
        $productRented = Product::isProductRentedStore($verhuur->product_id, $verhuur->begindatum, $verhuur->einddatum);
        if ($productRented->count() > 0)
        {
            $message = Product::find($verhuur->product_id)->naam.' is al '.$productRented->count().' keer verhuurd.<br>';
            foreach($productRented as $productRent){
                $message .= 'Van '.date("d-m-Y", strtotime($productRent->begindatum)).' tot '.date("d-m-Y", strtotime($productRent->einddatum)).'.<br>';
            }
            return redirect()->route('admin.verhuren.create')->with('productRented', $message);
        }
        $verhuur->save();

        return redirect()->route('admin.verhuren.index')->with('success', 'Verhuur toegevoegd');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $verhuur = Rental::find($id);

        return view('admin.verhuren.show', compact('verhuur'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $verhuur = Rental::find($id);
        $klanten = User::all();
        $producten = Product::select('products.id', 'product_mark_id', 'product_marks.naam', 'products.naam', 'huurprijs')
                            ->join('product_marks', 'product_marks.id', '=', 'products.product_mark_id')
                            ->orderBy('product_marks.naam', 'asc')
                            ->orderBy('products.naam', 'asc')
                            ->get();

        return view('admin.verhuren.edit', compact('verhuur', 'klanten', 'producten')); 
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
            'klant_id' => 'required',
            'product_id' => 'required',
            'begindatum' => 'required|date',
            'einddatum' => 'required|date|after:begindatum',
            'dagen' => 'required',
            'totale_huurprijs' => 'required'
        ]);

        $verhuur = Rental::find($id);
        $verhuur->klant_id = $request->input('klant_id');
        $verhuur->product_id = $request->input('product_id');
        $verhuur->begindatum = $request->input('begindatum');
        $verhuur->einddatum = $request->input('einddatum');
        $verhuur->dagen = $request->input('dagen');
        $verhuur->totale_huurprijs = $request->input('totale_huurprijs');
        if (null !== $request->input('teruggebracht')) {
            $verhuur->teruggebracht = 1;
        } else {
            $verhuur->teruggebracht = 0;
        };

        // Controle of het gekozen product al is verhuurd in de gekozen periode
        $productRented = Product::isProductRentedUpdate($id, $verhuur->product_id, $verhuur->begindatum, $verhuur->einddatum);
        if ($productRented->count() > 0)
        {
            $message = Product::find($verhuur->product_id)->naam.' is al '.$productRented->count().' keer verhuurd.<br>';
            foreach($productRented as $productRent){
                $message .= 'Van '.date("d-m-Y", strtotime($productRent->begindatum)).' tot '.date("d-m-Y", strtotime($productRent->einddatum)).'.<br>';
            }
            return redirect()->route('admin.verhuren.create')->with('productRented', $message);
        }
        $verhuur->save();

        return redirect()->route('admin.verhuren.index')->with('success', 'Verhuur bijgewerkt');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $verhuur = Rental::find($id);
        $verhuur->delete();

        return redirect()->route('admin.verhuren.index')->with('success', 'Verhuur verwijderd');
    }
}
