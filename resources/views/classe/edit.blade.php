<i class="bi bi-pencil-square cursor-pointer text-primary fs-5" data-bs-toggle="modal" data-bs-target="#editClasseModal{{$classe->id}}"></i>

<div class="modal fade" id="editClasseModal{{$classe->id}}" tabindex="-1" aria-labelledby="editClasseModalLabel{{$classe->id}}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content shadow-lg rounded-4 border-0">

            <div class="modal-header bg-primary text-white rounded-top-4">
                <h5 class="modal-title mx-auto" id="editClasseModalLabel{{$classe->id}}">Modifier une Classe</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Fermer"></button>
            </div>

            <form method="POST" action="{{ route('classe.update', $classe->id) }}">
                @csrf
                @method('PUT')

                <div class="p-3">

                    <div class="form-group mb-3">
                        <label for="description" class="form-label fw-bold">Description</label>
                        <input type="text" id="description" name="description" value="{{ old('description', $classe->description) }}" class="form-control form-control-lg" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="id_niveau" class="form-label fw-bold">Niveau</label>
                        <select name="id_niveau" id="id_niveau" class="form-select form-select-lg" required>
                            <option value="">--- Choisir un niveau ---</option>
                            @foreach ($niveaux as $niveau)
                                <option value="{{ $niveau->id }}" {{ old('id_niveau', $classe->id_niveau) == $niveau->id ? 'selected' : '' }}>
                                    {{ $niveau->nom_niveau }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label for="id_annee_scolaire" class="form-label fw-bold">Année Scolaire</label>
                        <select name="id_annee_scolaire" id="id_annee_scolaire" class="form-select form-select-lg" required>
                            <option value="">--- Choisir une année scolaire ---</option>
                            @foreach ($annees as $annee)
                                <option value="{{ $annee->id }}" {{ old('id_annee_scolaire', $classe->id_annee_scolaire) == $annee->id ? 'selected' : '' }}>
                                    {{ date('d-m-Y',strtotime($annee->date_debut)) }} - {{ date('d-m-Y', strtotime($annee->date_fin)) }}
                                </option>
                            @endforeach
                        </select>
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
