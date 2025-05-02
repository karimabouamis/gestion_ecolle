@extends('layouts.app')

@section('content')
<div class="container-fluid p-4">
    <div class="dashboard-container">
        <h1 class="text-uppercase fw-bold mb-4" style="font-size: 24px; color: #1a365d;">
            <i class="bi bi-speedometer2 me-2"></i> Tableau de Bord - Gestion Scolaire
        </h1>
        
        <div class="row g-4">
            <!-- Enseignants  -->
            <div class="col-md-4">
                <div class="card border-start border-5 border-primary rounded-4 shadow-sm h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="text-uppercase text-muted fw-semibold small">Enseignants</h6>
                                <h2 class="mb-0 fw-bold" style="color: #1a365d;">{{ $enseignantsCount ?? 0 }}</h2>
                            </div>
                            <div class="icon-shape bg-primary bg-gradient text-white rounded-3 p-3">
                                <i class="bi bi-person-video3 fs-4"></i>
                            </div>
                        </div>
                        <div class="mt-3">
                            @if(Route::has('enseignant.index'))
                                <a href="{{ route('enseignant.index') }}" class="btn btn-sm btn-outline-primary">Voir liste</a>
                            @else
                                <button class="btn btn-sm btn-outline-secondary" disabled>Non disponible</button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Élèves -->
            <div class="col-md-4">
                <div class="card border-start border-5 border-success rounded-4 shadow-sm h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="text-uppercase text-muted fw-semibold small">Élèves</h6>
                                <h2 class="mb-0 fw-bold" style="color: #1a759f;">{{ $eleveCount ?? 0 }}</h2>
                            </div>
                            <div class="icon-shape bg-success bg-gradient text-white rounded-3 p-3">
                                <i class="bi bi-people-fill fs-4"></i>
                            </div>
                        </div>
                        <div class="mt-3">
                            @if(Route::has('eleve.index'))
                                <a href="{{ route('eleve.index') }}" class="btn btn-sm btn-outline-success">Voir liste</a>
                            @else
                                <button class="btn btn-sm btn-outline-secondary" disabled>Non disponible</button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Niveaux  -->
            <div class="col-md-4">
                <div class="card border-start border-5 border-info rounded-4 shadow-sm h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="text-uppercase text-muted fw-semibold small">Niveaux</h6>
                                <h2 class="mb-0 fw-bold" style="color: #5f6caf;">{{ $niveauCount ?? 0 }}</h2>
                            </div>
                            <div class="icon-shape bg-info bg-gradient text-white rounded-3 p-3">
                                <i class="bi bi-graph-up-arrow fs-4"></i>
                            </div>
                        </div>
                        <div class="mt-3">
                            @if(Route::has('niveaux.index'))
                                <a href="{{ route('niveaux.index') }}" class="btn btn-sm btn-outline-info">Voir liste</a>
                            @else
                                <button class="btn btn-sm btn-outline-secondary" disabled>Non disponible</button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Matières  -->
            <div class="col-md-6">
                <div class="card border-start border-5 border-warning rounded-4 shadow-sm h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="text-uppercase text-muted fw-semibold small">Matières</h6>
                                <h2 class="mb-0 fw-bold" style="color: #b45309;">{{ $matiereCount ?? 0 }}</h2>
                            </div>
                            <div class="icon-shape bg-warning bg-gradient text-white rounded-3 p-3">
                                <i class="bi bi-journal-bookmark-fill fs-4"></i>
                            </div>
                        </div>
                        <div class="mt-3">
                            @if(Route::has('matieres.index'))
                                <a href="{{ route('matieres.index') }}" class="btn btn-sm btn-outline-warning">Voir liste</a>
                            @else
                                <button class="btn btn-sm btn-outline-secondary" disabled>Non disponible</button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Salles  -->
            <div class="col-md-6">
                <div class="card border-start border-5 border-secondary rounded-4 shadow-sm h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="text-uppercase text-muted fw-semibold small">Salles</h6>
                                <h2 class="mb-0 fw-bold" style="color: #4b5563;">{{ $salleCount ?? 0 }}</h2>
                            </div>
                            <div class="icon-shape bg-secondary bg-gradient text-white rounded-3 p-3">
                                <i class="bi bi-door-open fs-4"></i>
                            </div>
                        </div>
                        <div class="mt-3">
                            @if(Route::has('salles.index'))
                                <a href="{{ route('salles.index') }}" class="btn btn-sm btn-outline-secondary">Voir liste</a>
                            @else
                                <button class="btn btn-sm btn-outline-secondary" disabled>Non disponible</button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Classes  -->
            <div class="col-md-12">
                <div class="card border-start border-5 border-danger rounded-4 shadow-sm">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="text-uppercase text-muted fw-semibold small">Classes</h6>
                                <h2 class="mb-0 fw-bold" style="color: #9d174d;">{{ $classesCount ?? 0 }}</h2>
                            </div>
                            <div class="icon-shape bg-danger bg-gradient text-white rounded-3 p-3">
                                <i class="bi bi-building fs-4"></i>
                            </div>
                        </div>
                        <div class="mt-3">
                            @if(Route::has('classe.index'))
                                <a href="{{ route('classe.index') }}" class="btn btn-sm btn-outline-danger">Voir liste</a>
                            @else
                                <button class="btn btn-sm btn-outline-secondary" disabled>Non disponible</button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
    </div>
</div>


@endsection