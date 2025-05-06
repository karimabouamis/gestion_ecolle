<div class="mb-4">
    <button id="openCreateClasseModal" data-bs-toggle="modal" data-bs-target="#createClasseModal" class="btn btn-success btn-lg shadow">
        <i class="bi bi-plus-circle me-2"></i> Ajouter une Classe
    </button>
</div>

<!-- Modal Créer Classe -->
<div class="modal fade" id="createClasseModal" tabindex="-1" aria-labelledby="createClasseModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content shadow border-0">

            <!-- Header Modal -->
            <div class="modal-header bg-success text-white py-3">
                <h5 class="modal-title fw-bold" id="createClasseModalLabel">
                    <i class="bi bi-plus-circle me-2"></i>Ajouter une Classe
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Fermer"></button>
            </div>

            <!-- Corps du Modal -->
            <form action="{{ route('classe.store') }}" method="POST" id="formID">
                @csrf

                <div class="modal-body p-4">

                    <!-- Description -->
                    <div class="mb-4">
                        <label for="description" class="form-label fw-bold"><i class="bi bi-card-text me-2"></i>Description</label>
                        <input type="text" name="description" id="description" class="form-control form-control-lg rounded-3" placeholder="Entrer la description" required>
                    </div>

                    <!-- Niveau -->
                    <div class="mb-4">
                        <label for="id_niveau" class="form-label fw-bold"><i class="bi bi-layers me-2"></i>Niveau</label>
                        <select name="id_niveau" id="id_niveau" class="form-select form-select-lg rounded-3" required>
                            <option value="">--- Choisir un niveau ---</option>
                            @foreach ($niveaux as $niveau)
                                <option value="{{ $niveau->id }}">{{ $niveau->nom_niveau }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Année Scolaire -->
                    <div class="mb-4">
                        <label for="id_annee_scolaire" class="form-label fw-bold"><i class="bi bi-calendar-range me-2"></i>Année Scolaire</label>
                        <select name="id_annee_scolaire" id="id_annee_scolaire" class="form-select form-select-lg rounded-3" required>
                            <option value="">--- Choisir une année scolaire ---</option>
                            @foreach ($annees as $annee)
                                <option value="{{ $annee->id }}">
                                    {{ date('d-m-Y', strtotime($annee->date_debut)) }} - {{ date('d-m-Y', strtotime($annee->date_fin)) }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                </div>

                <!-- Footer Modal -->
                <div class="modal-footer bg-light py-3">
                    <button type="button" class="btn btn-secondary rounded-3" data-bs-dismiss="modal">
                        <i class="bi bi-x-circle me-2"></i>Annuler
                    </button>
                    <button type="submit" form="formID" class="btn btn-success rounded-3">
                        <i class="bi bi-check-circle me-2"></i>Sauvegarder
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>
