<!-- أيقونة الحذف لفتح الـ Modal -->
<i class="bi bi-trash text-danger" data-bs-toggle="modal" data-bs-target="#deleteNiveauModalLabel{{$niveau->id}}"></i>

<!-- Modal Delete -->
<div class="modal fade" id="deleteNiveauModalLabel{{$niveau->id}}" aria-labelledby="deleteNiveauModalLabel{{$niveau->id}}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteNiveauModalLabel{{$niveau->id}}">
                    Supprimer un Niveau
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('niveaux.destroy', $niveau) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <p class="text-muted">Voulez-vous vraiment supprimer ce niveau <strong>{{ $niveau->nom_niveau }}</strong> ? Cette action est irréversible.</p>
              
            </div>
            <div class="modal-footer">
                
                <button type="submit" class="btn btn-danger btn-sm">
                    <i class="bi bi-trash"></i> Supprimer
                </button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
            </div>
            </form>
        </div>
    </div>
</div>
