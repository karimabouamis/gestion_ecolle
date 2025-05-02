<?php

namespace App\Http\Controllers;

use App\Models\Salle;
use Illuminate\Http\Request;

class SalleController extends Controller
{
    public function index()
    {
        $salles = Salle::all();
        $types_salles = ['Laboratoire', 'Salle Informatique', 'Salle de cours', 'Amphithéâtre'];

        return view('salles.index', compact('salles','types_salles'));
    }

    public function create()
    {
        $types_salles = ['Laboratoire', 'Salle Informatique', 'Salle de cours', 'Amphithéâtre'];
        return view('salles.create', compact('types_salles'));
    }
    

    public function store(Request $request)
    {
        $request->validate([
            'num_salle' => 'required|string|max:10',
            'type_salle' => 'nullable|string|max:30',
        ]);

        Salle::create([
            'num_salle' => $request->num_salle,
            'type_salle' => $request->type_salle,
        ]);

        return redirect()->route('salles.index')->with('success', 'Salle ajoutée avec succès.');
    }

    public function edit(Salle $salle)
    {
        $types_salles = ['Laboratoire', 'Salle Informatique', 'Salle de cours', 'Amphithéâtre'];
        return view('salles.edit', compact('types_salles', 'salle'));
    }

    public function update(Request $request, Salle $salle)
    {
        $request->validate([
            'num_salle' => 'required|string|max:10',
            'type_salle' => 'nullable|string|max:30',
        ]);

        $salle->update([
            'num_salle' => $request->num_salle,
            'type_salle' => $request->type_salle,
        ]);

        return redirect()->route('salles.index')->with('success', 'Salle mise à jour avec succès.');
    }

    public function destroy(Salle $salle)
    {
        $salle->delete();
        return redirect()->route('salles.index')->with('success', 'Salle supprimée.');
    }
}
