<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Vendor;



class vendorAuthController extends Controller
{
    public function login(){
        
        return view('auth.vendors.login');
    }

    public function register(){
        
        return view('auth.vendors.register');
    }

      public function handleregister(Request $request)
    {
        $request->validate([
            'name'  => 'required',
            'email' => 'required |unique:vendors,email',
            'password' => 'required |min:4'
        ],
        [
            'name.required'     => 'Votre nom de vendeur est requis',
            'email.required'    => 'Adresse email requise',
            'email.unique'      => 'Adresse email est déja prise',
            'password.required' => 'Le mot de passe est requis',
            'password.min'      => 'Le mot de passe doit avoir au moins 4 caractéres'
        ]
        );

        try{

          Vendor::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
          ]);

          return redirect('/vendors/accounts/login')->with('success', 'Votre Compte Vendeur Dark Market à été Créer. Connecter-Vous');

        }catch(Exception $e){
            dd($e);
            
        }

    }

    public function handleLogin(Request $request){
        $request->validate([
        
            'email' => 'required |exists:vendors,email',
            'password' => 'required |min:4',
        ],

        [
            
            'email.required'    => 'Adresse email requise',
            'email.exists'      => 'Adresse email non reconnue',
            'password.required' => 'Le mot de passe est requis',
            'password.min'      => 'Le mot de passe doit avoir au moins 4 caractéres'
        ],
      ); 

      try{

         if (auth('vendor')->attempt($request->only('email',
         'password'))){

           return redirect('/vendors/dashboard');

         }else{

            return redirect()->back()->with('error',
            'information de connexion de compte boutique non reconnue');
         }
        }catch(Exception $e){
            
        }
    }

    
    public function handleLogout()
    {
        Auth::logout();

        return redirect('/');
    }
    

   
    
}
