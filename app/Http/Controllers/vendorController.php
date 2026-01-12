<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vendor; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class VendorController extends Controller
{
   
public function updateProfile(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'phone' => 'nullable|string|max:20',
    ]);

    $id = Auth::guard('vendor')->id();

    // On utilise la mise à jour directe
    \App\Models\Vendor::where('id', $id)->update([
        'name' => $request->name,
        'phone' => $request->phone,
    ]);

    return redirect()->back()->with('success', 'Profil mis à jour !');

}

    public function updatePhoto(Request $request)
{
    // 1. Valider que c'est bien une image
    $request->validate([
        'avatar' => 'required|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    $vendor = Auth::guard('vendor')->user();

    if ($request->hasFile('avatar')) {
        // 2. Supprimer l'ancienne photo si elle existe pour ne pas encombrer le serveur
        if ($vendor->avatar && \Storage::disk('public')->exists($vendor->avatar)) {
            \Storage::disk('public')->delete($vendor->avatar);
        }

        // 3. Enregistrer la nouvelle photo dans le dossier "avatars"
        $path = $request->file('avatar')->store('avatars', 'public');

        // 4. Mettre à jour la base de données (Utilisation de l'ID pour la sécurité)
        \App\Models\Vendor::where('id', $vendor->id)->update([
            'avatar' => $path
        ]);

        return redirect()->back()->with('success', 'Photo de profil mise à jour !');
    }
}

public function dashboard()
{
    $user = auth()->user();
    // On récupère uniquement les produits de ce vendeur
    $products = $user->products()->latest()->get();
      // On récupère les lignes de commandes (OrderItems) liées aux produits de ce vendeur
    $sales = \App\Models\OrderItem::where('seller_id', $vendeurId)
                ->with(['order.user', 'product']) // Eager loading pour éviter les erreurs
                ->latest()
                ->get();
    // On calcule quelques statistiques rapides
    $totalProducts = $products->count();
    $totalSales = 0; // À l'avenir, calculez ceci depuis la table order_items
    $vendorId = auth()->id();
    $search = $request->input('search');

    // On commence la requête sur les ventes
    $query = \App\Models\OrderItem::where('seller_id', $vendorId)
                ->with(['order.user', 'product']);

    // Si une recherche est effectuée
    if (!empty($search)) {
        $query->whereHas('order', function($q) use ($search) {
            $q->where('id', 'like', "%{$search}%") // Recherche par ID de commande
              ->orWhereHas('user', function($qu) use ($search) {
                  $qu->where('name', 'like', "%{$search}%"); // Recherche par nom de client
              });
        });
    }

    $sales = $query->latest()->get();

    return view('dashboard', compact('products', 'totalProducts','sales'));
   
}
}