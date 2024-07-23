
@extends('layouts.master')

@section('title')
   Articles
@endsection


@section('about')
    <h1>Articles</h1>
<p>
    <a href='/article/create' class="btn btn-primary">Creer un article</a>
</p>

    @forelse($articles as $article)
        @include('articles.partials.index')
    @empty
        @include('articles.partials.no-articles')
    @endforelse
@endsection

