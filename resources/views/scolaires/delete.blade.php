<i class="bi bi-trash cursor-pointer text-danger fs-5" data-bs-toggle="modal" data-bs-target="#deleteScolaireModal{{$annee->id}}"></i>

<div class="modal fade" id="deleteScolaireModal{{$annee->id}}" tabindex="-1" aria-labelledby="deleteScolaireModalLabel{{$annee->id}}" aria-hidden="true">
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
                <form action="{{ route('scolaires.remove', $annee->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger rounded-pill px-4">
                        <i class="bi bi-trash-fill me-1"></i> Supprimer
                    </button>
                </form>
                <button type="button" class="btn btn-secondary rounded-pill px-4" data-bs-dismiss="modal">
                    Annuler
                </button>
            </div>

        </div>
    </div>
</div>
