@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Liste des Notes</h1>

    <!-- Bouton pour ouvrir modal Ajouter -->
    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modalAdd">Ajouter une Note</button>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Élève</th>
                <th>Évaluation</th>
                <th>Valeur</th>
                <th>Observation</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($notes as $note)
            <tr>
                <td>{{ $note->eleve->nom }} {{ $note->eleve->prenom }}</td>
                <td>{{ $note->evaluation->titre }}</td>
                <td>{{ $note->valeur }}</td>
                <td>{{ $note->observation }}</td>
                <td>
                    <!-- Bouton Modifier -->
                    <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#modalEdit{{ $note->id }}">
                        Modifier
                    </button>

                    <!-- Bouton Supprimer -->
                    <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#modalDelete{{ $note->id }}">
                        Supprimer
                    </button>
                </td>
            </tr>

            <!-- Modal Modifier -->
            <div class="modal fade" id="modalEdit{{ $note->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $note->id }}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="{{ route('notes.update', $note) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="modal-header">
                                <h5 class="modal-title" id="editModalLabel{{ $note->id }}">Modifier la Note</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">

                                <div class="mb-3">
                                    <label>Élève</label>
                                    <select name="id_eleve" class="form-select" required>
                                        @foreach ($eleves as $eleve)
                                            <option value="{{ $eleve->id }}" {{ $note->id_eleve == $eleve->id ? 'selected' : '' }}>
                                                {{ $eleve->nom }} {{ $eleve->prenom }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label>Évaluation</label>
                                    <select name="id_evaluation" class="form-select" required>
                                        @foreach ($evaluations as $evaluation)
                                            <option value="{{ $evaluation->id }}" {{ $note->id_evaluation == $evaluation->id ? 'selected' : '' }}>
                                                {{ $evaluation->titre }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label>Valeur</label>
                                    <input type="number" step="0.01" name="valeur" class="form-control" value="{{ $note->valeur }}" required>
                                </div>

                                <div class="mb-3">
                                    <label>Observation</label>
                                    <textarea name="observation" class="form-control">{{ $note->observation }}</textarea>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Enregistrer</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Modal Supprimer -->
            <div class="modal fade" id="modalDelete{{ $note->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $note->id }}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="{{ route('notes.destroy', $note) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteModalLabel{{ $note->id }}">Confirmer la suppression</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                Êtes-vous sûr de vouloir supprimer cette note ?
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-danger">Supprimer</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        @endforeach
        </tbody>
    </table>
</div>

<!-- Modal Ajouter -->
<div class="modal fade" id="modalAdd" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('notes.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">Ajouter une Note</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">

                    <div class="mb-3">
                        <label>Élève</label>
                        <select name="id_eleve" class="form-select" required>
                            <option value="">Sélectionner un élève</option>
                            @foreach ($eleves as $eleve)
                                <option value="{{ $eleve->id }}">{{ $eleve->nom }} {{ $eleve->prenom }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label>Évaluation</label>
                        <select name="id_evaluation" class="form-select" required>
                            <option value="">Sélectionner une évaluation</option>
                            @foreach ($evaluations as $evaluation)
                                <option value="{{ $evaluation->id }}">{{ $evaluation->titre }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label>Valeur</label>
                        <input type="number" step="0.01" name="valeur" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label>Observation</label>
                        <textarea name="observation" class="form-control"></textarea>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Enregistrer</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
