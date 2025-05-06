<i class="bi bi-trash cursor-pointer text-danger fs-5" data-bs-toggle="modal" data-bs-target="#deleteEnseignantModal{{$enseignant->id}}"></i>

<div class="modal fade" id="deleteEnseignantModal{{$enseignant->id}}" tabindex="-1" aria-labelledby="deleteEnseignantModalLabel{{$enseignant->id}}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-4">

            <div class="modal-header bg-danger text-white rounded-top-4 py-3">
                <h5 class="modal-title mx-auto fw-bold" id="deleteEnseignantModalLabel{{$enseignant->id}}">
                    <i class="bi bi-exclamation-triangle me-2"></i> Confirmer la suppression
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Fermer"></button>
            </div>

            <form action="{{ route('enseignant.destroy', $enseignant->id) }}" method="POST">
                @csrf
                @method('DELETE')

                <div class="modal-body p-4 text-center">
                    <p class="fs-5">
                        Voulez-vous vraiment supprimer l'enseignant <strong class="text-danger">{{ $enseignant->nom }}</strong> ?
                    </p>
                    <p class="text-muted mb-0">Cette action est <strong>irréversible</strong>.</p>
                </div>

                <div class="modal-footer bg-light py-3 d-flex justify-content-center gap-3">
                    <button type="button" class="btn btn-secondary rounded-3 px-4" data-bs-dismiss="modal">
                        <i class="bi bi-x-circle me-2"></i>Annuler
                    </button>
                    <button type="submit" class="btn btn-danger rounded-3 px-4">
                        <i class="bi bi-trash me-2"></i>Supprimer
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>
