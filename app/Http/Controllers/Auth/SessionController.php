<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\SessionRequest;
use App\Models\User;



class SessionController extends Controller
{
    public function index(){
        return view('auth.login');
    }


    public function store(){
       
      

    }
    
    public function login(SessionRequest $request)
    {
        $validated = $request->validated();
         //connecter l'utilisateur
         $user= User::where('email',  $validated["email"])->firstOrfail();
         Auth::login($user);

        //rediriger sur la page des articles
        return redirect()->route('articles.index')
        ->with('success', 'Vous êtes connecté !');
    }

   

    public function logout(Request $request)
    {
    Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    return redirect()->route('login')
                    ->with('success', 'Vous êtes déconnecté');
    }


}