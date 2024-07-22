<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     * ici on affiche toutes les ressources(articles)
     */
    public function index(){  

        $articles = Article::all(); 

    
        return view('layouts.articles', ['articles'=>$articles]);
    }

    /**
     * Show the form for creating a new resource.
     * Afficher le formulaire de création d'un article
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     * Stock la ressource (l'article) dans la BDD
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     * Afficher une ressource spécifique
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * Affiche le formulaire d'édition
     */
    public function edit(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     * Mettre à jour une ressource(article) dans la BDD
     */
    public function update(Request $request, Article $article)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * Supprimer une ressource(article) spécifique
     */
    public function destroy(Article $article)
    {
        //
    }
}
