<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Matiere extends Model
{
    protected $fillable = [
        'nom_matiere',
        'coefficient',
        'langue',
        'id_niveau',
    ];
    

    public function niveau()
    {
        return $this->belongsTo(Niveau::class, 'id_niveau');
    }

    public function enseignants()
    {
        return $this->belongsToMany(Enseignant::class, 'enseignant_matiere', 'id_matiere', 'id_enseignant')
                    ->withPivot('id_classe', 'id_annee_scolaire');
    }

    public function evaluations()
    {
        return $this->hasMany(Evaluation::class, 'id_matiere');
    }

    public function absences()
    {
        return $this->hasMany(AbsenceEleve::class, 'id_matiere');
    }
}