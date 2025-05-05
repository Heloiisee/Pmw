<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;

class ContactController extends Controller
{
    public function show()
    {
        return view('contact');
    }

    public function send(Request $request){
        $request->validate([
            'nom' => 'required|string|max:255',
            'email' => 'required|email:rfc,dns|max:255',
            'message' => 'required|string|max:5000',
        ]);

        Mail::raw("Message de : {$request->nom} ({$request->email})\n\n{$request->message}", function ($mail) use ($request) {
            $mail->to('melissaguicheronml@mailo.com')
                ->subject('Nouveau message de ton portfolio');
        });

        return back()->with('success', 'Message envoyé avec succès !');




    }

    // Fonction pour verifier si l'email est valide
    public function isValidEmail($email)
    {
        // Utilisation de filter_var pour valider l'email
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }
}
