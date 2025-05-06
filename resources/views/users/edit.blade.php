<div class="modal fade" id="editUserModal{{ $user->id }}" tabindex="-1"
    aria-labelledby="editUserModalLabel{{ $user->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h5 class="modal-title" id="editUserModalLabel{{ $user->id }}">Modifier l'utilisateur</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nom{{ $user->id }}" class="form-label">Nom</label>
                        <input type="text" class="form-control" id="nom{{ $user->id }}" name="nom"
                            value="{{ $user->nom }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="prenom{{ $user->id }}" class="form-label">Prénom</label>
                        <input type="text" class="form-control" id="prenom{{ $user->id }}" name="prenom"
                            value="{{ $user->prenom }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="adresse{{ $user->id }}" class="form-label">Adresse</label>
                        <input type="text" class="form-control" id="adresse{{ $user->id }}" name="adresse"
                            value="{{ $user->adresse }}">
                    </div>
                    <div class="mb-3">
                        <label for="email{{ $user->id }}" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email{{ $user->id }}" name="email"
                            value="{{ $user->email }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="tel{{ $user->id }}" class="form-label">Téléphone</label>
                        <input type="text" class="form-control" id="tel{{ $user->id }}" name="tel"
                            value="{{ $user->tel }}">
                    </div>
                    <div class="mb-3">
                        <label for="role{{ $user->id }}" class="form-label">Rôle</label>
                        <select class="form-select" id="role{{ $user->id }}" name="role" required>
                            <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                            <option value="enseignant" {{ $user->role == 'enseignant' ? 'selected' : '' }}>Enseignant
                            </option>
                            <option value="eleve" {{ $user->role == 'eleve' ? 'selected' : '' }}>Élève</option>
                            <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>Utilisateur</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-primary">Sauvegarder</button>
                </div>
            </form>
        </div>
    </div>
</div>