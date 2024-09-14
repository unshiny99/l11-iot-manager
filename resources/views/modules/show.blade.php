@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Détails du module</h1>

    <div class="card">
        <div class="card-header">
            Module: {{ $module->name }}
        </div>
        <div class="card-body">
            <h5 class="card-title">Etat : {{ $module->status }}</h5>
            <p class="card-text">Type de module : {{ $module->type->name }}</p>
            <h5 class="card-title">Durée de fonctionnement (secondes) : {{ $module->operation_duration }}</h5>
            <h5 class="card-title">Nombre de données envoyées : {{ $module->data_sent_count }}</h5>
            <p class="card-text">Créé le : {{ $module->created_at->format('d M Y, H:i') }}</p>
            <p class="card-text">Dernière mise à jour : {{ $module->updated_at->format('d M Y, H:i') }}</p>
            
            <a href="{{ route('modules.index') }}" class="btn btn-secondary">Retour à la liste</a>
        </div>
    </div>
</div>
@endsection