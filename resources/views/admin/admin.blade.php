<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | Administration</title>
    <link href="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/css/tom-select.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/js/tom-select.complete.min.js"></script>
    <script src="https://unpkg.com/htmx.org@1.9.2"></script>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" >
</head>
<body>

    <nav class="navbar">
        <div class="nav-container">
            <!-- <a class="navbar-home" href="/"><img src="{{ asset('images/logo.svg') }}"></a> -->
            <a class="navbar-home" href="/">Agence</a>
            
            @php
            $route = request()->route()->getName();
            @endphp
            <div class="nav-item-container">
                <ul>
                    <li class="nav-item">
                        <a href="{{ route('admin.property.index')}}" @class(['nav-link', 'active' => str_contains($route, 'property.')])>Gérer les biens</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.option.index')}}"  @class(['nav-link', 'active' => str_contains($route, 'option.')])>Gérer les options</a>
                    </li>
                </ul>
            </div>
            <div class="log-out">
                    @auth 
                        <ul class="nav-logout">
                            <li class="nav-item">
                                <form action="{{ route('logout') }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="nav-link">Se déconnecter</button>
                                </form>
                            </li>
                        </ul>
                    @endauth
                </div>
        </div>
    </nav>


    <div class="container">

        @include('shared.flash')


        @yield('content')
    </div>

    <script>
        new TomSelect('select[multiple]', {plugins: {remove_button: {title: "Supprimer" }}})
    </script>
    
</body>
</html>