@extends('admin.admin')

@section('title', $option->exists ? "Editer une option" : "Créer une option")

@section('content')

    <h1>@yield('title')</h1>

    <form action="{{ route($option->exists ? 'admin.option.update' : 'admin.option.store', ['option' => $option]) }}" method="POST">
        @csrf
        @method($option->exists ? 'put' : 'post')

        @include('shared.input', ['name' => 'name', 'label' => 'Nom', 'value' => $option->name])


        <button class="form-submit-btn validate-btn">
            @if($option->exists)
                Modifier
            @else
                Créer
            @endif
        </button>
    </form>

@endsection