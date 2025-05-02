<div class="mb-4">
    <button id="openCreateEleveModal" data-bs-toggle="modal" data-bs-target="#createEleveModal" class="btn btn-success btn-lg shadow">
        <i class="bi bi-plus-circle me-2"></i> Ajouter Eleve
    </button>
</div>
<div class="modal fade" id="createEleveModal" tabindex="-1" aria-labelledby="createEleveModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content shadow border-0">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title" id="createEleveModalLabel">
                    <i class="bi bi-person-plus me-2"></i>Ajouter Eleve
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Fermer"></button>
            </div>
            <div class="modal-body p-4">
                <form action="{{ route('eleve.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <label for="nom" class="form-label fw-bold">
                            <i class="bi bi-person me-2"></i>Nom
                        </label>
                        <input type="text" name="nom" class="form-control form-control-lg" value="{{ old('nom') }}" required>
                    </div>

                    <div class="mb-4">
                        <label for="prenom" class="form-label fw-bold">
                            <i class="bi bi-person-lines-fill me-2"></i>Prénom
                        </label>
                        <input type="text" name="prenom" class="form-control form-control-lg" value="{{ old('prenom') }}" required>
                    </div>

                    <div class="mb-4">
                        <label for="adresse" class="form-label fw-bold">
                            <i class="bi bi-house-door me-2"></i>Adresse
                        </label>
                        <input type="text" name="adresse" class="form-control form-control-lg" value="{{ old('adresse') }}" required>
                    </div>

                    <div class="mb-4">
                        <label for="genre" class="form-label fw-bold">
                            <i class="bi bi-gender-ambiguous me-2"></i>Genre
                        </label>
                        <select name="genre" id="genre" class="form-select form-select-lg" required>
                            <option value="">-- Sélectionner le genre --</option>
                            <option value="Homme" {{ old('genre') == 'Homme' ? 'selected' : '' }}>Homme</option>
                            <option value="Femme" {{ old('genre') == 'Femme' ? 'selected' : '' }}>Femme</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="email" class="form-label fw-bold">
                            <i class="bi bi-envelope me-2"></i>Email
                        </label>
                        <input type="email" name="email" class="form-control form-control-lg" value="{{ old('email') }}" required>
                    </div>

                    <div class="mb-4">
                        <label for="tel" class="form-label fw-bold">
                            <i class="bi bi-telephone me-2"></i>Téléphone
                        </label>
                        <input type="text" name="tel" class="form-control form-control-lg" value="{{ old('tel') }}" required>
                    </div>

                    <div class="mb-4">
                        <label for="id_classe" class="form-label fw-bold">
                            <i class="bi bi-building me-2"></i>Classe
                        </label>
                        <select name="id_classe" id="id_classe" class="form-select form-select-lg">
                            <option value="">-- Sélectionner une classe --</option>
                            @foreach ($classes as $classe)
                                <option value="{{ $classe->id }}">{{ $classe->description }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="photo" class="form-label fw-bold">
                            <i class="bi bi-image me-2"></i>Photo
                        </label>
                        <input type="file" name="photo" class="form-control form-control-lg" id="photo">
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