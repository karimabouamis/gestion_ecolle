<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\Eleve;
use App\Models\Evaluation;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function index()
    {
        $notes = Note::with(['evaluation', 'eleve'])->get();
        $evaluations = Evaluation::all();
        $eleves = Eleve::all();
        return view('notes.index', compact('notes', 'evaluations', 'eleves'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_eleve' => 'required|exists:eleves,id',
            'id_evaluation' => 'required|exists:evaluations,id',
            'valeur' => 'required|numeric|min:0|max:20',
            'observation' => 'nullable|string|max:255',
        ]);

        Note::create($validated);

        return redirect()->route('notes.index')->with('success', 'Note ajoutée avec succès.');
    }
    
    public function update(Request $request, Note $note)
    {
        $validated = $request->validate([
            'id_eleve' => 'required|exists:eleves,id',
            'id_evaluation' => 'required|exists:evaluations,id',
            'valeur' => 'required|numeric|min:0|max:20',
            'observation' => 'nullable|string|max:255',
        ]);

        $note->update($validated);

        return redirect()->route('notes.index')->with('success', 'Note modifiée avec succès.');
    }

    public function destroy(Note $note)
    {
        $note->delete();

        return redirect()->route('notes.index')->with('success', 'Note supprimée avec succès.');
    }
}
