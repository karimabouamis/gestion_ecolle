<div class="mb-3">
    <button id="openCreateClasseModal" data-bs-toggle="modal" data-bs-target="#createClasseModal" class="btn btn-success">
        <i class="bi bi-plus-circle"></i> + Ajouter une Classe
    </button>
</div>

<!-- Modal Créer Classe -->
<div class="modal fade" id="createClasseModal" tabindex="-1" aria-labelledby="createClasseModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">

            <!-- Header Modal -->
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title" id="createClasseModalLabel">
                    <i class="bi bi-plus-circle"></i> Ajouter une Classe
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
            </div>

            <!-- Corps du Modal -->
            <div class="modal-body">
                <form action="{{ route('classe.store') }}" method="POST" id="formID">
                    @csrf

                    <!-- Description -->
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <input type="text" name="description" id="description" class="form-control" placeholder="Entrer la description" required>
                    </div>

                    <!-- Niveau -->
                    <div class="mb-3">
                        <label for="id_niveau" class="form-label">Niveau</label>
                        <select name="id_niveau" id="id_niveau" class="form-select" required>
                            <option value="">--- Choisir un niveau ---</option>
                            @foreach ($niveaux as $niveau)
                                <option value="{{ $niveau->id }}">{{ $niveau->nom_niveau }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Année Scolaire -->
                    <div class="mb-3">
                        <label for="id_annee_scolaire" class="form-label">Année Scolaire</label>
                        <select name="id_annee_scolaire" id="id_annee_scolaire" class="form-select" required>
                            <option value="">--- Choisir une année scolaire ---</option>
                            @foreach ($annees as $annee)
                                <option value="{{ $annee->id }}">
                                    {{ date('d-m-Y', strtotime($annee->date_debut)) }} - {{ date('d-m-Y', strtotime($annee->date_fin)) }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                </form>
            </div>

            <!-- Footer Modal -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                <button type="submit" form="formID" class="btn btn-primary">Sauvegarder</button>
            </div>

        </div>
    </div>
</div>
