
@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="fw-bold text-black"> 📚 Liste des enseignants</h1>
   @include('enseignant.create')
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Adresse</th>
                <th>Email</th>
                <th>Téléphone</th>
                <th>Photo</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($enseignants as $enseignant)
                <tr>
                    <td>{{ $enseignant->nom }}</td>
                    <td>{{ $enseignant->prenom }}</td>
                    <td>{{$enseignant->adresse}}</td>
                    <td>{{ $enseignant->email }}</td>
                    <td>{{ $enseignant->tel }}</td>
                    <td>
                         @if ($enseignant->photo)
                         <img src="{{ asset('storage/photos/' . $enseignant->photo) }}" width="60" height="60" style="object-fit: cover; border-radius: 50%;">

                        @else
                            <span>Aucune</span>
                        @endif
                    </td>
                    <td>
                            @include('enseignant.edit')                        
                          @include('enseignant.delete')
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection











