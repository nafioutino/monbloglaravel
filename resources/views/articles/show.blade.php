@extends('layouts.master')

@section('content')
    <article class="card mb-3 mb-5" >
        <img src="{{$article['image']}}" alt="" class="card-img-top">
        <div class="card-body">

            <span class="text-primary badge"> Auteur:{{$article->user->name}} </span>
            <span class="text-bg-secondary badge">Créé le {{$article->created_at->toDateString()}} </span>

            <h2 class="card-title mb-3 mt-3">
                {{$article->title}}
            </h2>
            <p class="card-text">{{$article->body}}</p>
        </div>
    </article>

    <section class="mb-5">
        <div class="for-floating">
            <h2>
                <label for="comment-input">Commentaires</label>
            </h2>

           <form action="">
           <textarea 
            name="comment" 
            placeholder = "Laisserz votre commentataire ici !"
            class="form-control mb-3" 
            id="comment-input">
            </textarea>
            <button type="submit" class="btn btn-primary">Envoyer</button>
           </form>

           <div class="mt-5">
            @forelse($article->comments as $comment)
                <div class="mb-3">
                    <span class="text-primary badge">{{$comment->user->name}} </span>
                    <span class="text-bg-secondary badge"> {{$comment->created_at->diffForHumans()}} </span>
                    <small>{{$comment->comment}}</small>
                </div>
            @empty
                <p>Aucun commentaire trouvé</p>
            @endforelse


           </div>
        </div>

    </section>
@endsection


