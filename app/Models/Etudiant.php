<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{

    use HasFactory;
    
    protected $fillable = ['nom', 'prenom', 'date_naissance', 'classe_id', 'annee_scolaire_id', 'date_inscription'];

    public function anneeScolaire()
    {
        return $this->belongsTo(AnneeScolaire::class);
    }

    public function classe()
    {
        return $this->belongsTo(Classe::class);
    }

    public function fraisScolarite()
    {
        return $this->hasOne(FraisScolarite::class);
    }

    public function paiements()
    {
        return $this->hasMany(Paiement::class);
    }

    public function notes()
    {
        return $this->hasMany(Note::class);
    }


}
