<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    // Dans OrderController.php
public function store(Request $request)
{
    $cart = session()->get('cart'); // Supposons que le panier est en session
    
    // 1. Créer la commande
    $order = Order::create([
        'user_id' => auth()->id(),
        'reference' => 'CMD-' . strtoupper(Str::random(8)),
        'total_amount' => $request->total,
        'status' => 'en_attente',
    ]);

    // 2. Enregistrer chaque produit de la commande (Table Pivot)
    foreach ($cart as $id => $details) {
        $order->products()->attach($id, [
            'quantity' => $details['quantity'],
            'price' => $details['price'],
            'seller_id' => $details['seller_id'] // IMPORTANT pour le vendeur
        ]);
    }

    session()->forget('cart');
    return redirect()->route('account')->with('success', 'Commande validée !');
}
}
