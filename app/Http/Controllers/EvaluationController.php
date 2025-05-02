<?php

namespace App\Http\Controllers;

use App\Models\Evaluation;
use App\Models\Matiere;
use App\Models\Classe;
use App\Models\Enseignant;
use App\Http\Requests\EvaluationRequest;
use Illuminate\Http\Request;

class EvaluationController extends Controller
{
    public function index()
    {
        $evaluations = Evaluation::with(['matiere', 'classe', 'enseignant'])->get();
        return view('evaluations.index', compact('evaluations'));
    }

    public function create()
    {
        $matieres = Matiere::all();
        $classes = Classe::all();
        $enseignants = Enseignant::all();

        return view('evaluations.create', compact('matieres', 'classes', 'enseignants'));
    }

    public function store(EvaluationRequest $request)
    {
       
        Evaluation::create($request->validated());

        return redirect()->route('evaluations.index')->with('success', 'إضافة التقييم تمت بنجاح.');
    
    }
   




    public function edit(Evaluation $evaluation)
    {
        $matieres = Matiere::all();
        $classes = Classe::all();
        $enseignants = Enseignant::all();

        return view('evaluations.edit', compact('evaluation', 'matieres', 'classes', 'enseignants'));
    }

    public function update(EvaluationRequest $request, Evaluation $evaluation)
    {
        $evaluation->update($request->validated());

        return redirect()->route('evaluations.index')->with('success', 'تم تحديث التقييم بنجاح');
    }

    public function destroy(Evaluation $evaluation)
    {
        $evaluation->delete();
        return redirect()->route('evaluations.index')->with('success', 'تم حذف التقييم بنجاح');
    }
}
