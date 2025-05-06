@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{ route('notes.index') }}" class="btn btn-secondary mb-3">
        <i class="bi bi-arrow-left-circle me-1"></i> Retour à la liste
    </a>
    <div class="modal fade show" id="deleteNoteModal" tabindex="-1" aria-labelledby="deleteNoteModalLabel" style="display: block;" aria-modal="true" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <form action="{{ route('notes.destroy', $note->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <div class="modal-header bg-danger text-white">
              <h5 class="modal-title" id="deleteNoteModalLabel">Confirmer la suppression</h5>
            </div>

            <div class="modal-body">
              <p>⚠️ Êtes-vous sûr de vouloir <strong>supprimer cette note</strong> ?</p>

              <ul class="list-group mb-3">
                <li class="list-group-item"><strong>Élève:</strong> {{ $note->eleve->nom }} {{ $note->eleve->prenom }}</li>
                <li class="list-group-item"><strong>Évaluation:</strong> {{ $note->evaluation->titre }}</li>
                <li class="list-group-item"><strong>Valeur:</strong> {{ $note->valeur }}</li>
                @if($note->observation)
                  <li class="list-group-item"><strong>Observation:</strong> {{ $note->observation }}</li>
                @endif
              </ul>

              <p class="text-danger">Cette action est irréversible.</p>
            </div>

            <div class="modal-footer">
              <a href="{{ route('notes.index') }}" class="btn btn-secondary">Annuler</a>
              <button type="submit" class="btn btn-danger">
                <i class="bi bi-trash me-1"></i> Supprimer
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var myModal = new bootstrap.Modal(document.getElementById('deleteNoteModal'), {
            backdrop: 'static',
            keyboard: false
        });
        myModal.show();
    });
</script>

@endsection
