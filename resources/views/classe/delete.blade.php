
<i class="bi bi-trash" data-bs-toggle="modal" data-bs-target="#deleteClasseModal{{$classe->id}}"></i>

<div class="modal fade" id="deleteClasseModal{{$classe->id}}" aria-labelledby="deleteClasseModal{{$classe->id}}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteClasseModalLabel{{$classe->id}}">
                   Supprimer une Classe
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form action="{{ route('classe.destroy', $classe->id) }}" method="POST" style="display:inline-block;"> 
                            @csrf 
                            @method('DELETE') 
                            <p>Êtes-vous sûr de vouloir supprimer ce classe<br><strong>{{ $classe->description}}</strong> ?</p>

                      
        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-primary">Supprimer</button>
                    </div>
    </form>
                   
            </div>
        </div>
    </div>
</div>