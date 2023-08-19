<?php

namespace App\Http\Controllers;


use Mail;
use App\Mail\ContactMail;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function kontakt()
    {
        return view('kontakt');
    }

    public function sendEmail(Request $request)
    {
        $request->validate([
            'name'=> 'required',
            'telefon'=> 'required',
            'email'=> 'required|email',
            'betreff'=> 'required',

        ]);

        $details = [
            'name' => $request->name,
            'telefon' => $request->telefon,
            'email' => $request->email,
            'betreff' => $request->betreff,
            'nachricht' => $request->nachricht,
        ];

        Mail::to('info@autowelt24.ch')->send(new ContactMail($details));
        return back()->with('message_sent','Your message has been sent successfully!');
    }
}
