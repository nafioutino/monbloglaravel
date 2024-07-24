
@extends('layouts.master')

@section('title')
   Articles
@endsection


@section('about')
    <h1>Articles</h1>

  
<p>
    <a href='/articles/create' class="btn btn-primary">Creer un article</a>
</p>

    @forelse($articles as $article)
        @include('articles.partials.index')
   {{-- Liens de pagination --}}

   @empty
   @include('articles.partials.no-articles')
   @endforelse
   <div class="d-flex justify-content-center">
     {{ $articles->links() }} 
    </div>
@endsection

