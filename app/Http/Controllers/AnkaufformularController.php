<?php

namespace App\Http\Controllers;

use Mail;
use Illuminate\Http\Request;
use App\Mail\AnkaufMail;


class AnkaufformularController extends Controller
{
    public function ankaufformular()
    {
        return view('autoankauf');
    }

    public function sendEmail(Request $request)
    {
        $request->validate([
            'marke' => 'required',
            'modell' => 'required',
            'inverkehrssetzung' => 'required',
            'typenschein' => 'required',
            'kmstand' => 'required',
            'farbe' => 'required',
            'preisvorstellung' => 'required',
            'getriebe' => 'required',
            'treibstoff' => 'required',
            'aufbau' => 'required',
            'turen' => 'required',
            'fahrzeugbild1' => 'required',
            'fahrzeugbild2' => 'required',
            'fahrzeugbild3' => 'required',
            'name' => 'required',
            'telefon' => 'required',
            'email' => 'required|email',
        ]);

        $details = [
            'marke' => $request->marke,
            'modell' => $request->modell,
            'inverkehrssetzung' => $request->inverkehrssetzung,
            'typenschein' => $request->typenschein,
            'kmstand' => $request->kmstand,
            'farbe' => $request->farbe,
            'hubraum' => $request->hubraum,
            'preisvorstellung' => $request->preisvorstellung,
            'getriebe' => $request->getriebe,
            'treibstoff' => $request->treibstoff,
            'aufbau' => $request->aufbau,
            'turen' => $request->turen,
            'fahrzeugbild1' => $request->fahrzeugbild1,
            'fahrzeugbild2' => $request->fahrzeugbild2,
            'fahrzeugbild3' => $request->fahrzeugbild3,
            'name' => $request->name,
            'telefon' => $request->telefon,
            'email' => $request->email,
            'firma' => $request->firma,
            'bemerkungen' => $request->bemerkungen,
        ];

        Mail::to('info@autowelt24.ch')->send(new AnkaufMail($details));
        return back()->with('message_form','Your message has been sent successfully!');
    }
}
