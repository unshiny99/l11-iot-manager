@extends('layouts.app')

@section('content')
<style>
    .warning {
        color: orange;
    }
</style>
<div class="container">
    <h1 class="my-4">Détails du module</h1>

    <div class="card mb-3">
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

            @if ($moduleData->count() > 0)
                <canvas id="moduleDataChart" width="400" height="200"></canvas>
            @else
                <p class="warning">Aucune donnée disponible pour le module.</p>
            @endif
            
            <a href="{{ route('modules.index') }}" class="btn btn-secondary mt-3">Retour à la liste</a>
        </div>
    </div>
</div>
<script>
    // Create a line chart for the module data
    const ctx = document.getElementById('moduleDataChart').getContext('2d');
    var labels = <?= $moduleData->pluck('created_at')->map(function($date) {
        return $date->format('d/m/Y H:m:s');
    })->toJson() ?>;
    var data = <?= $moduleData->pluck('measured_value')->toJson() ?>;
    
    const moduleDataChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                label: 'Données du module',
                data: data,
                borderWidth: 1
            }]
        },
    });
</script>
@endsection