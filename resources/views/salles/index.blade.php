@extends('layouts.app')

@section('content')
<div class="container my-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="fw-bold text-black"> 📚 Liste des salles</h1>
        @include('salles.create')
    </div>

    <div class="card shadow rounded-4 border-0">
        <div class="card-body p-4">

            <table class="table table-hover align-middle text-center table-bordered table-striped rounded-4 overflow-hidden">
                <thead class="table-primary">
                    <tr>
                        <th class="fw-bold text-dark">ID</th>
                        <th class="fw-bold text-dark">Numéro</th>
                        <th class="fw-bold text-dark">Type</th>
                        <th class="fw-bold text-dark">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($salles as $salle)
                        <tr>
                            <td class="text-muted small">{{ $salle->id }}</td>
                            <td><span class="fw-semibold text-dark">{{ $salle->num_salle }}</span></td>
                            <td>
                                @if ($salle->type_salle)
                                    <span class="badge bg-info text-dark">{{ $salle->type_salle }}</span>
                                @else
                                    <span class="text-muted fst-italic">Non défini</span>
                                @endif
                            </td>
                            <td>
                                <div class="d-flex justify-content-center gap-2">
                                    @include('salles.edit')
                                    @include('salles.delete')
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted py-4 fs-5">
                                <i class="bi bi-info-circle text-primary fs-4"></i><br>
                                Aucune salle disponible.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

        </div>
    </div>

</div>
@endsection
