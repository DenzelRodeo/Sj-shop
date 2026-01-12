<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    // Affiche la page de contact
    public function index()
    {
        return view('contact');
    }

    // Traite l'envoi du formulaire
    public function store(Request $request)
    {
        // 1. Validation des champs
        $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email',
            'subject' => 'nullable|string',
            'message' => 'required|string|min:10',
        ]);
  return redirect('/')->with('success', "Votre message a bien été envoyé à l'équipe Sj-Shop !");
   }
}