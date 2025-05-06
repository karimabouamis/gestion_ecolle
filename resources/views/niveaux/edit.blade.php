<i class="bi bi-pencil-square cursor-pointer text-primary fs-5" data-bs-toggle="modal" data-bs-target="#editNiveauModal{{$niveau->id}}"></i>

<div class="modal fade" id="editNiveauModal{{$niveau->id}}" tabindex="-1" aria-labelledby="editNiveauModalLabel{{$niveau->id}}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content shadow-lg rounded-4 border-0">

            <div class="modal-header bg-primary text-white rounded-top-4">
                <h5 class="modal-title mx-auto" id="editNiveauModalLabel{{$niveau->id}}">Modifier un Niveau</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Fermer"></button>
            </div>

            <form action="{{ route('niveaux.update', $niveau) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="p-3">

                    <div class="form-group mb-3">
                        <label for="nom_niveau" class="form-label fw-bold">Nom du Niveau</label>
                        <select name="nom_niveau" class="form-select form-select-lg" required>
                            <option value="">-- Choisir un niveau --</option>
                            @foreach ($noms as $nom)
                                <option value="{{ $nom }}" {{ old('nom_niveau', $niveau->nom_niveau) == $nom ? 'selected' : '' }}>
                                    {{ $nom }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label for="description" class="form-label fw-bold">Description</label>
                        <textarea name="description" class="form-control form-control-lg" rows="3">{{ old('description', $niveau->description) }}</textarea>
                    </div>

                    <div class="form-group mb-3">
                        <label for="choix" class="form-label fw-bold">Choix</label>
                        <select name="choix" class="form-select form-select-lg" required>
                            <option value="">-- Choisir un choix --</option>
                            @foreach ($choix as $c)
                                <option value="{{ $c }}" {{ old('choix', $niveau->choix) == $c ? 'selected' : '' }}>
                                    {{ $c }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                </div>

                <div class="modal-footer justify-content-between px-4 py-3">
                    <button type="submit" class="btn btn-success rounded-pill px-4">💾 Mettre à jour</button>
                    <button type="button" class="btn btn-secondary rounded-pill px-4" data-bs-dismiss="modal">Annuler</button>
                </div>

            </form>

        </div>
    </div>
</div>
