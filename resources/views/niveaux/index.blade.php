@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="fw-bold text-black"> 📚 Liste des Niveaux</h1>

 
    @include("niveaux.create")
  
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom du niveau</th>
                <th>Description</th>
                <th>Choix</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($niveaux as $niveau)
                <tr>
                    <td>{{ $niveau->id }}</td>
                    <td>{{ $niveau->nom_niveau }}</td>
                    <td>{{ $niveau->description }}</td>
                    <td>{{ $niveau->choix }}</td>
                    <td>
                       
                        @include('niveaux.edit')     
                        @include('niveaux.delete')                  
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">Aucun niveau trouvé.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
