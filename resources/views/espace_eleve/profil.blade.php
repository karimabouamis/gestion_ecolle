
@extends('layouts.app')

@section('title', 'Mon Profil')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Mon Profil</h4>
                </div>

                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show m-3" role="alert">
                        {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                <div class="card-body">
                    <form method="POST" action="{{ route('eleve.updateProfil') }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <!-- Photo de profil -->
                            <div class="col-md-3 text-center mb-4">
                                <div class="profile-image-container mb-3">
                                    @if($eleve->photo)
                                        <img src="{{ asset('storage/photos/'.$eleve->photo) }}" alt="Photo de profil" class="img-thumbnail rounded-circle profile-image">
                                    @else
                                        <img src="{{ asset('images/default_avatar.png') }}" alt="Photo par défaut" class="img-thumbnail rounded-circle profile-image">
                                    @endif
                                </div>
                                
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input @error('photo') is-invalid @enderror" id="photo" name="photo">
                                    <label class="custom-file-label" for="photo">Changer la photo</label>
                                    @error('photo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Informations personnelles -->
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="nom">Nom</label>
                                        <input type="text" class="form-control @error('nom') is-invalid @enderror" id="nom" name="nom" value="{{ old('nom', $eleve->nom) }}" required>
                                        @error('nom')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    
                                    <div class="col-md-6 mb-3">
                                        <label for="prenom">Prénom</label>
                                        <input type="text" class="form-control @error('prenom') is-invalid @enderror" id="prenom" name="prenom" value="{{ old('prenom', $eleve->prenom) }}" required>
                                        @error('prenom')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $eleve->email) }}">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    
                                    <div class="col-md-6 mb-3">
                                        <label for="tel">Téléphone</label>
                                        <input type="text" class="form-control @error('tel') is-invalid @enderror" id="tel" name="tel" value="{{ old('tel', $eleve->tel) }}">
                                        @error('tel')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="adresse">Adresse</label>
                                    <textarea class="form-control @error('adresse') is-invalid @enderror" id="adresse" name="adresse" rows="2">{{ old('adresse', $eleve->adresse) }}</textarea>
                                    @error('adresse')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <!-- Information de la classe (non modifiable) -->
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label>Classe</label>
                                        <input type="text" class="form-control" value="{{ $eleve->classe->description ?? 'Non assigné' }}" readonly>
                                    </div>
                                    
                                    <div class="col-md-6 mb-3">
                                        <label>Niveau</label>
                                        <input type="text" class="form-control" value="{{ $eleve->classe->niveau->nom_niveau ?? 'Non assigné' }}" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Changement de mot de passe -->
                        <div class="row mt-4">
                            <div class="col-12">
                                <h5 class="border-bottom pb-2">Changement de mot de passe</h5>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="password">Nouveau mot de passe</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            
                            <div class="col-md-4 mb-3">
                                <label for="password_confirmation">Confirmer le mot de passe</label>
                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                            </div>
                        </div>

                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-primary px-5">
                                <i class="fas fa-save mr-2"></i> Enregistrer les modifications
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    // Changer le label du fichier sélectionné
    document.querySelector('.custom-file-input').addEventListener('change', function(e) {
        var fileName = this.files[0].name;
        var nextSibling = this.nextElementSibling;
        nextSibling.innerText = fileName;
    });
</script>
@endsection

@section('styles')
<style>
    .profile-image-container {
        width: 150px;
        height: 150px;
        margin: 0 auto;
    }
    
    .profile-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
</style>
@endsection