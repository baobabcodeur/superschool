<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use App\Models\Classe;
use App\Models\Matiere;
use App\Models\FraisScolarite;
use App\Models\Paiement;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index()
    {
        // Récupérer l'année scolaire sélectionnée depuis la session
        $anneeScolaireId = session('annee_scolaire_id');

        // Récupérer le nombre d'étudiants, classes, matières, et le total des frais de scolarité
        $etudiantsCount = Etudiant::where('annee_scolaire_id', $anneeScolaireId)->count();
        $classesCount = Classe::where('annee_scolaire_id', $anneeScolaireId)->count();
        $matieresCount = Matiere::where('annee_scolaire_id', $anneeScolaireId)->count();
        $totalFraisScolarite = Paiement::where('annee_scolaire_id', $anneeScolaireId)->sum('montant');

        // Passer les données à la vue
        return view('dashboard.index', compact('etudiantsCount', 'classesCount', 'matieresCount', 'totalFraisScolarite'));
    }
}
