@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Mes Notes par Matière</h2>
    
    <div class="card mb-4">
        <div class="card-header">
            <h4>Moyenne Générale: {{ number_format($moyenneGenerale, 2) }}/20</h4>
        </div>
    </div>
    
    @foreach($notesParMatiere as $matiere)
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4>{{ $matiere['nom'] }} (Coeff: {{ $matiere['coefficient'] }})</h4>
                <span class="badge bg-primary">Moyenne: {{ number_format($matiere['moyenne'], 2) }}/20</span>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Type</th>
                            <th>Note</th>
                            <th>Observation</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($matiere['notes'] as $note)
                            <tr>
                                <td>{{ $note->evaluation->date_evaluation->format('d/m/Y') }}</td>
                                <td>{{ $note->evaluation->type_evaluation }}</td>
                                <td>
                                    <span class="badge bg-{{ $note->valeur >= 10 ? 'success' : 'danger' }}">
                                        {{ $note->valeur }}/20
                                    </span>
                                </td>
                                <td>{{ $note->observation ?? '-' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endforeach
    
    @if(count($notesParMatiere) === 0)
        <div class="alert alert-info">
            Vous n'avez aucune note enregistrée pour le moment.
        </div>
    @endif
</div>
@endsection