<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mail;
use GMaps;

class ContactController extends Controller
{
    public function create()
    {
        // Configuratie voor Google Maps
        $config['center'] = 'Henri Hermanslaan 356, 6162 GP Geleen';
        $config['zoom'] = '15';
        $config['map_width'] = '100%';
        $config['scrollwheel'] = false;
        $config['directions'] = true;
        GMaps::initialize($config);

        // Marker toevoegen
        $marker['position'] = 'Henri Hermanslaan 356, 6162 GP Geleen';
        $marker['infowindow_content'] = 'SynthRENT, Geleen';
        GMaps::add_marker($marker);

        $map = GMaps::create_map();
        
        return view('contact', compact('map'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'naam' => 'required',
            'email' => 'required|email',
            'bericht' => 'required'
        ]);

        Mail::send('emails.bericht', [
            'msg' => $request->bericht
        ], function($mail) use($request) {
            $mail->from($request->email, $request->naam);
            $mail->to('admin@synthrent.nl')->subject('Contact bericht');
        });

        return redirect()->back()->with('flash_bericht', 'Bedankt voor uw bericht.');
    }
}
