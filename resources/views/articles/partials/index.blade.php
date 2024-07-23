<article class="card mb-3">
    <img src="{{$article['image']}}" alt="" class="card-img-top">
    <div class="card-body">
        <span class="text-primary badge"> Auteur:{{$article->user->name}} </span>
        <span class="text-bg-secondary badge">Créé le {{$article->created_at->toDateString()}} </span>
        <h2 class="card-title">
            <a href="/article/{{$article['id']}}">{{$article['title']}}</a>
        </h2>
        <p class="card-text text-truncate">{{$article['body']}}</p>
    </div>
</article>