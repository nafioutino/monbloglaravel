
@extends('layouts.master')

@section('title')
   Articles
@endsection


@section('about')
    <h1>Articles</h1>


    @forelse($articles as $article)
        @include('articles.index')
    @empty
        @include('articles.no-articles')
    @endforelse
@endsection

