<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FraisScolarite extends Model
{
    use HasFactory;

    protected $fillable = ['montant_total', 'montant_paye', 'etudiant_id'];

    public function anneeScolaire()
    {
        return $this->belongsTo(AnneeScolaire::class);
    }

    public function etudiant()
    {
        return $this->belongsTo(Etudiant::class);
    }

    public function paiements()
    {
        return $this->hasMany(Paiement::class);
    }
}
