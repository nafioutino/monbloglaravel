
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title','Mon Blog Laravel')</title>
</head>
<body>
<h1>Mon blog Laravel</h1>
    <nav>
        <ul>
            <li><a href="/contact-us">Contacez-nous</a></li>
            <li><a href="/about">A propos</a></li>
            <li><a href="/articles">Articles</a></li>
        </ul>
    </nav>
    
    

<!--Contenue de tout les pages ici -->
@yield('content')
@yield('about')

<!--Contenue de tout les pages ici -->

</body>
</html>