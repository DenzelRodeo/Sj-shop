<?php

namespace App\Http\Controllers;
   use Illuminate\Support\Facades\Storage; 

use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function index() {
    $user = auth()->user();
    // On récupère les commandes de l'utilisateur connecté
    $orders = $user->orders()->latest()->paginate(5); 
    $myOrders = auth()->user()->orders()->latest()->get();
    return view('user.account', compact('user', 'orders'));
      }

   

public function update(Request $request)
{
    $user = auth()->user();

    // 1. Validation des données
    $request->validate([
        'name' => 'required|string|max:255',
        'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Max 2Mo
    ]);

    // 2. Mise à jour du nom
    $user->name = $request->name;

    // 3. Gestion de l'avatar (si une image est téléchargée)
    if ($request->hasFile('avatar')) {
        // Supprimer l'ancien avatar s'il existe pour ne pas encombrer le serveur
        if ($user->avatar) {
            Storage::disk('public')->delete($user->avatar);
        }

        // Stocker la nouvelle image
        $path = $request->file('avatar')->store('avatars', 'public');
        $user->avatar = $path;
    }

    $user->save();

    return back()->with('success', 'Profil mis à jour avec succès !');
}
}
