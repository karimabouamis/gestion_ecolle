@extends('layouts.app')

@section('content')
<div class="container my-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="fw-bold text-black"> 📚 Liste des années scolaires</h1>
        @include('scolaires.create')
    </div>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show shadow-sm rounded-3" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fermer"></button>
        </div>
    @endif

    <div class="card shadow rounded-4 border-0">
        <div class="card-body p-4">

            <table class="table table-hover align-middle text-center table-bordered table-striped rounded-4 overflow-hidden">
                <thead class="table-primary">
                    <tr>
                        <th>Libellé</th>
                        <th>Date début</th>
                        <th>Date fin</th>
                        <th>Statut</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($annees as $annee)
                        <tr>
                            <td>{{ $annee->libelle }}</td>
                            <td>{{ date('d-m-Y', strtotime($annee->date_debut)) }}</td>
                            <td>{{ date('d-m-Y', strtotime($annee->date_fin)) }}</td>
                            <td>
                                @if ($annee->statut === 'active')
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-danger">Inactive</span>
                                @endif
                            </td>
                            <td>
                                <div class="d-flex justify-content-center gap-2">
                                    @include('scolaires.edit')
                                    @include('scolaires.delete')
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted py-4">
                                <i class="bi bi-info-circle text-primary fs-4"></i><br>
                                Aucune année scolaire enregistrée.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

        </div>
    </div>

</div>
@endsection
