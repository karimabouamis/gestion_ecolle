<?php

namespace App\Http\Controllers;

use App\Models\Niveau;
use Illuminate\Http\Request;

class NiveauController extends Controller
{
    public function index()
    {
        $niveaux = Niveau::all();
        $choix = ['Littéraire', 'Scientifique', 'Technique'];
        $noms = ['1ère Année', '2ème Année', '3ème Année'];

        return view('niveaux.index', compact('niveaux','choix','noms'));
    }

    public function create()
{
    $noms = ['1ère Année', '2ème Année', '3ème Année'];
    $choix = ['Littéraire', 'Scientifique', 'Technique'];

    return view('niveaux.create', compact('noms', 'choix'));
}


    public function store(Request $request)
    {
        $request->validate([
            'nom_niveau' => 'required|string|max:50',
            'description' => 'nullable|string',
            'choix' => 'nullable|string|max:50',
        ]);

        Niveau::create($request->all());

        return redirect()->route('niveaux.index')->with('success', 'Niveau créé avec succès.');
    }

    public function edit(Niveau $niveau)
    {
        $noms = ['1ère Année', '2ème Année', '3ème Année'];
    $choix = ['Littéraire', 'Scientifique', 'Technique'];
        return view('niveaux.edit', compact('niveau','noms','choix'));
    }

    public function update(Request $request, Niveau $niveau)
    {
        $request->validate([
            'nom_niveau' => 'required|string|max:50',
            'description' => 'nullable|string',
            'choix' => 'nullable|string|max:50',
        ]);

        $niveau->update($request->all());

        return redirect()->route('niveaux.index')->with('success', 'Niveau mis à jour avec succès.');
    }

    public function destroy(Niveau $niveau)
    {
        $niveau->delete();
        return redirect()->route('niveaux.index')->with('success', 'Niveau supprimé avec succès.');
    }
}