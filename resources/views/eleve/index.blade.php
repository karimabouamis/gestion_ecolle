@extends('layouts.app')

@section('content')
<div class="container my-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="fw-bold text-black"> 🎓 Liste des élèves</h1>
        @include('eleve.create')
    </div>

    <div class="card shadow rounded-4 border-0">
        <div class="card-body p-4">

            <table class="table table-hover align-middle text-center table-bordered table-striped rounded-4 overflow-hidden">
                <thead class="table-primary">
                    <tr>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Adresse</th>
                        <th>Genre</th>
                        <th>Email</th>
                        <th>Téléphone</th>
                        <th>Classe</th>
                        <th>Photo</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($eleves as $eleve)
                        <tr>
                            <td>{{ $eleve->nom }}</td>
                            <td>{{ $eleve->prenom }}</td>
                            <td>{{ $eleve->adresse }}</td>
                            <td><span class="badge bg-secondary">{{ $eleve->genre }}</span></td>
                            <td>{{ $eleve->email }}</td>
                            <td>{{ $eleve->tel }}</td>
                            <td>{{ $eleve->id_classe }}</td>
                            <td>
                                @if ($eleve->photo)
                                    <img src="{{ asset('storage/photos/' . $eleve->photo) }}" width="50" height="50" class="rounded-circle object-fit-cover">
                                @else
                                    <span class="text-muted fst-italic">Aucune</span>
                                @endif
                            </td>
                            <td>
                                <div class="d-flex justify-content-center gap-2">
                                    @include('eleve.edit')
                                    @include('eleve.delete')
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="text-center text-muted py-4">
                                <i class="bi bi-info-circle text-primary fs-4"></i><br>
                                Aucun élève enregistré.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

        </div>
    </div>

</div>
@endsection
