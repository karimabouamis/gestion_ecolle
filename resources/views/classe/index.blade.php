@extends('layouts.app')

@section('content')
<div class="container my-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="fw-bold text-black"> 📚 Liste des classes</h1>
        @include('classe.create')
    </div>

    <div class="card shadow rounded-4 border-0">
        <div class="card-body p-4">

            <table class="table table-hover align-middle text-center table-bordered table-striped rounded-4 overflow-hidden">
                <thead class="table-primary">
                    <tr>
                        <th class="text-nowrap">ID</th>
                        <th>Description</th>
                        <th>Niveau</th>
                        <th>Année Scolaire</th>
                        <th>Opérations</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($classes as $classe)
                        <tr>
                            <td>{{ $classe->id }}</td>
                            <td>{{ $classe->description }}</td>
                            <td>
                                @if ($classe->niveau)
                                    <span class="badge bg-info text-dark">{{ $classe->niveau->nom_niveau }}</span>
                                @else
                                    <span class="text-muted">Non défini</span>
                                @endif
                            </td>
                            <td>
                                @if ($classe->anneeScolaire)
                                    <span class="badge bg-secondary">
                                        {{ date('d-m-Y', strtotime($classe->anneeScolaire->date_debut)) }} - {{ date('d-m-Y', strtotime($classe->anneeScolaire->date_fin)) }}
                                    </span>
                                @else
                                    <span class="text-muted">Non défini</span>
                                @endif
                            </td>
                            <td>
                                <div class="d-flex justify-content-center gap-2">
                                    @include('classe.edit')
                                    @include('classe.delete')
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted py-4">
                                <i class="bi bi-info-circle text-primary fs-4"></i><br>
                                Aucune classe pour le moment.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

        </div>
    </div>

</div>
@endsection
