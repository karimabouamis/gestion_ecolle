
<div class="mb-4 text-end">
    <button id="openCreateSalleModal" data-bs-toggle="modal" data-bs-target="#createSalleModal" class="btn btn-success btn-lg shadow-sm rounded-pill px-4">
        <i class="bi bi-plus-circle me-2"></i> Ajouter une Salle
    </button>
</div>


<div class="modal fade" id="createSalleModal" tabindex="-1" aria-labelledby="createSalleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-4">

        
            <div class="modal-header bg-success text-white rounded-top-4 py-3">
                <h5 class="modal-title mx-auto fw-bold" id="createSalleModalLabel">
                    <i class="bi bi-door-open me-2"></i> Ajouter une Salle
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Fermer"></button>
            </div>

            <form action="{{ route('salles.store') }}" method="POST">
                @csrf

            
                <div class="modal-body px-4 py-4">

                    
                    <div class="mb-4">
                        <label class="form-label fw-semibold text-dark">
                            <i class="bi bi-123 me-2 text-success"></i> Numéro de salle
                        </label>
                        <input type="text" name="num_salle" class="form-control form-control-lg rounded-pill shadow-sm" 
                               placeholder="Ex: S101" value="{{ old('num_salle') }}" required>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-semibold text-dark">
                            <i class="bi bi-house-gear me-2 text-success"></i> Type de Salle
                        </label>
                        <select name="type_salle" class="form-select form-select-lg rounded-pill shadow-sm" required>
                            <option value="" disabled selected>-- Choisir un type de salle --</option>
                            @foreach($types_salles as $salle)
                                <option value="{{ $salle }}" {{ old('type_salle') == $salle ? 'selected' : '' }}>
                                    {{ $salle }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                </div>

            
                <div class="modal-footer bg-light rounded-bottom-4 py-3 d-flex justify-content-between">
                    <button type="button" class="btn btn-secondary rounded-pill px-4" data-bs-dismiss="modal">
                        <i class="bi bi-x-circle me-2"></i> Annuler
                    </button>
                    <button type="submit" class="btn btn-success rounded-pill px-4">
                        <i class="bi bi-check-circle me-2"></i> Enregistrer
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>
