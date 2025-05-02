<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AbsenceEleve extends Model
{
    protected $fillable = [
        'id_eleve',
        'date_absence',
        'justifiee',
        'motif',
        'id_matiere'
    ];

    public function eleve()
    {
        return $this->belongsTo(Eleve::class, 'id_eleve');
    }

    public function matiere()
    {
        return $this->belongsTo(Matiere::class, 'id_matiere');
    }
}