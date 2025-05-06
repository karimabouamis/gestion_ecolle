<div class="mb-4">
    <button id="openCreateEnseignantModal" data-bs-toggle="modal" data-bs-target="#createEnseignantModal" class="btn btn-success btn-lg shadow">
        <i class="bi bi-person-plus me-2"></i> Ajouter un Enseignant
    </button>
</div>

<div class="modal fade" id="createEnseignantModal" tabindex="-1" aria-labelledby="createEnseignantModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content shadow border-0">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title" id="createEnseignantModalLabel">
                    <i class="bi bi-person-plus me-2"></i>Créer un Enseignant
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Fermer"></button>
            </div>
            <div class="modal-body p-4">
                <form action="{{ route('enseignant.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-4">
                        <label for="nom" class="form-label fw-bold"><i class="bi bi-person me-2"></i>Nom</label>
                        <input type="text" class="form-control form-control-lg" id="nom" name="nom" value="{{ old('nom') }}" required>
                    </div>

                    <div class="mb-4">
                        <label for="prenom" class="form-label fw-bold"><i class="bi bi-person-vcard me-2"></i>Prénom</label>
                        <input type="text" class="form-control form-control-lg" id="prenom" name="prenom" value="{{ old('prenom') }}" required>
                    </div>

                    <div class="mb-4">
                        <label for="adresse" class="form-label fw-bold"><i class="bi bi-geo-alt me-2"></i>Adresse</label>
                        <textarea class="form-control form-control-lg" id="adresse" name="adresse">{{ old('adresse') }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label for="email" class="form-label fw-bold"><i class="bi bi-envelope me-2"></i>Email</label>
                        <input type="email" class="form-control form-control-lg" id="email" name="email" value="{{ old('email') }}">
                    </div>

                    <div class="mb-4">
                        <label for="tel" class="form-label fw-bold"><i class="bi bi-telephone me-2"></i>Téléphone</label>
                        <input type="text" class="form-control form-control-lg" id="tel" name="tel" value="{{ old('tel') }}">
                    </div>

                    <div class="mb-4">
                        <label for="photo" class="form-label fw-bold"><i class="bi bi-image me-2"></i>Photo</label>
                        <input type="file" class="form-control form-control-lg" id="photo" name="photo">
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
