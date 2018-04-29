<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mail;

class ContactController extends Controller
{
    public function create()
    {
        return view('contact');
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
