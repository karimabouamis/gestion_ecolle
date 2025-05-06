<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    protected $fillable = [
        'date_evaluation',
        'heure_evaluation',
        'type_evaluation',
        'matiere_evaluation',
        'id_matiere',
        'id_classe',
        'id_enseignant'
    ];

    public function matiere()
    {
        return $this->belongsTo(Matiere::class, 'id_matiere');
    }
    
    public function classe()
    {
        return $this->belongsTo(Classe::class, 'id_classe');
    }
    
    public function enseignant()
    {
        return $this->belongsTo(Enseignant::class, 'id_enseignant');
    }
    public function notes()
    {
        return $this->hasMany(Note::class, 'id_evaluation');
    }
}