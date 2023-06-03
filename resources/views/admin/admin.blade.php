<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | Administration</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" >
</head>
<body>

    <nav class="navbar">
        <div class="nav-container">
            <a class="navbar-home" href="/admin/property"><img src="https://placehold.co/200x50"></a>
            
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
        </div>
    </nav>


    <div class="container">
        @yield('content')
    </div>
    
</body>
</html>