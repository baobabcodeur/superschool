<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use App\Models\Classe;
use App\Http\Controllers\DD;
use Illuminate\Http\Request;

class EtudiantController extends Controller
{
    public function index()
    {
        // Récupérer l'année scolaire sélectionnée depuis la session
        $anneeScolaireId = session('annee_scolaire_id');

        // Filtrer les étudiants par l'année scolaire sélectionnée
        $etudiants = Etudiant::where('annee_scolaire_id', $anneeScolaireId)->get();

        return view('etudiants.index', compact('etudiants'));
    }

    public function create(Request $request)
    {
        $anneeScolaireId = $request->session()->get('annee_scolaire_id');
        $classes = Classe::where('annee_scolaire_id', $anneeScolaireId)->get();

        return view('etudiants.create', compact('classes'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'classe_id' => 'required|exists:classes,id',
            'date_naissance' => 'nullable|date',
            'date_inscription' => 'nullable|date',
        ]);

        $anneeScolaireId = $request->session()->get('annee_scolaire_id');

        
        
        Etudiant::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'classe_id' => $request->classe_id,
            'annee_scolaire_id' => $anneeScolaireId,
            'date_inscription' => $request->date_inscription,
            'date_naissance' => $request->date_naissance,

        ]);

        return redirect()->route('etudiants.index')->with('success', 'Étudiant ajouté avec succès.');
    }

    public function edit($id, Request $request)
    {
        $anneeScolaireId = $request->session()->get('annee_scolaire_id');
        $etudiant = Etudiant::where('id', $id)->where('annee_scolaire_id', $anneeScolaireId)->firstOrFail();
        $classes = Classe::where('annee_scolaire_id', $anneeScolaireId)->get();

        return view('etudiants.edit', compact('etudiant', 'classes'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'classe_id' => 'required|exists:classes,id',
            'date_naissance' => 'nullable|date',
            'date_inscription' => 'nullable|date',

        ]);

        $etudiant = Etudiant::findOrFail($id);
        $etudiant->update([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'classe_id' => $request->classe_id,
            'date_naissance' => $request->date_naissance,
            'date_inscription' => $request->date_inscription,
        ]);

        return redirect()->route('etudiants.index')->with('success', 'Étudiant mis à jour avec succès.');
    }

    public function destroy($id, Request $request)
    {
        $anneeScolaireId = $request->session()->get('annee_scolaire_id');
        $etudiant = Etudiant::where('id', $id)->where('annee_scolaire_id', $anneeScolaireId)->firstOrFail();

        $etudiant->delete();

        return redirect()->route('etudiants.index')->with('success', 'Étudiant supprimé avec succès.');
    }
}
