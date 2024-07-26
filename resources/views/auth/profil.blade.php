@extends('layouts.auth')


@section('content')
<div class="container">
    <h2>{{Auth::user()->name}}</h2>
    <li class="nav-item btn btn-primary"><a class="nav-link" href="{{route('logout')}}">Se déconnecter</a></li>
</div>
@endsection