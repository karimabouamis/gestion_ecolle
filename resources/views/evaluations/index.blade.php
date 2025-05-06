@extends('layouts.app')

@section('content')
<div class="container my-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="fw-bold text-black"> 📝 Liste des évaluations</h1>

        @include('evaluations.create', ['matieres' => $matieres, 'classes' => $classes, 'enseignants' => $enseignants, 'types' => $types])
    </div>

    <div class="card shadow rounded-4 border-0">
        <div class="card-body p-4">

            <table class="table table-hover align-middle text-center table-bordered table-striped rounded-4 overflow-hidden">
                <thead class="table-primary">
                    <tr>
                        <th>Date</th>
                        <th>Heure</th>
                        <th>Type</th>
                        <th>Matière</th>
                        <th>Classe</th>
                        <th>Enseignant</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($evaluations as $evaluation)
                        <tr>
                            <td>{{ date('d-m-Y', strtotime($evaluation->date_evaluation)) }}</td>
                            <td>{{ $evaluation->heure_evaluation }}</td>
                            <td><span class="badge bg-info text-dark">{{ $evaluation->type_evaluation }}</span></td>
                            <td>{{ $evaluation->matiere?->nom_matiere }}</td>
                            <td>{{ $evaluation->classe?->nom_classe }}</td>
                            <td>{{ $evaluation->enseignant?->nom_enseignant }}</td>
                            <td>
                                <div class="d-flex justify-content-center gap-2">
                                    @include('evaluations.edit', ['matieres' => $matieres, 'classes' => $classes, 'enseignants' => $enseignants, 'types' => $types])
                                    @include('evaluations.delete', ['evaluation' => $evaluation])
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted py-4">
                                <i class="bi bi-info-circle text-primary fs-4"></i><br>
                                Aucune évaluation enregistrée.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

        </div>
    </div>

</div>
@endsection
