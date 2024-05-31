<!-- resources/views/tache/show.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Détails de la tâche</h1>
        <p><strong>Nom de la tâche:</strong> {{ $tache->nom }}</p>
        <p><strong>Description:</strong> {{ $tache->description }}</p>
        <p><strong>État:</strong> {{ $tache->etat }}</p>
        <!-- Afficher d'autres détails de la tâche ici -->

        <h2>Suivi du temps</h2>
        <form action="{{ route('SuiviTemps.store') }}" method="POST">
            @csrf
            <input type="hidden" name="tache_id" value="{{ $tache->id }}">
            <div>
                <label for="hours">Heures travaillées:</label>
                <input type="number" name="hours" id="hours">
            </div>
            <div>
                <label for="description">Description (optionnelle):</label>
                <textarea name="description" id="description"></textarea>
            </div>
            <button type="submit">Ajouter Entrée</button>
        </form>

        <h3>Liste des entrées de temps</h3>
        <ul>
            @foreach($tache->timeEntries as $entry)
                <li>{{ $entry->hours }} heures - {{ $entry->description ?? 'Aucune description' }}</li>
            @endforeach
        </ul>
    </div>
@endsection
