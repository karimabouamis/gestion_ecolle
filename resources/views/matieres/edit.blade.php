<i class="bi bi-pencil-square text-primary fs-5 cursor-pointer" data-bs-toggle="modal" data-bs-target="#editMatiereModal{{$matiere->id}}"></i>

<div class="modal fade" id="editMatiereModal{{$matiere->id}}" aria-labelledby="editMatiereModalLabel{{$matiere->id}}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow rounded-3">

         
            <div class="modal-header bg-warning text-dark py-3">
                <h5 class="modal-title fw-bold" id="editMatiereModalLabel{{$matiere->id}}">
                    <i class="bi bi-pencil-square me-2"></i>Modifier la Matière
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
            </div>

            <form action="{{ route('matieres.update', $matiere) }}" method="POST">
                @csrf
                @method('PUT')

             
                <div class="modal-body p-4">
                    <div class="mb-4">
                        <label class="form-label fw-bold">
                            <i class="bi bi-book me-2"></i>Nom de la matière
                        </label>
                        <input type="text" name="nom_matiere" value="{{ old('nom_matiere', $matiere->nom_matiere) }}" class="form-control form-control-lg rounded-3" placeholder="Ex: Mathématiques" required>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold">
                            <i class="bi bi-123 me-2"></i>Coefficient
                        </label>
                        <input type="number" name="coefficient" value="{{ old('coefficient', $matiere->coefficient) }}" class="form-control form-control-lg rounded-3" placeholder="Ex: 4" step="1" required>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold">
                            <i class="bi bi-translate me-2"></i>Langue
                        </label>
                        <select name="langue" class="form-select form-select-lg rounded-3" required>
                            <option value="" disabled>-- Choisir une langue --</option>
                            @foreach($langues as $langue)
                                <option value="{{ $langue }}" {{ old('langue', $matiere->langue) == $langue ? 'selected' : '' }}>
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
                            <option value="" disabled>-- Choisir un niveau --</option>
                            @foreach($niveaux as $niveau)
                                <option value="{{ $niveau->id }}" {{ old('id_niveau', $matiere->id_niveau) == $niveau->id ? 'selected' : '' }}>
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
                    <button type="submit" class="btn btn-warning text-dark rounded-3">
                        <i class="bi bi-check-circle me-2"></i>Modifier
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>
