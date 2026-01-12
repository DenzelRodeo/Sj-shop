<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;



class userAuthController extends Controller
{
    public function register()
    {
        return view('auth.users.register');
    }

    public function login()
    {
        return view('auth.users.login');
    }
    

    public function handleregister(Request $request)
    {

        
        $request->validate([

            
            'name'  => 'required',
            'email' => 'required |unique:users,email',
            'password' => 'required |min:4'
        ],
        [
            'name.required'     => 'Votre nom est requis',
            'email.required'    => 'Adresse email requise',
            'email.unique'      => 'Adresse email est déja prise',
            'password.required' => 'Le mot de passe est requis',
            'password.min'      => 'Le mot de passe doit avoir au moins 4 caractéres'
        ]
        );

        try{

          User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
          ]);

          return redirect('/login')->with('success', 'Votre compte Dark Market a été créer. Connecter vous');

        }catch(Exception $e){
            
        }

    }
    
    public function handleLogin(Request $request)
    {
        $request->validate([
        
            'email' => 'required |exists:users,email',
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

         if (auth()->attempt($request->only('email',
         'password'))){

            return redirect('/');

         }else{

            return redirect()->back()->with('error',
            'information de la connexion non reconnue');
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
