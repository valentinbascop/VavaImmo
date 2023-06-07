@extends('base')

@section('title', "Tout les biens")

@section('content')

    <div class="search-property">
        <form action="" method="get" class="search-property-form">
            <input type="number" placeholder="Surface minimale" class="form-control" name="surface" value="{{ $input['surface'] ?? '' }}">
            <input type="number" placeholder="Nombre de pièce mini" class="form-control" name="rooms" value="{{ $input['rooms'] ?? '' }}">
            <input type="number" placeholder="Budget max" class="form-control" name="price" value="{{ $input['price'] ?? '' }}">
            <input type="text" placeholder="Mot clé" class="form-control" name="title" value="{{ $input['title'] ?? '' }}">
            <button class="btn-search">
                <i class="fa-solid fa-magnifying-glass" style="color: #12264a; font-size: 16px; padding: 10px;"></i>
            </button>
        </form>
    </div>

    <div class="container container-list-property">
        <div class="row">
            @forelse($properties as $property)
            <div class="list-element">
                @include('property.card')
            </div>
            @empty
            <div class="list-property-error">
                Aucun résultat ne correspond a votre recherche.
            </div>
            @endforelse
        </div>
    </div>

    <div class="paginate-property">
        {{ $properties->links() }}
    </div>

@endsection