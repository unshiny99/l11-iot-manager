@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Liste des modules</h1>
    <a href="{{ route('modules.create') }}" class="btn btn-primary mb-4">Créer un module</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nom du module</th>
                <th scope="col">Etat</th>
                <th scope="col">Durée de fonctionnement</th>
                <th scope="col">Nombre de données envoyées</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($modules as $module)
                <tr>
                    <th scope="row">{{ $module->id }}</th>
                    <td>{{ $module->name }}</td>
                    <td>{{ $module->status }}</td>
                    <td>{{ $module->operation_duration }}</td>
                    <td>{{ $module->data_sent_count }}</td>
                    <td>
                        <a href="{{ route('modules.show', $module->id) }}" class="btn btn-info btn-sm">Voir</a>
                        <form action="{{ route('modules.destroy', $module->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
