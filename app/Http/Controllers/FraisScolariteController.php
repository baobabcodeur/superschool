<?php

namespace App\Http\Controllers;

use App\Models\FraisScolarite;

use Illuminate\Http\Request;

class FraisScolariteController extends Controller
{
    public function index()
    {
         // Récupérer l'année scolaire sélectionnée depuis la session
       $anneeScolaireId = session('annee_scolaire_id');

       // Filtrer les étudiants par l'année scolaire sélectionnée
  
        $fraisScolarites = FraisScolarite::where('annee_scolaire_id', $anneeScolaireId)->get();
        return view('frais_scolarites.index', compact('fraisScolarites'));
    }
}
