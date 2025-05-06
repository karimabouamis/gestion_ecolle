<!-- Modal Suppression Evaluation -->
<button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteEvaluationModal{{ $evaluation->id }}">
    <i class="bi bi-trash"></i>
</button>

<div class="modal fade" id="deleteEvaluationModal{{ $evaluation->id }}" tabindex="-1" aria-labelledby="deleteEvaluationModalLabel{{ $evaluation->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content shadow border-0">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="deleteEvaluationModalLabel{{ $evaluation->id }}">
                    <i class="bi bi-exclamation-triangle me-2"></i> Confirmation de suppression
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Fermer"></button>
            </div>
            <div class="modal-body">
                <p class="fs-5 text-center">
                    Êtes-vous sûr(e) de vouloir supprimer cette évaluation ?<br>
                    <span class="fw-bold text-danger">{{ ucfirst($evaluation->type_evaluation) }} — {{ $evaluation->matiere?->nom_matiere }}</span>
                </p>
            </div>
            <div class="modal-footer border-top">
                <form action="{{ route('evaluations.destroy', $evaluation) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')

                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bi bi-x-circle me-1"></i> Annuler</button>
                    <button type="submit" class="btn btn-danger"><i class="bi bi-trash me-1"></i> Supprimer</button>
                </form>
            </div>
        </div>
    </div>
</div>
