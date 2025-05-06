<i class="bi bi-pencil-square cursor-pointer text-primary fs-5" data-bs-toggle="modal" data-bs-target="#editSalleModal{{$salle->id}}"></i>

<div class="modal fade" id="editSalleModal{{$salle->id}}" tabindex="-1" aria-labelledby="editSalleModalLabel{{$salle->id}}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content shadow-lg rounded-4 border-0">

            <div class="modal-header bg-primary text-white rounded-top-4">
                <h5 class="modal-title mx-auto" id="editSalleModalLabel{{$salle->id}}">Modifier une Salle</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Fermer"></button>
            </div>

            <form action="{{ route('salles.update', $salle->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="p-3">

                    <div class="form-group mb-3">
                        <label for="num_salle" class="form-label fw-bold">Numéro de salle</label>
                        <input type="text" name="num_salle" class="form-control form-control-lg" value="{{ old('num_salle', $salle->num_salle) }}" required>
                        @error('num_salle')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="type_salle" class="form-label fw-bold">Type de salle</label>
                        <select name="type_salle" class="form-select form-select-lg" required>
                            <option value="">-- Choisir un type de salle --</option>
                            @foreach($types_salles as $type)
                                <option value="{{ $type }}" {{ old('type_salle', $salle->type_salle) == $type ? 'selected' : '' }}>
                                    {{ $type }}
                                </option>
                            @endforeach
                        </select>
                        @error('type_salle')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
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
