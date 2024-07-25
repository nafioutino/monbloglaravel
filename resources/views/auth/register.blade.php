@extends('layouts.auth')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <h3 class="text-center">Creer son compte</h3>
        <form action="{{route('register')}}" method="post">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nom</label>
                <input type="text" 
                name="name"
                class="form-control @error('name')
                is-invalid @enderror"
                id="name"
                value="{{old('name')}}"
                required>    
            </div>
            @error('name')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" 
                name="email"
                class="form-control @error('email')
                is-invalid @enderror"
                id="email"
                value="{{old('email')}}"
                required>      
                @error('email')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" 
                name="password"
                class="form-control @error('password')
                is-invalid @enderror"
                id="password"
                value="{{old('password')}}"
                required>

                
                @error('password')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirm password</label>
                <input type="password" 
                class="form-control @error('password_confirmation') is-invalid @enderror" 
                name="password_confirmation"
                id="password_confirmation"
                value="{{old('password_confirmation')}}"
                required>
                @error('password_confirmation')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary w-100">Créer le compte</button>
        </form>
        <p class="mt-3">
            Vous avez déjà un compte ?
            <a href="{{route('login')}}">Connectez-vous à votre compte</a>
        </p>

    </div>
</div>
@endsection
