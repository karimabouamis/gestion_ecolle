<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    
    protected $fillable = [
        'description',
        'nom',
        'id_niveau',
        'id_annee_scolaire'
    ];

    public function niveau()
    {
        return $this->belongsTo(Niveau::class, 'id_niveau');
    }

   public function anneeScolaire()
{
    return $this->belongsTo(AnneeScolaire::class, 'id_annee_scolaire');
}


    public function eleves()
    {
        return $this->hasMany(Eleve::class, 'id_classe');
    }

    public function evaluations()
    {
        return $this->hasMany(Evaluation::class, 'id_classe');
    }
    
}