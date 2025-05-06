<!-- Modal Edition Evaluation -->
<button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editEvaluationModal{{ $evaluation->id }}">
    <i class="bi bi-pencil-square"></i>
</button>

<div class="modal fade" id="editEvaluationModal{{ $evaluation->id }}" tabindex="-1" aria-labelledby="editEvaluationModalLabel{{ $evaluation->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content shadow border-0">
            <div class="modal-header bg-warning text-white">
                <h5 class="modal-title" id="editEvaluationModalLabel{{ $evaluation->id }}">
                    <i class="bi bi-pencil-square me-2"></i> Modifier l'Évaluation
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Fermer"></button>
            </div>
            <div class="modal-body p-4">
                <form action="{{ route('evaluations.update', $evaluation) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-bold">📅 Date d'évaluation</label>
                            <input type="date" name="date_evaluation" value="{{ old('date_evaluation', $evaluation->date_evaluation) }}" class="form-control form-control-lg" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-bold">⏰ Heure d'évaluation</label>
                            <input type="time" name="heure_evaluation" value="{{ old('heure_evaluation', $evaluation->heure_evaluation) }}" class="form-control form-control-lg">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-bold">📋 Type d'évaluation</label>
                            <select name="type_evaluation" class="form-select form-select-lg" required>
                                @foreach($types as $type)
                                    <option value="{{ $type }}" {{ (old('type_evaluation', $evaluation->type_evaluation) == $type) ? 'selected' : '' }}>{{ ucfirst($type) }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-bold">📚 Matière</label>
                            <select name="id_matiere" class="form-select form-select-lg" required>
                                @foreach($matieres as $matiere)
                                    <option value="{{ $matiere->id }}" {{ (old('id_matiere', $evaluation->id_matiere) == $matiere->id) ? 'selected' : '' }}>{{ $matiere->nom_matiere }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-bold">🏫 Classe</label>
                            <select name="id_classe" class="form-select form-select-lg" required>
                                @foreach($classes as $classe)
                                    <option value="{{ $classe->id }}" {{ (old('id_classe', $evaluation->id_classe) == $classe->id) ? 'selected' : '' }}>{{ $classe->nom_classe }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-bold">👨‍🏫 Enseignant</label>
                            <select name="id_enseignant" class="form-select form-select-lg" required>
                                @foreach($enseignants as $enseignant)
                                    <option value="{{ $enseignant->id }}" {{ (old('id_enseignant', $evaluation->id_enseignant) == $enseignant->id) ? 'selected' : '' }}>{{ $enseignant->nom_enseignant }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end mt-4 border-top pt-3">
                        <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal"><i class="bi bi-x-circle me-1"></i> Annuler</button>
                        <button type="submit" class="btn btn-warning text-white"><i class="bi bi-check-circle me-1"></i> Mettre à jour</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
