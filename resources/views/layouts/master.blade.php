
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<!--Ajout de bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


    <title>@yield('title','Mon Blog Laravel')</title>
</head>
<body>
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <h1><a href="/" class="navbar-brand">Mon blog Laravel</a></h1>
            <ul>
                <li class="nav-item"><a  class="nav-link"></a></li>
            </ul>
        </nav>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/contact-us">Contacez-nous</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/about">A propos</a>
        </li>
       
        <li class="nav-item">
          <a href="/articles" class="nav-link " aria-disabled="true">Articles</a>
        </li>

      @guest
      <li class="nav-item"><a class="nav-link " href="{{ route('register') }}">Créer un compte</a></li>
      <li class="nav-item"><a class="nav-link " href="{{ route('login') }}">Login</a></li>
      @endguest

      @auth
      <li class="nav-item"><a class="nav-link" href="{{ route('profile') }}">Votre profil</a></li>
      @endauth

     
      </ul>
    
    </div>
  </div>
</nav>
    
</header>
    

<main class="container mt-4">
   @if(session('success'))
      <div class="alert alert-success">
          {{session('success')}}
      </div>
    @endif
    <!--Contenue de tout les pages ici -->
    @yield('content')
    @yield('about')
    
    <!--Contenue de tout les pages ici -->
</main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>