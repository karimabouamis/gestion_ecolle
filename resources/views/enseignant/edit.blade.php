
<i class="bi bi-pencil-square" data-bs-toggle="modal" data-bs-target="#editEleveModal{{$enseignant->id}}"></i>
<div class="modal fade" id="editEseignantModal{{$enseignant->id}}" aria-labelledby="editEseignantModalLabel{{$enseignant->id}}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editEseignantModalLabel{{$enseignant->id}}">
                    modifier un Enseignant
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form action="{{ route('enseignant.update', $enseignant->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nom" class="form-label">Nom</label>
            <input type="text" class="form-control" id="nom" name="nom" value="{{ old('nom', $enseignant->nom) }}" required>
        </div>

        <div class="mb-3">
            <label for="prenom" class="form-label">Prénom</label>
            <input type="text" class="form-control" id="prenom" name="prenom" value="{{ old('prenom', $enseignant->prenom) }}" required>
        </div>

        <div class="mb-3">
            <label for="adresse" class="form-label">Adresse</label>
            <textarea class="form-control" id="adresse" name="adresse">{{ old('adresse', $enseignant->adresse) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $enseignant->email) }}">
        </div>

        <div class="mb-3">
            <label for="tel" class="form-label">Téléphone</label>
            <input type="text" class="form-control" id="tel" name="tel" value="{{ old('tel', $enseignant->tel) }}">
        </div>

        <div class="mb-3">
            <label for="photo" class="form-label">Photo</label>
            <input type="file" class="form-control" id="photo" name="photo">
            @if ($enseignant->photo)
                <img src="{{ asset('storage/' . $enseignant->photo) }}" width="100" class="mt-2">
            @endif
        </div>

        <button type="submit" class="btn btn-success">Modifier</button>
        <a href="{{ route('enseignant.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
            
        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-primary">Modifier</button>
                    </div>
    </form>
                   
            </div>
        </div>
    </div>
</div>