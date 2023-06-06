@extends('base')

@section('title', $property->title)

@section('content')

<div class="container">

  <h1>{{ $property->title}}</h1>
  <h2>{{ $property->rooms}} pièces - {{ $property->surface}} m²</h2>

  <div class="property-info">
    {{ number_format($property->price, thousands_separator: ' ')}} €
  </div>

  <hr>

  <div class="form-contact-container">
    <h4>Intéressé par ce bien ?</h4>

    <form action="{{ route('property.contact', $property)}}" method="post" class="form-contact">
      @csrf
      <div class="row">
        @include('shared.input', ['class' => 'first-name', 'label' => 'Prénom', 'name' => 'firstname'])
        @include('shared.input', ['class' => 'last-name', 'label' => 'Nom', 'name' => 'lastname'])
      </div>
      <div class="row">
        @include('shared.input', ['class' => 'phone', 'label' => 'Téléphone', 'name' => 'phone'])
        @include('shared.input', ['type' => 'email', 'class' => 'email', 'label' => 'Email', 'name' => 'email'])
      </div>
        @include('shared.input', ['type' => 'textarea', 'class' => 'message', 'label' => 'Votre message', 'name' => 'message'])
        <button class="submit-contact-form btn">
          Nous contacter
        </button>
    </form>
  </div>

  <div class="property-desc">
    <p>{!! nl2br($property->description) !!}</p>
  </div>
  <div class="row row-info-property">
    <div class="row-title">
      <h2>Caractéristique</h2>
      <table class="table feature">
        <tr>
          <td>Adresse</td>
          <td>{{ $property->address }}</td>
        </tr>
        <tr>
          <td>Ville</td>
          <td>{{ $property->city }} ({{ $property->postal_code }})</td>
        </tr>
        <tr>
          <td>Surface habitable</td>
          <td>{{ $property->surface }} m²</td>
        </tr>
        <tr>
          <td>Pièces</td>
          <td>{{ $property->rooms }}</td>
        </tr>
        <tr>
          <td>Chambres</td>
          <td>{{ $property->bedrooms }}</td>
        </tr>
        <tr>
          <td>Etage</td>
          <td>{{ $property->floor ?: 'RDC' }}</td>
        </tr>
      </table>
    </div>
    <div class="row-title">
      <h2>Spécificités</h2>
      <ul class="list-group">
        @foreach($property->options as $option)
          <li class="list-element">{{ $option->name }}</li>
        @endforeach
      </ul>
    </div>

  </div>

</div>

@endsection