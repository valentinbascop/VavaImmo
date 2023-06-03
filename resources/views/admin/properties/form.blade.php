@extends('admin.properties.admin')

@section('title', $property->exists ? "Editer un bien" : "Enregistrer un bien")

@section('content')

    <h1>@yield('title')</h1>

    <form action="{{ route($property->exists ? 'admin.property.update' : 'admin.property.store', ['property' => $property]) }}" method="POST">
        @csrf
        @method($property->exists ? 'put' : 'post')

        <div class="form-row">
            @include('shared.input', ['label' => 'Titre', 'name' => 'title', 'value' => $property->title])
            @include('shared.input', ['class' => 'truc', 'name' => 'surface', 'value' => $property->surface])
            @include('shared.input', ['class' => 'truc', 'label' => 'Prix', 'name' => 'price', 'value' => $property->price])
            @include('shared.input', ['type' => 'textarea', 'class' => 'truc', 'name' => 'description', 'value' => $property->description])
            @include('shared.input', ['class' => 'truc', 'label' => 'Pièces', 'name' => 'rooms', 'value' => $property->rooms])
            @include('shared.input', ['class' => 'truc', 'label' => 'Chambres', 'name' => 'bedrooms', 'value' => $property->bedrooms])
            @include('shared.input', ['class' => 'truc', 'label' => 'Etage', 'name' => 'floor', 'value' => $property->floor])
            @include('shared.input', ['class' => 'truc', 'label' => 'Adresse', 'name' => 'address', 'value' => $property->address])
            @include('shared.input', ['class' => 'truc', 'label' => 'Ville', 'name' => 'city', 'value' => $property->city])
            @include('shared.input', ['class' => 'truc', 'label' => 'Code postal', 'name' => 'postal_code', 'value' => $property->postal_code])
            @include('shared.checkbox', ['label' => 'Vendu', 'name' => 'sold', 'value' => $property->sold])
        </div>


        <button class="form-submit-btn">
            @if($property->exists)
                Modifier
            @else
                Créer
            @endif
        </button>
    </form>

@endsection