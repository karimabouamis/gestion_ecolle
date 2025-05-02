<i class="bi bi-pencil-square cursor-pointer" data-bs-toggle="modal" data-bs-target="#editSalleModal{{$salle->id}}"></i>

<div class="modal fade" id="editSalleModal{{$salle->id}}" aria-labelledby="editSalleModalLabel{{$salle->id}}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content shadow rounded-3">


            <form action="{{ route('salles.update', $salle->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="modal-body">

                    <div class="mb-3">
                        <label for="num_salle" class="form-label fw-bold">Numéro de salle</label>
                        <input type="text" name="num_salle" class="form-control" value="{{ old('num_salle', $salle->num_salle) }}" required>
                        @error('num_salle')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="type_salle" class="form-label fw-bold">Type de salle</label>
                        <select name="type_salle" class="form-select" required>
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

                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">
                    Enregistrer
                    </button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Annuler
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>
