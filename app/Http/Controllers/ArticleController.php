<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use Illuminate\Support\Facades\Storage;


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
        $validated['user_id'] = Auth()->id();
       
        
        //Gerer la sauvegarde de l'image s'il y en a
        if ($request->hasFile("image")) {
            $path = $request->file('image')->store('images', 'public');
            $validated['image'] = $path;
        }
        //Envoyer l'article dans la BDD
        Article::create($validated);

        //retourne sur la  page des articles
        return redirect()->route('articles.index')->with('success', 'Article créé avec succès !');
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
    public function update(UpdateArticleRequest $request, Article $article)
    {
        //Mes données validées sont déjà disponibles via UpdateArticleRequest
        $validated = $request->validated();

            // Gestion de l'image
            if ($request->hasFile('image')) { //Si on a une image
                // Supprimer l'ancienne image si elle exist
                if ($article->image) {
                    Storage::disk('public')->delete($article->image);
                    $path = $request->file('image')->store('images', 'public');
                    $validated['image']=$path;
                }
                // Stocker la nouvelle image

            }else{
                //Garde l'image existante si aucune image n'est téléchargé
                $validated['image'] = $article->image;
            }



        

        //Mettre à jour l'article
        $article->update($validated);

        return redirect()->route('articles.show', $article->id)
                        ->with('success', 'Article modifié avec succès !');
    }

    /**
     * Remove the specified resource from storage.
     * Supprimer une ressource(article) spécifique
     */
    public function destroy(Article $article)
    {
        //
        if ($article->image) {
            Storage::disk('public')->delete($article->image);
        }


        //Supprimer l'article de la base de données 
        $article->delete();
        // Rediriger vers la liste des articles
        return redirect()->route('articles.index')
            ->with('success','Article supprimé avec succès!');
        //avec un message de succes
    }
}
