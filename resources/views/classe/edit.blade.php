
<i class="bi bi-pencil-square" data-bs-toggle="modal" data-bs-target="#editClasseModal{{$classe->id}}"></i>


<div class="modal fade" id="editClasseModal{{$classe->id}}" aria-labelledby="editClasseModal{{$classe->id}}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editClasseModal{{$classe->id}}">
                    modifier une Classe
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form method="POST" action="{{ route('classe.update', $classe->id) }}" class="p-4 border rounded bg-light">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <input type="text" id="description" name="description" value="{{ old('description', $classe->description) }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="id_niveau" class="form-label">Niveau</label>
            <select name="id_niveau" id="id_niveau" class="form-control" required>
                <option value="">--- Choisir un niveau ---</option>
                @foreach ($niveaux as $niveau)
                    <option value="{{ $niveau->id }}" {{ $classe->id_niveau == $niveau->id ? 'selected' : '' }}>
                        {{ $niveau->nom_niveau }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="id_annee_scolaire" class="form-label">Année Scolaire</label>
            <select name="id_annee_scolaire" id="id_annee_scolaire" class="form-control" required>
                <option value="">--- Choisir une année scolaire ---</option>
                @foreach ($annees as $annee)
                    <option value="{{ $annee->id }}" {{ $classe->id_annee_scolaire == $annee->id ? 'selected' : '' }}>
                        {{ date('d-m-Y',strtotime($annee->date_debut)) }} - {{ date('d-m-Y', strtotime($annee->date_fin)) }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-primary">Modifier</button>
                    </div>
    </form>

                   
            </div>
        </div>
    </div>
</div>