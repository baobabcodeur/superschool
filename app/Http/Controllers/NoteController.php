<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\Matiere;

use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function index()
    {
          // Récupérer l'année scolaire sélectionnée depuis la session
          $anneeScolaireId = session('annee_scolaire_id');
          $matieres = Matiere::where('annee_scolaire_id', $anneeScolaireId)->get();
          // Récupérer toutes les notes pour l'année scolaire sélectionnée
          if (isset($request->id)) {

            $notes = Note::where('matiere_id', $request->id)->get();
            return view('ajax.note', compact("notes"));
        }
   
  
          return view('notes.index', compact('matieres'));
    }
}
