<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | Administration</title>
    <link href="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/css/tom-select.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/js/tom-select.complete.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://unpkg.com/htmx.org@1.9.2"></script>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" >
</head>
<body>

    <nav class="navbar navbar-admin">
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

<!-- Menu mobile -->
<div class="mobile-menu">
    <button class="mobile-menu-toggle"><i class="burger-menu"></i></button>
    <ul class="mobile-menu-items">
        <li class="mobile-menu-item">
            <a href="{{ route('admin.property.index')}}" class="mobile-menu-link @if(str_contains($route, 'property.')) active @endif">Gérer les biens</a>
        </li>
        <li class="mobile-menu-item">
            <a href="{{ route('admin.option.index')}}" class="mobile-menu-link @if(str_contains($route, 'option.')) active @endif">Gérer les options</a>
        </li>
        @auth
        <li class="mobile-menu-item">
            <form action="{{ route('logout') }}" method="post">
                @csrf
                @method('delete')
                <button class="mobile-menu-link form-log-out">Se déconnecter</button>
            </form>
        </li>
        @endauth
    </ul>
</div>



    <div class="container">

        @include('shared.flash')


        @yield('content')
    </div>

    <script> 
        if (typeof TomSelect === 'function') {
        new TomSelect('select[multiple]', {plugins: {remove_button: {title: "Supprimer" }}});
        }
    </script>
    <script src="{{ asset('js/script.js') }}"></script>
    
</body>
</html>