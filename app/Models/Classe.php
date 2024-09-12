<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{

    use HasFactory;

    protected $fillable = ['nom', 'annee_scolaire_id'];


    public function anneeScolaire()
    {
        return $this->belongsTo(AnneeScolaire::class);
    }

    public function etudiants()
    {
        return $this->hasMany(Etudiant::class);
    }

    public function matieres()
    {
        return $this->hasMany(Matiere::class);
    }
}
