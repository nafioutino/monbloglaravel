@extends('layouts.master')

@section('title')
   Créer un article
@endsection

@section('content')
<form method="post" action="{{route('articles.update',$article->id)}}" enctype="multipart/form-data">
    @csrf
    @method("patch")
    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
    @endif
<div class="form-group mb-3">
    <label for="title">Titre de l'article</label>
    <input 
    type="text" 
    class="form-control @error('title') is-invalid @enderror" 
    id="title" value="{{old('title', $article->title)}}" 
    name="title" 
    placeholder="Entrez un titre">
</div>
    @error('title')
    <div class="invalid-feedback">{{$message}}</div>
    @enderror
<div class="mb-3 form-group mb-3 ">
    <label for="body" >Corp de l'article</label>
    <textarea 
        style="height:200px"  
        name ='body'  type="text" 
        class="form-control @error('body') is-invalid @enderror" 
        id="body">{{old('body', $article->body)}}
    </textarea>

</div>
   @error('body')
    <div class="invalid-feedback">{{$message}}</div>
    @enderror
<div class="form-group mb-3 ">
    <label for="image"  >Choisir une image nouvelle pour l'article</label>

    @if($article->image)
        <img 
        src="{{asset( 'storage/'.$article->image )}}" 
        alt="image de l'article"
        class="img-thumbnail mb-3"
        width="200">
    @endif
    <input type="file"  name="image" class="form-control  @error('title') is-invalid @enderror" id="image">
</div> 
@error('image')
<div class="invalid-feedback">{{$message}}</div>
@enderror
    <button type="submit"  class="btn btn-primary">Modifier</button>
   
</form>
@endsection

