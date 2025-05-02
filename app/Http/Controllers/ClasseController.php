<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classe;
use App\Models\Niveau;
use App\Models\AnneeScolaire;

class ClasseController extends Controller
{
      public function index()
     {
        $classes = Classe::with(['niveau', 'anneeScolaire'])->get();
        $niveaux=Niveau::all();
        $annees=AnneeScolaire::all();
          return view('classe.index', compact('classes','niveaux','annees'));
      }
      public function create()
{
    $niveaux = Niveau::all(); 
    $annees = AnneeScolaire::all();
    
    return view('classe.create', compact('niveaux', 'annees')); 
}
      public function store(Request $request)
      {
          Classe::create($request->all());
          return redirect()->route('classe.index');
      }

      public function edit(Classe $classe)
{
    $niveaux = Niveau::all();
    $annees = AnneeScolaire::all();
    return view('classe.edit', compact('classe', 'niveaux', 'annees'));
}


      public function update(Request $request, Classe $classe)
      {
          $classe->update($request->all());
          return redirect()->route('classe.index');
      } 

      public function destroy(Classe $classe)
    { 
          if ($classe->eleves()->exists() || $classe->evaluations()->exists()) {
              return redirect()->route('classe.index')->with('error', 'Impossible de supprimer cette catégorie car elle contient des données');
          }
          $classe->delete();
          return redirect()->route('classe.index')->with('success', 'suppression avec sucées');







    }}