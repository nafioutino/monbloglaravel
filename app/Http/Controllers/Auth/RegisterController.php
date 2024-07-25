<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegisterRequest;
use App\Models\User;

class RegisterController extends Controller
{
    public function index(){
        return view('auth.register');
    }


    public function store(RegisterRequest $request){
        //on recupère les données déjà validées
        $validated = $request->validated();
        // dd($validated);

        //creer le nouvel utilisateur
        User::create([
            "name"=>$validated['name'],
            "email"=>$validated['email'],
            "password"=>bcrypt($validated['password']),
        ]);



        //connecter l'utilisateur
        $user= User::where('email', $validated["email"])->firstOrfail();
        Auth::login($user);

        //rediriger sur la page des articles
        return redirect()->route('articles.index');

    }


}
