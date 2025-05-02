<div class="mb-3">
    <button id="openCreateNiveauModal" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#createNiveauModal">
        <i class="bi bi-plus-circle me-2"></i> Ajouter un Niveau
    </button>
</div>

<div class="modal fade" id="createNiveauModal" aria-labelledby="createNiveauModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title" id="createNiveauModalLabel">Créer un Nouveau Niveau</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('niveaux.store') }}" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="nom_niveau" class="form-label">Nom du Niveau</label>
                        <select name="nom_niveau" class="form-control" required>
                            <option value="">-- Choisir un niveau --</option>
                            @foreach ($noms as $nom)
                                <option value="{{ $nom }}" {{ old('nom_niveau') == $nom ? 'selected' : '' }}>
                                    {{ $nom }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" class="form-control" rows="4">{{ old('description') }}</textarea>
                    </div>

                    <div class="form-group mb-3">
                        <label for="choix" class="form-label">Choix</label>
                        <select name="choix" class="form-control">
                            <option value="">-- Choisir un choix --</option>
                            @foreach ($choix as $c)
                                <option value="{{ $c }}" {{ old('choix') == $c ? 'selected' : '' }}>
                                    {{ $c }}
                                </option>
                            @endforeach
                        </select>
                    </div>

            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-success">Enregistrer</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
            </div>
            </form>
        </div>
    </div>
</div>
