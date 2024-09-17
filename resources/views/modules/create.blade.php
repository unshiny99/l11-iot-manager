@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Créer un module</h1>

    <form action="{{ route('modules.store') }}" method="POST">
        @csrf

        <div class="form-group mb-3">
            <label for="name">Nom du module</label>
            <input type="text" name="name" class="form-control" id="name" placeholder="Entrer le nom" required>
        </div>

        <div class="form-group mb-3">
            <label for="module_type_id">Type de module</label>
            <select name="module_type_id" id="module_type_id" class="form-control" required>
                <option value="">Sélectionner un type de module</option>
                @foreach($module_types as $module_type)
                    <option value="{{ $module_type->id }}">{{ $module_type->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group mb-3">
            <label for="status">Etat</label>
            <select name="status" id="status" class="form-control" required>
                @foreach($statuses as $status)
                    <option value="{{ $status->value }}">{{ ucfirst($status->value) }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Créer le module</button>
    </form>
</div>
@endsection