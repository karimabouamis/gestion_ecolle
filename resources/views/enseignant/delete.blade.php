

<i class="bi bi-trash" data-bs-toggle="modal" data-bs-target="#deleteEnseignantModal{{$enseignant->id}}"></i>

<div class="modal fade" id="deleteEnseignantModal{{$enseignant->id}}" aria-labelledby="deleteEnseignantModal{{$enseignant->id}}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteEnseignantModal{{$enseignant->id}}">
                   Supprimer un Enseignant
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form action="{{ route('enseignant.destroy', $enseignant->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <div> <p>Êtes-vous sûr de vouloir supprimer enseignant <br><strong>{{$enseignant->nom}}</strong>?</p></div>
                        
        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-primary">Supprimer</button>
                    </div>
    </form>
                   
            </div>
        </div>
    </div>
</div>