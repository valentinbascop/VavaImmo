@extends('base')

@section('content')

    <div class="home-container">
        <div class="inner-container">
            <h1>TEST</h1>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Assumenda dolores sint id maxime, sed atque quis tenetur, dolor labore beatae aliquam voluptates, consequatur vel sit illum neque est veniam quos.</p>
        </div>
    </div>

    <div>
        <h2>Biens les plus récents</h2>
        <div class="listing-properties">
            @foreach($properties as $property)
            <div class="list-element">
                @include('property.card')
            </div>
            @endforeach
        </div>
    </div>


@endsection