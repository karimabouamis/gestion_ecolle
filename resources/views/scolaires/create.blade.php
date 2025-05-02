<div class="mb-4">
    <button id="openCreateScolaireModal" data-bs-toggle="modal" data-bs-target="#createScolaireModal" class="btn btn-success btn-lg shadow">
        <i class="bi bi-plus-circle me-2"></i> Ajouter Année scolaire
    </button>
</div>


<div class="modal fade" id="createScolaireModal" tabindex="-1" aria-labelledby="createScolaireModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content shadow border-0">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title" id="createScolaireModalLabel">
                    <i class="bi bi-calendar-plus me-2"></i>Ajouter Année Scolaire
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Fermer"></button>
            </div>
            <div class="modal-body p-4">
                <form action="{{ route('scolaires.store') }}" method="POST">
                    @csrf
                    
                    <div class="mb-4">
                        <label for="libelle" class="form-label fw-bold">
                            <i class="bi bi-pencil me-2"></i>Libellé
                        </label>
                        <input type="text" name="libelle" id="libelle" 
                               class="form-control form-control-lg" 
                               placeholder="Ex: Année 2024-2025" 
                               value="{{ old('libelle') }}" required>
                    </div>
                    
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <label for="date_debut" class="form-label fw-bold">
                                <i class="bi bi-calendar me-2"></i>Date début
                            </label>
                            <input type="date" name="date_debut" id="date_debut" 
                                   class="form-control" 
                                   value="{{ old('date_debut') }}" required>
                        </div>
                        
                        <div class="col-md-6">
                            <label for="date_fin" class="form-label fw-bold">
                                <i class="bi bi-calendar me-2"></i>Date fin
                            </label>
                            <input type="date" name="date_fin" id="date_fin" 
                                   class="form-control" 
                                   value="{{ old('date_fin') }}" required>
                        </div>
                    </div>
                    
                    <div class="mb-4">
                        <label for="statut" class="form-label fw-bold">
                            <i class="bi bi-toggle-on me-2"></i>Statut
                        </label>
                        <select name="statut" id="statut" 
                                class="form-select" required>
                            <option value="" disabled selected>-- Sélectionner un statut --</option>
                            <option value="active" {{ old('statut') == 'active' ? 'selected' : '' }}>
                                Active
                            </option>
                            <option value="inactive" {{ old('statut') == 'inactive' ? 'selected' : '' }}>
                                Inactive
                            </option>
                        </select>
                    </div>
                    
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4 border-top pt-3">
                        <a href="{{ route('scolaires.index') }}" class="btn btn-secondary me-md-2" data-bs-dismiss="modal">
                            <i class="bi bi-x-circle me-2"></i>Annuler
                        </a>
                        <button type="submit" class="btn btn-success">
                            <i class="bi bi-check-circle me-2"></i>Enregistrer
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>