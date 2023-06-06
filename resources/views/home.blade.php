@extends('base')

@section('content')

    <div class="home-container">
        <div class="inner-container">
            <h1>Projet agence immobilère</h1>
            <p>Ce site est un projet qui a pour but de me permettre d'apprendre le Laravel</p>
        </div>
    </div>

    <div class="list-container">
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