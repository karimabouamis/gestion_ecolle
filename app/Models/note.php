<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $fillable =[
        'observation',
        'id_evaluation',
        'id_eleve',
        'valeur'
    ];
    public function evaluation()
    {
        return $this->belongsTo(Evaluation::class, 'id_evaluation');
    }
    public function eleve()
    {
        return $this->belongsTo(Eleve::class, 'id_eleve');
    }

}