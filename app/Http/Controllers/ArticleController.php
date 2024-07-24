<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Requests\StoreArticleRequest;


class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     * ici on affiche toutes les ressources(articles)
     */
    public function index(){  

        // $articles = Article::orderByDesc('created_at', 'desc')->get(); 
        $articles = Article::latest()->paginate(2); 

    
        return view('layouts.articles', ['articles'=>$articles]);
    }

    /**
     * Show the form for creating a new resource.
     * Afficher le formulaire de création d'un article
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     * Stock la ressource (l'article) dans la BDD
     */
    public function store(StoreArticleRequest $request)
    {
        // dd($request);
        // recupère les données déjà validées par la sauvegarde s'il y en a 
        $validated = $request->validated();
        $validated['user_id'] = 1;
        
        //Gerer la sauvegarde de l'image s'il y en a
        if ($request->hasFile("image")) {
            $path = $request->file('image')->store('images', 'public');
            $validated['image'] = $path;
        }
        //Envoyer l'article dans la BDD
        Article::create($validated);

        //retourne sur la  page des articles
        return redirect('/articles')->with('success', 'Article créé avec succès !');
    }

    /**
     * Display the specified resource.
     * Afficher une ressource spécifique
     */
    public function show($id)
    {

        // $article = Article::where("id", $id)
        //     ->with('comments')
        //     ->first();

        $article = Article::with('comments.user')->find($id);
        return view('articles.show', ['article'=>$article]);
    }

    /**
     * Show the form for editing the specified resource.
     * Affiche le formulaire d'édition
     */
    public function edit(Article $article)
    {
        return view("articles.edit", ['article' =>$article]);
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
