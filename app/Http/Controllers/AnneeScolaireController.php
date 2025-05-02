<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AnneeScolaire;
use App\Http\Requests\AnneeScolaireRequest;

class AnneeScolaireController extends Controller
{
    public function index()
    {
        $annees = AnneeScolaire::all();
        return view('scolaires.index', compact('annees'));
    }

    public function create()
    {
        return view('scolaires.create');
    }

    public function store(AnneeScolaireRequest $request)
    {
      
        AnneeScolaire::create($request->validated());

        return redirect()->route('scolaires.index')->with('success', 'Année scolaire ajoutée avec succès.');
    }

    
    public function edit(AnneeScolaire $annee_scolaire)
    {
        return view('scolaires.edit', compact('annee_scolaire'));
    }

    public function update(Request $request, AnneeScolaire $annee_scolaire)
    {
        $request->validate([
            'libelle' => 'required|string|max:20',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date|after:date_debut',
            'statut' => 'required|string|max:10',
        ]);

        $annee_scolaire->update($request->only(['libelle', 'date_debut', 'date_fin', 'statut']));

        return redirect()->route('scolaires.index')->with('success', 'Année scolaire mise à jour avec succès.');
    }

    public function remove(AnneeScolaire $annee_scolaire)
    {
        $annee_scolaire->delete();
        return redirect()->route('scolaires.index')->with('success', 'Année scolaire supprimée avec succès.');
    }
}
