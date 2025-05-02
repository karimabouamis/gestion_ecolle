@extends('layouts.app')

@section('content')

<div class="container">
    <h2 class="fw-bold text-black">📚 Liste des élèves </h2>

    
    @include('eleve.create')

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prenom </th>
                <th>Adresse</th>
                <th>Genre</th>
                <th>Email</th>
                <th>Tel</th>
                <th>Classe</th>
                <th>Photo</th>
                <th >Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($eleves as $eleve)
                <tr>
                    <td>{{ $eleve->nom }}</td>
                    <td>{{ $eleve->prenom }}</td>
                    <td>{{ $eleve->adresse }}</td>
                    <td>{{ $eleve->genre }}</td>
                    <td>{{ $eleve->email }}</td>
                    <td>{{ $eleve->tel }}</td>
                    <td>{{ $eleve->id_classe}}</td>

                    <td>
                    @if ($eleve->photo)
                            <img src="{{ asset('storage/photos/' . $eleve->photo) }}" width="60" height="60" style="object-fit: cover; border-radius: 50%;">
                        @else
                            <span>Aucune</span>
                        @endif
                    </td>                   
                    <td>
                            @include('eleve.edit')
                            @include('eleve.delete')
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">Aucun élève pour le moment   </td>
                </tr>
            @endforelse
        </tbody>
    </table>

 
</div>

@endsection