<?php

namespace App\Http\Controllers;

use App\Models\AnneeScolaire;
use App\Models\Classe;

use Illuminate\Http\Request;

class AnneeScolaireController extends Controller
{
        public function index()
    {
        $anneeScolaires = AnneeScolaire::all();
        return view('annee_scolaires.index', compact('anneeScolaires'));
    }

    public function setAnneeScolaire(Request $request)
    {
        $request->validate([
            'annee_scolaire_id' => 'required|exists:annee_scolaires,id',
        ]);

        // Stocker l'année scolaire sélectionnée dans la session
        session(['annee_scolaire_id' => $request->annee_scolaire_id]);

        return redirect()->back();
    }

    public function create()
    {
        return view('annee_scolaires.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'annee' => 'required|string|max:255|unique:annee_scolaires',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date|after:date_debut',
        ]);

        AnneeScolaire::create([
            'annee' => $request->annee,
            'date_debut' => $request->date_debut,
            'date_fin' => $request->date_fin,
        ]);

        return redirect()->route('annee_scolaires.index')->with('success', 'Année scolaire ajoutée avec succès.');
    }

    public function edit($id)
    {
        // Récupérer l'année scolaire en utilisant l'ID
        $anneeScolaire = AnneeScolaire::findOrFail($id);

        // Retourner la vue d'édition avec l'année scolaire
        return view('annee_scolaires.edit', compact('anneeScolaire'));
    }

    public function update(Request $request, AnneeScolaire $anneeScolaire)
    {
        $request->validate([
            'annee' => 'required|string|max:255|unique:annee_scolaires,annee,'.$anneeScolaire->id,
            'debut' => 'date',
            'fin' => 'date|after:debut',
        ]);

        $anneeScolaire->update([
            'annee' => $request->annee,
            'debut' => $request->debut,
            'fin' => $request->fin,
        ]);

        return redirect()->route('annee_scolaires.index')->with('success', 'Année scolaire mise à jour avec succès.');
    }

   

    public function destroy(AnneeScolaire $anneeScolaire)
    {
        $anneeScolaire->delete();
        return redirect()->route('annee_scolaires.index')->with('success', 'Année scolaire supprimée avec succès.');
    }

   
}

