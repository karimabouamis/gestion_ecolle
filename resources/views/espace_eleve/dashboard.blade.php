@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tableau de Bord</h2>
    <div class="row">
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-header">Mes Informations</div>
                <div class="card-body">
                    <p><strong>Nom :</strong> {{ $eleve->nom }} {{ $eleve->prenom }}</p>
                    <p><strong>Classe :</strong> {{ $eleve->classe->description ?? 'Non assigné' }}</p>
                    <p><strong>Année scolaire :</strong> {{ $eleve->classe->anneeScolaire->libelle ?? '' }}</p>
                </div>
            </div>
        </div>
        
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-header">Dernières Notes</div>
                <div class="card-body">
                    @if($dernieresNotes->count() > 0)
                        <ul class="list-group">
                            @foreach($dernieresNotes as $note)
                                <li class="list-group-item">
                                    {{ $note->evaluation->matiere->nom_matiere }}: 
                                    <strong>{{ $note->valeur }}/20</strong>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p>Aucune note disponible</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
    
    <div class="card mb-4">
        <div class="card-header">Évaluations Récentes</div>
        <div class="card-body">
            @if($evaluationsRecentes->count() > 0)
                <table class="table">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Matière</th>
                            <th>Type</th>
                            <th>Enseignant</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($evaluationsRecentes as $eval)
                            <tr>
                                <td>{{ $eval->date_evaluation->format('d/m/Y') }}</td>
                                <td>{{ $eval->matiere->nom_matiere }}</td>
                                <td>{{ $eval->type_evaluation }}</td>
                                <td>{{ $eval->enseignant->nom ?? '' }} {{ $eval->enseignant->prenom ?? '' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p>Aucune évaluation prévue</p>
            @endif
        </div>
    </div>
</div>
@endsection