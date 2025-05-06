<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eleve extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom',
        'prenom',
        'adresse',
        'email',
        'tel',
        'genre',
        'photo',
        'classe',
        'id_classe'
    ];

    public function classe()
    {
        return $this->belongsTo(Classe::class, 'id_classe');
    }

    public function notes()
    {
        return $this->hasMany(Note::class, 'id_eleve');
    }

    public function absences()
    {
        return $this->hasMany(AbsenceEleve::class, 'id_eleve');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}