<i class="bi bi-pencil-square cursor-pointer text-primary fs-5" data-bs-toggle="modal" data-bs-target="#editScolaireModal{{$annee->id}}"></i>

<div class="modal fade" id="editScolaireModal{{$annee->id}}" tabindex="-1" aria-labelledby="editScolaireModalLabel{{$annee->id}}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content shadow-lg rounded-4 border-0">

            <div class="modal-header bg-primary text-white rounded-top-4">
                <h5 class="modal-title mx-auto" id="editScolaireModalLabel{{$annee->id}}">Modifier Année Scolaire</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Fermer"></button>
            </div>

            <form action="{{ route('scolaires.update', $annee->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="modal-body p-4">

                    <div class="mb-3">
                        <label for="libelle{{$annee->id}}" class="form-label">Libellé</label>
                        <input type="text" name="libelle" id="libelle{{$annee->id}}" class="form-control rounded-3 shadow-sm" value="{{ old('libelle', $annee->libelle) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="date_debut{{$annee->id}}" class="form-label">Date début</label>
                        <input type="date" name="date_debut" id="date_debut{{$annee->id}}" class="form-control rounded-3 shadow-sm" value="{{ old('date_debut', $annee->date_debut) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="date_fin{{$annee->id}}" class="form-label">Date fin</label>
                        <input type="date" name="date_fin" id="date_fin{{$annee->id}}" class="form-control rounded-3 shadow-sm" value="{{ old('date_fin', $annee->date_fin) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="statut{{$annee->id}}" class="form-label">Statut</label>
                        <select name="statut" id="statut{{$annee->id}}" class="form-select rounded-3 shadow-sm" required>
                            <option value="active" {{ old('statut', $annee->statut) == 'active' ? 'selected' : '' }}>Active</option>
                            <option value="inactive" {{ old('statut', $annee->statut) == 'inactive' ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>

                </div>

                <div class="modal-footer justify-content-between px-4 py-3">
                    <button type="submit" class="btn btn-success rounded-pill px-4">💾 Mettre à jour</button>
                    <button type="button" class="btn btn-secondary rounded-pill px-4" data-bs-dismiss="modal">Annuler</button>
                </div>

            </form>

        </div>
    </div>
</div>
