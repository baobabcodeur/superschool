<?php

namespace App\Http\Controllers;

use App\Models\Paiement;

use Illuminate\Http\Request;

class PaiementController extends Controller
{
    public function index()
    {
          // Récupérer l'année scolaire sélectionnée depuis la session
          $anneeScolaireId = session('annee_scolaire_id');

          // Filtrer les paiements par l'année scolaire sélectionnée
          $paiements = Paiement::where('annee_scolaire_id', $anneeScolaireId)->get();
  
          return view('paiements.index', compact('paiements'));
    }
}
