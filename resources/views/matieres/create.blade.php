<div class="mb-4">
    <button id="openCreateMatiereModal" data-bs-toggle="modal" data-bs-target="#createMatiereModal" class="btn btn-success btn-lg shadow rounded-3">
        <i class="bi bi-plus-circle me-2"></i> Ajouter une matière
    </button>
</div>

<div class="modal fade" id="createMatiereModal" tabindex="-1" aria-labelledby="createMatiereModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow rounded-3">

          
            <div class="modal-header bg-primary text-white py-3">
                <h5 class="modal-title fw-bold" id="createMatiereModalLabel">
                    <i class="bi bi-journal-plus me-2"></i>Créer une Matière
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Fermer"></button>
            </div>

            <form action="{{ route('matieres.store') }}" method="POST">
                @csrf

              
                <div class="modal-body p-4">
                    <div class="mb-4">
                        <label class="form-label fw-bold">
                            <i class="bi bi-book me-2"></i>Nom de la matière
                        </label>
                        <input type="text" name="nom_matiere" value="{{ old('nom_matiere') }}" class="form-control form-control-lg rounded-3" placeholder="Ex: Mathématiques" required>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold">
                            <i class="bi bi-123 me-2"></i>Coefficient
                        </label>
                        <input type="number" name="coefficient" value="{{ old('coefficient') }}" class="form-control form-control-lg rounded-3" placeholder="Ex: 4" step="1" required>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold">
                            <i class="bi bi-translate me-2"></i>Langue
                        </label>
                        <select name="langue" class="form-select form-select-lg rounded-3" required>
                            <option value="" disabled selected>-- Choisir une langue --</option>
                            @foreach($langues as $langue)
                                <option value="{{ $langue }}" {{ old('langue') == $langue ? 'selected' : '' }}>
                                    {{ ucfirst($langue) }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">
                            <i class="bi bi-mortarboard me-2"></i>Niveau
                        </label>
                        <select name="id_niveau" class="form-select form-select-lg rounded-3" required>
                            <option value="" disabled selected>-- Choisir un niveau --</option>
                            @foreach($niveaux as $niveau)
                                <option value="{{ $niveau->id }}" {{ old('id_niveau') == $niveau->id ? 'selected' : '' }}>
                                    {{ $niveau->nom_niveau }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="modal-footer bg-light py-3">
                    <button type="button" class="btn btn-secondary rounded-3" data-bs-dismiss="modal">
                        <i class="bi bi-x-circle me-2"></i>Annuler
                    </button>
                    <button type="submit" class="btn btn-primary rounded-3">
                        <i class="bi bi-check-circle me-2"></i>Enregistrer
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>
