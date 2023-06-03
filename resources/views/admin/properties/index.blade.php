@extends('admin.properties.admin')

@section('title', 'Tous les biens')

@section('content')

    <div>
        <h1>@yield('title')</h1>
        <a href="{{ route('admin.property.create') }}" class="add-property-btn">Ajouter un bien</a>
    </div>

    <table>
        <thead>
        <tr>
            <th>Titre</th>
            <th>Surface</th>
            <th>Prix</th>
            <th>Ville</th>
            <th class="text-end">Actions</th>
        </tr>
        </thead>
        <tbody>
            @foreach($properties as $property)
                <tr>
                    <td>{{ $property->title }}</td>
                    <td>{{ $property->surface }}m²</td>
                    <td>{{ number_format($property->price, thousands_separator: ' ') }}</td>
                    <td>{{ $property->city }}</td>
                    <td>
                        <div class="action-btn">
                            <a classs="edit-btn" href="{{ route('admin.property.edit', $property) }}"> Editer </a>
                            <form action="{{ route('admin.property.destroy', $property) }}" method="post">
                                @csrf 
                                @method("delete")
                                <button class="delete-btn">Supprimer</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $properties->links()}}

@endsection