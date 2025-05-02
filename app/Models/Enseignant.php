<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Enseignant extends Model
{
    protected $fillable = [
        'nom',
        'prenom',
        'adresse',
        'email',
        'tel',
       
    ];

    public function matieres()
    {
        return $this->belongsToMany(Matiere::class, 'enseignant_matiere', 'id_enseignant', 'id_matiere')
                    ->withPivot('id_classe', 'id_annee_scolaire');
    }

    public function evaluations()
    {
        return $this->hasMany(Evaluation::class, 'id_enseignant');
    }
}