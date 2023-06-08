@extends('base')

@section('title', 'Se connecter')

@section('content')

  <div class="container">
    <h1>@yield('title')</h1>

    <form method="post" action="{{ route('login') }}" class="login-form">
      @csrf

      @include('shared.input', ['type' => 'email', 'class' => 'email', 'label' => 'Email', 'name' => 'email'])
      @include('shared.input', ['type' => 'password', 'class' => 'password', 'label' => 'Mot de passe', 'name' => 'password'])
      <div class="login-btn-container">
        <button class="validate-btn">Se connecter</button>
      </div>
    </form>
  </div>


@endsection