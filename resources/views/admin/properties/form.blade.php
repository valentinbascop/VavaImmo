@extends('admin.admin')

@section('title', $property->exists ? "Editer un bien" : "Enregistrer un bien")

@section('content')

    <h1>@yield('title')</h1>

    <form action="{{ route($property->exists ? 'admin.property.update' : 'admin.property.store', ['property' => $property]) }}" method="POST" class="form-create" enctype="multipart/form-data">
        @csrf
        @method($property->exists ? 'put' : 'post')

        <div class="global-row">
            <div class="form-row">
                <div class="row">
                    @include('shared.input', ['label' => 'Titre', 'name' => 'title', 'value' => $property->title])
                    @include('shared.input', ['class' => 'truc', 'name' => 'surface', 'value' => $property->surface])
                </div>
                <div class="row">
                    @include('shared.input', ['class' => 'truc', 'label' => 'Prix', 'name' => 'price', 'value' => $property->price])
                    @include('shared.input', ['type' => 'textarea', 'class' => 'truc', 'name' => 'description', 'value' => $property->description])
                </div>
                <div class="row">
                    @include('shared.input', ['class' => 'truc', 'label' => 'Pièces', 'name' => 'rooms', 'value' => $property->rooms])
                    @include('shared.input', ['class' => 'truc', 'label' => 'Chambres', 'name' => 'bedrooms', 'value' => $property->bedrooms])
                    @include('shared.input', ['class' => 'truc', 'label' => 'Etage', 'name' => 'floor', 'value' => $property->floor])   
                </div>
                <div class="row">
                    @include('shared.input', ['class' => 'truc', 'label' => 'Adresse', 'name' => 'address', 'value' => $property->address])
                    @include('shared.input', ['class' => 'truc', 'label' => 'Ville', 'name' => 'city', 'value' => $property->city])
                    @include('shared.input', ['class' => 'truc', 'label' => 'Code postal', 'name' => 'postal_code', 'value' => $property->postal_code])
                </div>
                @include('shared.select', ['label' => 'Options', 'name' => 'options', 'value' => $property->options()->pluck('id'), 'multiple' => true, 'options' => $options])
                @include('shared.checkbox', ['label' => 'Vendu', 'name' => 'sold', 'value' => $property->sold, 'options' => $options])
            </div>
            <div class="form-row">
                @foreach($property->pictures as $picture)
                    <div id="picture{{ $picture->id }}" class="form-picture-container">
                        <img src="{{ $picture->getImageUrl() }}" alt="" class="form-picture">
                        <button type="button" class="delete-picture"
                            hx-delete="{{ route('admin.picture.destroy', $picture) }}"
                            hx-target="#picture{{ $picture->id }}"
                            hx-swap="delete"
                        > 
                        Supprimer l'image</button>
                    </div>
                @endforeach
                @include('shared.upload', ['label' => 'Image', 'name' => 'pictures', 'multiple' =>  true])
            </div>
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