<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Niveau extends Model
{
    protected $fillable = [
        'nom_niveau',
        'description',
        'choix'
    ];

    public function matieres()
    {
        return $this->hasMany(Matiere::class, 'id_niveau');
    }

    public function classes()
    {
        return $this->hasMany(Classe::class, 'id_niveau');
    }
}