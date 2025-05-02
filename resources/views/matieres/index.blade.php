@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="fw-bold text-black">📚 Liste des Matières</h1>

    @include('matieres.create')
    <div class="table-responsive mt-4">
        <table class="table table-hover table-bordered align-middle shadow-sm rounded-3 overflow-hidden">
            <thead class="table-dark text-center">
                <tr>
                    <th>Nom</th>
                    <th>Coefficient</th>
                    <th>Langue</th>
                    <th>Niveau</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @forelse($matieres as $matiere)
                <tr>
                    <td class="fw-semibold">{{ $matiere->nom_matiere }}</td>
                    <td>{{ $matiere->coefficient }}</td>
                    <td>{{ ucfirst($matiere->langue) }}</td>
                    <td>
                        <span class="badge bg-secondary">
                            {{ $matiere->niveau ? $matiere->niveau->nom_niveau : 'Aucun niveau' }}
                        </span>
                    </td>
                    <td>
                        <div class="d-flex justify-content-center gap-2">
                            @include('matieres.edit')     
                            @include('matieres.delete')
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center text-muted py-4">Aucune matière disponible.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
