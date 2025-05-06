<i class="bi bi-pencil-square text-primary fs-5 cursor-pointer" data-bs-toggle="modal" data-bs-target="#editEleveModal{{$eleve->id}}"></i>

<div class="modal fade" id="editEleveModal{{$eleve->id}}" aria-labelledby="editEleveModalLabel{{$eleve->id}}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow rounded-3">

            <div class="modal-header bg-primary text-white py-3">
                <h5 class="modal-title fw-bold" id="editEleveModalLabel{{$eleve->id}}">
                    <i class="bi bi-pencil-square me-2"></i>Modifier Élève
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
            </div>

            <form action="{{ route('eleve.update', $eleve) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="modal-body p-4">
                    <div class="mb-4">
                        <label class="form-label fw-bold">Nom</label>
                        <input type="text" name="nom" value="{{ old('nom', $eleve->nom) }}" class="form-control form-control-lg rounded-3" required>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold">Prénom</label>
                        <input type="text" name="prenom" value="{{ old('prenom', $eleve->prenom) }}" class="form-control form-control-lg rounded-3">
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold">Adresse</label>
                        <input type="text" name="adresse" value="{{ old('adresse', $eleve->adresse) }}" class="form-control form-control-lg rounded-3">
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold">Genre</label>
                        <input type="text" name="genre" value="{{ old('genre', $eleve->genre) }}" class="form-control form-control-lg rounded-3">
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold">Email</label>
                        <input type="email" name="email" value="{{ old('email', $eleve->email) }}" class="form-control form-control-lg rounded-3">
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold">Téléphone</label>
                        <input type="text" name="tel" value="{{ old('tel', $eleve->tel) }}" class="form-control form-control-lg rounded-3">
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold">Classe</label>
                        <select name="id_classe" class="form-select form-select-lg rounded-3">
                            <option value="" disabled>-- Sélectionner une classe --</option>
                            @foreach($classes as $classe)
                                <option value="{{ $classe->id }}" {{ old('id_classe', $eleve->id_classe) == $classe->id ? 'selected' : '' }}>
                                    {{ $classe->description }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold">Photo</label>
                        <input type="file" name="photo" class="form-control form-control-lg rounded-3">
                        @if ($eleve->photo)
                            <img src="{{ asset('storage/' . $eleve->photo) }}" width="100" class="mt-2 rounded-3 border">
                        @endif
                    </div>

                </div>

                <div class="modal-footer bg-light py-3">
                    <button type="button" class="btn btn-secondary rounded-3" data-bs-dismiss="modal">
                        <i class="bi bi-x-circle me-2"></i>Annuler
                    </button>
                    <button type="submit" class="btn btn-success text-white rounded-3">
                        <i class="bi bi-check-circle me-2"></i>Modifier
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>
