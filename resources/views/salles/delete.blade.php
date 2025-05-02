
<i class="bi bi-trash cursor-pointer" data-bs-toggle="modal" data-bs-target="#deleteSalleModalLabel{{$salle->id}}"></i>


<div class="modal fade" id="deleteSalleModalLabel{{$salle->id}}" tabindex="-1" aria-labelledby="deleteSalleModalLabel{{$salle->id}}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-4">

         
            <div class="modal-header bg-danger text-white rounded-top-4 py-3">
                <h5 class="modal-title mx-auto fw-bold" id="deleteSalleModalLabel{{$salle->id}}">
                    <i class="bi bi-exclamation-triangle me-2"></i> Confirmer la suppression
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Fermer"></button>
            </div>

            
            <div class="modal-body px-4 py-4 text-center">
                <p class="fs-5 mb-4">Voulez-vous vraiment supprimer <strong>cette salle</strong> ?</p>

                <form action="{{ route('salles.destroy', $salle) }}" method="POST">
                    @csrf
                    @method('DELETE')

                  
                    <div class="d-flex justify-content-center gap-3">
                        <button type="submit" class="btn btn-danger rounded-pill px-4">
                            <i class="bi bi-trash me-2"></i> Supprimer
                        </button>
                        <button type="button" class="btn btn-secondary rounded-pill px-4" data-bs-dismiss="modal">
                            <i class="bi bi-x-circle me-2"></i> Annuler
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
