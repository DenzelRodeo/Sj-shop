<?php

namespace App\Http\Controllers;
use illuminate\http\Request;
use App\Models\Product;

class cartController extends Controller{

public function add(Request $request, $id){


    $article = product::findOrFail($id);

    $cart = session()->get('cart', []);

    if(isset($cart[$id])){
        $cart[$id]['quantity']++;
    }
else{
    $cart[$id] = [
        "name" => $article->name ,
        "quantity" => 1 ,
        "price" => $article->price,
        "image" => $article->image
    ];
}
    session()->put('cart' , $cart);
    
    if($request->ajax()) {
        return response()->json([
            'success' => true,
            'message' => 'Produit ajouté !',
            'cartCount' => count($cart)
        ]);
    }
       return redirect()->back()->with('success', 'Panier mis à jour !');
    }


public function index()
{
    // 1. On récupère le contenu du panier
    $cart = session()->get('cart', []);
    $total = 0;

    // 2. On calcule le total
    foreach($cart as $id => $details) {
        $total += $details['price'] * $details['quantity'];
    }

    // 3. On envoie TOUT à la vue en une seule fois
    // Note : Vérifiez si votre vue s'appelle 'cart.index' ou 'cart.checkout'
    return view('cart.index', compact('cart', 'total'));
}

public function checkout()
{
    // On vérifie si le panier n'est pas vide avant de commander
    if(!session('cart') || count(session('cart')) == 0) {
        return redirect()->back()->with('error', 'Votre panier est vide !');
    }

    return view('cart.checkout'); // Vous devrez créer cette vue plus tard
}
public function processOrder(Request $request)
{
    $cart = session()->get('cart');
    if (!$cart) return redirect()->back();

    // 1. On récupère les infos du client
    $nomClient = $request->input('name');
    $ville = $request->input('city');
    $total = 0;

    // 2. On prépare le message texte
    $message = "Bonjour SJ-SHOP ! Nouvelle commande de *{$nomClient}* ({$ville}) :\n\n";

    foreach($cart as $id => $details) {
        $sousTotal = $details['price'] * $details['quantity'];
        $total += $sousTotal;
        $message .= "• {$details['name']} (x{$details['quantity']}) : {$sousTotal} Fcfa\n";
    }

    $message .= "\n*TOTAL : {$total} Fcfa*";

    // 3. On encode le message pour l'URL
    $telephone = "237699174637"; // Mettez votre numéro ici (QUE des chiffres)
   $urlWhatsApp = "https://api.whatsapp.com/send?phone=" . $telephone . "&text=" . rawurlencode($message);
    // Remplacez 2376XXXXXXXX par votre numéro (avec l'indicatif pays sans le +)

    // 4. On vide le panier
    session()->forget('cart');

    // 5. On redirige vers WhatsApp
    return redirect()->away($urlWhatsApp);
 
}
}