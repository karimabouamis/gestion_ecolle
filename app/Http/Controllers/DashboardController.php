<?php

namespace App\Http\Controllers;

use App\Models\Eleve;
use App\Models\salle;
use App\Models\Classe;
use App\Models\niveau;
use App\Models\matiere;
use App\Models\Enseignant;


class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'eleveCount' => Eleve::count(),
            'enseignantsCount' => Enseignant::count(),
            'matiereCount' => matiere::count(),
            'classesCount' => Classe::count(),
            'niveauCount' => niveau::count(),
            'salleCount' => salle::count(),

        ]);
    }
}
