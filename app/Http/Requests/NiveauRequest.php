<?php

namespace App\Http\Controllers;

use App\Models\Niveau;
use Illuminate\Http\Request;

class NiveauController extends Controller
{
    public function index()
    {
        $niveaux = Niveau::all();
        return view('niveaux.index', compact('niveaux'));
    }

    public function create()
    {
        return view('niveaux.create');
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

    public function show(Niveau $niveau)
    {
        return view('niveaux.show', compact('niveau'));
    }

    public function edit(Niveau $niveau)
    {
        return view('niveaux.edit', compact('niveau'));
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
