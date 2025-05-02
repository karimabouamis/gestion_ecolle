@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-4">إضافة تقييم</h1>

    <form action="{{ route('evaluations.store') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label class="block">تاريخ التقييم</label>
            <input type="date" name="date_evaluation" value="{{ old('date_evaluation') }}" class="w-full border p-2 rounded" required>
        </div>

        <div>
            <label class="block">وقت التقييم</label>
            <input type="time" name="heure_evaluation" value="{{ old('heure_evaluation') }}" class="w-full border p-2 rounded">
        </div>

        <div>
            <label class="block">نوع التقييم</label>
            <input type="text" name="type_evaluation" value="{{ old('type_evaluation') }}" class="w-full border p-2 rounded">
        </div>

        <div>
            <label class="block">المادة</label>
            <select name="id_matiere" class="w-full border p-2 rounded">
                <option value="">-- اختر المادة --</option>
                @foreach($matieres as $matiere)
                    <option value="{{ $matiere->id }}" {{ old('id_matiere') == $matiere->id ? 'selected' : '' }}>
                        {{ $matiere->nom_matiere }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block">القسم</label>
            <select name="id_classe" class="w-full border p-2 rounded">
                <option value="">-- اختر القسم --</option>
                @foreach($classes as $classe)
                    <option value="{{ $classe->id }}" {{ old('id_classe') == $classe->id ? 'selected' : '' }}>
                        {{ $classe->nom_classe }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block">المدرس</label>
            <select name="id_enseignant" class="w-full border p-2 rounded">
                <option value="">-- اختر المدرس --</option>
                @foreach($enseignants as $enseignant)
                    <option value="{{ $enseignant->id }}" {{ old('id_enseignant') == $enseignant->id ? 'selected' : '' }}>
                        {{ $enseignant->nom_enseignant }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="bg-blue text-black px-4 py-2 rounded">إضافة</button>
    </form>
@endsection
