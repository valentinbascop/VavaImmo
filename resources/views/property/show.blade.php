@extends('base')

@section('title', $property->title)

@section('content')

<div class="container">

  <h1 class="property-title">{{ $property->title}}</h1>

  <div class="carousel-container">
  <div class="carousel-inner">
    @foreach($property->pictures as $k => $picture)
      <div class="carousel-item {{$k === 0 ? 'active' : '' }}">
        <img src="{{ $picture->getImageUrl() }}" alt="">
      </div>
    @endforeach
  </div>
  <button class="carousel-prev"><i class="fa-solid fa-arrow-left"></i></button>
  <button class="carousel-next"><i class="fa-solid fa-arrow-right"></i></button>
</div>



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

  <hr>

  <div class="financing-simulator-container">

    <h2>Simulation de financement</h2>
  
    <div id="financing-simulator">
      <div class="form-group">
        <label for="property-price">Prix du bien</label>
        <input type="number" id="property-price" class="form-control" value="{{ $property->price }}" disabled>
      </div>
  
      <div class="form-group">
        <label for="down-payment">Apport personnel</label>
        <input type="number" id="down-payment" class="form-control" placeholder="Enter down payment amount">
      </div>
  
      <div class="form-group">
        <label for="installments">Durée du prêt</label>
        <p><span id="years-value">5</span> ans</p>
        <input type="range" id="years" min="5" max="30" value="5" step="5">
      </div>
  
      <div id="financing-results">
        <h4>Résumé</h4>
        <div>
          <p>Mensualités : <span id="monthly-installment">0.00</span></p>
          <p>Montant de l’emprunt : <span id="total-loan-amount">0.00</span></p>
          <p>Coût des intérêts : <span id="interest-cost">0.00</span></p>
          <p>Frais de notaire : <span id="notary-fees">0.00</span></p>
        </div>
      </div>
    </div>

  </div>


</div>

@endsection