<i class="bi bi-pencil-square cursor-pointer text-primary fs-5" data-bs-toggle="modal" data-bs-target="#editEnseignantModal{{$enseignant->id}}"></i>
<div class="modal fade" id="editEnseignantModal{{$enseignant->id}}" tabindex="-1" aria-labelledby="editEnseignantModal{{$enseignant->id}}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content shadow-lg rounded-4 border-0">

            <div class="modal-header bg-primary text-white rounded-top-4">
                <h5 class="modal-title mx-auto" id="editEnseignantModal{{$enseignant->id}}">Modifier une Classe</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Fermer"></button>
            </div>

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

        </div>
    </div>
</div>
