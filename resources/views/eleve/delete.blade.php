<i class="bi bi-trash cursor-pointer text-danger fs-5" data-bs-toggle="modal" data-bs-target="#deleteEleveModal{{$annee->id}}"></i>

<div class="modal fade" id="deleteEleveModal{{$annee->id}}" tabindex="-1" aria-labelledby="deleteEleveModal{{$annee->id}}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content shadow-lg rounded-4 border-0">

            <div class="modal-header bg-danger text-white rounded-top-4">
                <h5 class="modal-title mx-auto" id="deleteScolaireModalLabel{{$annee->id}}">
                    <i class="bi bi-exclamation-triangle-fill me-2"></i> Confirmer la suppression
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Fermer"></button>
            </div>

            <div class="modal-body text-center py-4">
                <p class="fs-5">Voulez-vous vraiment supprimer <strong>l'année scolaire "{{ $annee->libelle }}"</strong> ?</p>
                <p class="text-danger"><i class="bi bi-exclamation-circle-fill me-1"></i> Cette action est irréversible.</p>
            </div>

            <div class="modal-footer justify-content-between px-4 py-3">
            <form action="{{ route('eleve.destroy', $eleve) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <div class="modal-body text-center d-flex flex-column align-items-center justify-content-center">
                <p>Êtes-vous sûr de vouloir supprimer eleve <br><strong>{{ $eleve->nom}}</strong> ?</p>
            </div>
        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-primary">Supprimer</button>
                    </div>
    </form>
            
                <button type="button" class="btn btn-secondary rounded-pill px-4" data-bs-dismiss="modal">
                    Annuler
                </button>
            </div>

        </div>
    </div>
</div>
