@extends('layouts.master')

@section('title')
   Créer un article
@endsection

@section('content')
<form method="post" action="/article" enctype="multipart/form-data">
    @csrf

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
    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="Entrez un titre">
</div>
    @error('title')
    <div class="invalid-feedback">{{$message}}</div>
    @enderror
<div class="mb-3 form-group mb-3 ">
    <label for="body" >Corp de l'article</label>
    <textarea style="height:200px"  name ='body'  type="text" class="form-control @error('body') is-invalid @enderror" id="body">{{old('body')}}</textarea>

</div>
   @error('body')
    <div class="invalid-feedback">{{$message}}</div>
    @enderror
<div class="form-group mb-3 ">
    <label for="image"  >Choisir une image pour l'article</label>
    <input type="file"  name="image" class="form-control  @error('title') is-invalid @enderror" id="image">
</div> 
@error('image')
<div class="invalid-feedback">{{$message}}</div>
@enderror
    <button type="submit"  class="btn btn-primary">Créer</button>
   
</form>
@endsection

