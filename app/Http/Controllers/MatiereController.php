<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use App\Models\Matiere;
use App\Models\Niveau;
use Illuminate\Http\Request;

class MatiereController extends Controller
{
    public function index()
    {
        $matieres = Matiere::with('niveau')->get();
        $langues = ['Français', 'Arabe'];  // بدون Anglais
        $niveaux = Niveau::all();
    
        return view('matieres.index', compact('matieres', 'langues', 'niveaux'));
    }
    
    
    


    public function create()
    {
        $niveaux = Niveau::all();
        $classes=Classe::all();
        $langues = ['Français', 'Arabe'];
    
        return view('matieres.create', compact('niveaux', 'langues','classes'));
    }


    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom_matiere' => 'required|string|max:50',
            'coefficient' => 'required|numeric|min:0',
            'langue' => 'nullable|string|max:20',
            'id_niveau' => 'nullable|exists:niveaux,id',
        ]);

        Matiere::create($validated);

        return redirect()->route('matieres.index')->with('success', 'Matière ajoutée avec succès.');
    }
  

    public function edit(Matiere $matiere)
    {
        $niveaux = Niveau::all();
        $langues = ['Français', 'Arabe'];
        return view('matieres.edit', compact('matiere', 'niveaux','langues'));
    }

    public function update(Request $request, Matiere $matiere)
    {
        $validated = $request->validate([
            'nom_matiere' => 'required|string|max:50',
            'coefficient' => 'required|numeric|between:0,10',
            'langue' => 'nullable|string|max:20',
            'id_niveau' => 'nullable|exists:niveaux,id',
        ]);

        $matiere->update($validated);

        return redirect()->route('matieres.index')->with('success', 'Matière mise à jour.');
    }

    public function destroy(Matiere $matiere)
    {
        $matiere->delete();
        return redirect()->route('matieres.index')->with('success', 'Matière supprimée.');
    }
}
