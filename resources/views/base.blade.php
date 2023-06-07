<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('js/script.js') }}?v=1.5"></script>
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
                        <a href="{{ route('property.index') }}" @class(['nav-link', 'active' => str_contains($route, 'property.')])>Voir les biens</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


@yield('content')
    
<script type="text/javascript" src="{{ asset('js/script.js') }}?v=1.5"></script>
</body>
</html>