<i class="bi bi-trash cursor-pointer text-danger fs-5" data-bs-toggle="modal" data-bs-target="#deleteSalleModal{{$salle->id}}"></i>

<div class="modal fade" id="deleteSalleModal{{$salle->id}}" tabindex="-1" aria-labelledby="deleteSalleModalLabel{{$salle->id}}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow rounded-3">

            <div class="modal-header bg-danger text-white py-3">
                <h5 class="modal-title fw-bold" id="deleteSalleModalLabel{{$salle->id}}">
                    <i class="bi bi-trash me-2"></i>Supprimer la salle
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Fermer"></button>
            </div>

            <form action="{{ route('salles.destroy', $salle) }}" method="POST">
                @csrf
                @method('DELETE')

                <div class="modal-body p-4">
                    <p class="fs-5">
                        Voulez-vous vraiment supprimer <strong class="text-danger">cette salle</strong> ?
                    </p>
                    <p class="text-muted mb-0">
                        Cette action est <strong>irréversible</strong>.
                    </p>
                </div>

                <div class="modal-footer bg-light py-3">
                    <button type="button" class="btn btn-secondary rounded-3" data-bs-dismiss="modal">
                        <i class="bi bi-x-circle me-2"></i>Annuler
                    </button>
                    <button type="submit" class="btn btn-danger rounded-3">
                        <i class="bi bi-trash me-2"></i>Supprimer
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>
