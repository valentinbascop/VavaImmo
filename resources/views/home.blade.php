@extends('base')

@section('content')

    <div class="container">

        <h2 class="listing-title">Biens les plus récents</h2>
        <div class="listing-properties">
            @foreach($properties as $property)
            <div class="list-element">
                @include('property.card')
            </div>
            @endforeach
        </div>
    </div>


@endsection