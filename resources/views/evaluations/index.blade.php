@extends('layouts.app')

@section('content')
    <h1 class="fw-bold text-black"> 📚 Liste d'evaluations</h1>

    <a href="{{ route('evaluations.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4">Ajouter evaluation</a>

    <table class="min-w-full table-auto border-collapse">
        <thead>
            <tr>
                <th class="border p-2">Date</th>
                <th class="border p-2">Heure</th>
                <th class="border p-2">Type d'évaluations</th>
                <th class="border p-2">Matieres</th>
                <th class="border p-2">Classe</th>
                <th class="border p-2">Enseignant</th>
                <th class="border p-2">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($evaluations as $evaluation)
                <tr>
                    <td class="border p-2">{{ $evaluation->date_evaluation }}</td>
                    <td class="border p-2">{{ $evaluation->heure_evaluation  }}</td>
                    <td class="border p-2">{{ $evaluation->type_evaluation  }}</td>
                    <td class="border p-2">{{ $evaluation->matiere_evaluation }}</td>
                    <td class="border p-2">{{ $evaluation->classe->nom_classe }}</td>
                    <td class="border p-2">{{$evaluation->enseignant->nom  }}</td>
                    <td class="border p-2">
                        <a href="{{ route('evaluations.edit', $evaluation->id) }}" class="text-yellow-500"><i class="bi bi-pencil"></a>
                        |
                        <form action="{{ route('evaluations.destroy', $evaluation->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500"><i class="bi bi-pencil"></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
