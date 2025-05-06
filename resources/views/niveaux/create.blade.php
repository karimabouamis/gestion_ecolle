<div class="mb-4">
    <button id="openCreateNiveauModal" class="btn btn-success btn-lg shadow" data-bs-toggle="modal" data-bs-target="#createNiveauModal">
        <i class="bi bi-plus-circle me-2"></i> Ajouter un Niveau
    </button>
</div>

<div class="modal fade" id="createNiveauModal" tabindex="-1" aria-labelledby="createNiveauModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content shadow border-0">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title" id="createNiveauModalLabel">
                    <i class="bi bi-journal-plus me-2"></i>Créer un Nouveau Niveau
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Fermer"></button>
            </div>
            <div class="modal-body p-4">
                <form action="{{ route('niveaux.store') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label for="nom_niveau" class="form-label fw-bold">
                            <i class="bi bi-bookmark-star me-2"></i>Nom du Niveau
                        </label>
                        <select name="nom_niveau" class="form-select form-select-lg" required>
                            <option value="">-- Choisir un niveau --</option>
                            @foreach ($noms as $nom)
                                <option value="{{ $nom }}" {{ old('nom_niveau') == $nom ? 'selected' : '' }}>
                                    {{ $nom }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="description" class="form-label fw-bold">
                            <i class="bi bi-textarea-t me-2"></i>Description
                        </label>
                        <textarea name="description" class="form-control form-control-lg" rows="3">{{ old('description') }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label for="choix" class="form-label fw-bold">
                            <i class="bi bi-list-check me-2"></i>Choix
                        </label>
                        <select name="choix" class="form-select form-select-lg">
                            <option value="">-- Choisir un choix --</option>
                            @foreach ($choix as $c)
                                <option value="{{ $c }}" {{ old('choix') == $c ? 'selected' : '' }}>
                                    {{ $c }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4 border-top pt-3">
                        <button type="button" class="btn btn-secondary me-md-2" data-bs-dismiss="modal">
                            <i class="bi bi-x-circle me-2"></i>Annuler
                        </button>
                        <button type="submit" class="btn btn-success">
                            <i class="bi bi-check-circle me-2"></i>Enregistrer
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
