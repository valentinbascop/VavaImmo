@extends('admin.admin')

@section('title', 'Toutes les options')

@section('content')

    <div class="btn-container">
        <h1>@yield('title')</h1>
        <a href="{{ route('admin.option.create') }}" class="add-option-btn">Ajouter une option</a>
    </div>

    <table class="list-table">
        <thead>
        <tr>
            <th>Nom de l'option</th>
            <th class="text-end">Actions</th>
        </tr>
        </thead>
        <tbody>
            @foreach($options as $option)
                <tr>
                    <td>{{ $option->name }}</td>
                    <td>
                        <div class="action-btn">
                            <a classs="edit-btn" href="{{ route('admin.option.edit', $option) }}"> <i class="fa-solid fa-pen" style="color: #556C96;"></i> </a>
                            <form action="{{ route('admin.option.destroy', $option) }}" method="post">
                                @csrf 
                                @method("delete")
                                <button class="delete-btn"><i class="fa-solid fa-trash" style="color: #FF584D;"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $options->links()}}

@endsection