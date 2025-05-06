@extends('layouts.app')
@section('content')


<div class="container">
    <a href="{{ route('notes.index') }}" class="btn btn-secondary mb-3">
        <i class="bi bi-arrow-left-circle me-1"></i> Retour à la liste
    </a>    
    <div class="modal fade show" id="editNoteModal" tabindex="-1" aria-labelledby="editNoteModalLabel" style="display: block;" aria-modal="true" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <form action="{{ route('notes.update', $note->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="modal-header bg-warning text-dark">
              <h5 class="modal-title" id="editNoteModalLabel">Modifier la Note</h5>
            </div>

            <div class="modal-body">
              @if ($errors->any())
                  <div class="alert alert-danger">
                      <strong>Erreurs :</strong>
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
              @endif

              <div class="mb-3">
                <label class="form-label">Élève <span class="text-danger">*</span></label>
                <select name="id_eleve" class="form-select" required>
                  <option value="">Sélectionner un élève</option>
                  @foreach ($eleves as $eleve)
                    <option value="{{ $eleve->id }}" {{ (old('id_eleve', $note->id_eleve) == $eleve->id) ? 'selected' : '' }}>
                      {{ $eleve->nom }} {{ $eleve->prenom }}
                    </option>
                  @endforeach
                </select>
              </div>

              <div class="mb-3">
                <label class="form-label">Évaluation <span class="text-danger">*</span></label>
                <select name="id_evaluation" class="form-select" required>
                  <option value="">Sélectionner une évaluation</option>
                  @foreach ($evaluations as $evaluation)
                    <option value="{{ $evaluation->id }}" {{ (old('id_evaluation', $note->id_evaluation) == $evaluation->id) ? 'selected' : '' }}>
                      {{ $evaluation->titre }}
                    </option>
                  @endforeach
                </select>
              </div>

              <div class="mb-3">
                <label class="form-label">Valeur <span class="text-danger">*</span></label>
                <input type="number" step="0.01" name="valeur" class="form-control" value="{{ old('valeur', $note->valeur) }}" required>
              </div>

              <div class="mb-3">
                <label class="form-label">Observation</label>
                <textarea name="observation" class="form-control">{{ old('observation', $note->observation) }}</textarea>
              </div>

            </div>

            <div class="modal-footer">
              <a href="{{ route('notes.index') }}" class="btn btn-secondary">Annuler</a>
              <button type="submit" class="btn btn-success">
                <i class="bi bi-save me-1"></i> Mettre à jour
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var myModal = new bootstrap.Modal(document.getElementById('editNoteModal'), {
            backdrop: 'static',
            keyboard: false
        });
        myModal.show();
    });
</script>

@endsection
