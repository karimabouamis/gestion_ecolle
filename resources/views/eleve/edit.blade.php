<i class="bi bi-pencil-square cursor-pointer text-primary fs-5" data-bs-toggle="modal" data-bs-target="#editEleveModal{{$eleve->id}}"></i>

<div class="modal fade" id="editEleveModal{{$eleve->id}}" tabindex="-1" aria-labelledby="editEleveModalLabel{{$eleve->id}}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content shadow-lg rounded-4 border-0">

            <div class="modal-header bg-primary text-white rounded-top-4">
                <h5 class="modal-title mx-auto" id="editEleveModalLabel{{$eleve->id}}">Modifier Élève</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Fermer"></button>
            </div>

            <form action="{{ route('eleve.update', $eleve) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="p-3">

                    <div class="form-group mb-3">
                        <label>Nom</label>
                        <input type="text" name="nom" class="form-control" value="{{ old('nom', $eleve->nom) }}" required>
                    </div>

                    <div class="form-group mb-3">
                        <label>Prénom</label>
                        <input type="text" name="prenom" class="form-control" value="{{ old('prenom', $eleve->prenom) }}">
                    </div>

                    <div class="form-group mb-3">
                        <label>Adresse</label>
                        <input type="text" name="adresse" class="form-control" value="{{ old('adresse', $eleve->adresse) }}">
                    </div>

                    <div class="form-group mb-3">
                        <label>Genre</label>
                        <input type="text" name="genre" class="form-control" value="{{ old('genre', $eleve->genre) }}">
                    </div>

                    <div class="form-group mb-3">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" value="{{ old('email', $eleve->email) }}">
                    </div>

                    <div class="form-group mb-3">
                        <label>Téléphone</label>
                        <input type="text" name="tel" class="form-control" value="{{ old('tel', $eleve->tel) }}">
                    </div>

                    <div class="form-group mb-3">
                        <label>Classe</label>
                        <select name="id_classe" id="id_classe" class="form-control">
                            <option value="">Sélectionner une classe</option>
                            @foreach($classes as $classe)
                                <option value="{{ $classe->id }}" 
                                    {{ old('id_classe', $eleve->id_classe) == $classe->id ? 'selected' : '' }}>
                                    {{ $classe->description }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="photo" class="form-label">Photo</label>
                        <input type="file" class="form-control" id="photo" name="photo">
                        @if ($eleve->photo)
                            <img src="{{ asset('storage/' . $eleve->photo) }}" width="100" class="mt-2 rounded-3 border">
                        @endif
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-primary">Modifier</button>
                </div>
            </form>

        </div>
    </div>
</div>
