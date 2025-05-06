@extends('layouts.app')

@section('title', 'Mes Évaluations')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Mes Évaluations</h4>
                    <div>
                        <a href="{{ route('eleve.notes') }}" class="btn btn-light btn-sm">
                            <i class="fas fa-chart-bar mr-1"></i> Voir mes notes
                        </a>
                    </div>
                </div>
                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show m-3" role="alert">
                        {{ session('error') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover" id="tableEvaluations">
                            <thead class="thead-light">
                                <tr>
                                    <th>Date</th>
                                    <th>Heure</th>
                                    <th>Matière</th>
                                    <th>Type</th>
                                    <th>Note</th>
                                    <th>Enseignant</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($evaluations as $evaluation)
                                    <tr>
                                        <td>{{ \Carbon\Carbon::parse($evaluation->date_evaluation)->format('d/m/Y') }}</td>
                                        <td>
                                            @if($evaluation->heure_evaluation)
                                                {{ \Carbon\Carbon::parse($evaluation->heure_evaluation)->format('H:i') }}
                                            @else
                                                --
                                            @endif
                                        </td>
                                        <td>{{ $evaluation->matiere->nom_matiere ?? $evaluation->matiere_evaluation }}</td>
                                        <td>
                                            @switch($evaluation->type_evaluation)
                                                @case('examen')
                                                    <span class="badge badge-danger">Examen</span>
                                                    @break
                                                @case('controle')
                                                    <span class="badge badge-warning">Contrôle</span>
                                                    @break
                                                @case('devoir')
                                                    <span class="badge badge-info">Devoir</span>
                                                    @break
                                                @default
                                                    <span class="badge badge-secondary">{{ $evaluation->type_evaluation }}</span>
                                            @endswitch
                                        </td>
                                        <td>
                                            @if(isset($notes[$evaluation->id]))
                                                <span class="font-weight-bold">{{ $notes[$evaluation->id]->valeur }}/20</span>
                                            @elseif(\Carbon\Carbon::parse($evaluation->date_evaluation)->isPast())
                                                <span class="text-muted">En attente</span>
                                            @else
                                                <span class="badge badge-secondary">À venir</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($evaluation->enseignant)
                                                {{ $evaluation->enseignant->prenom }} {{ $evaluation->enseignant->nom }}
                                            @else
                                                --
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('eleve.detailEvaluation', $evaluation->id) }}" class="btn btn-sm btn-info">
                                                <i class="fas fa-eye"></i> Détails
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center py-4">
                                            <div class="alert alert-info mb-0">
                                                Aucune évaluation n'est programmée pour votre classe pour le moment.
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $('#tableEvaluations').DataTable({
            language: {
                url: '//cdn.datatables.net/plug-ins/1.10.24/i18n/French.json'
            },
            order: [[0, 'desc']],
            pageLength: 10,
            responsive: true
        });
    });
</script>
@endsection