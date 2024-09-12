<?php

namespace App\Http\Controllers;

use App\Models\Classe;

use Illuminate\Http\Request;

class ClasseController extends Controller
{
    public function index()
    {
         // Récupérer l'année scolaire sélectionnée depuis la session
         $anneeScolaireId = session('annee_scolaire_id');

         // Filtrer les classes par l'année scolaire sélectionnée
         $classes = Classe::where('annee_scolaire_id', $anneeScolaireId)->get();
         
        return view('classes.index', compact('classes'));
    }

    public function create()
    {
        return view('classes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
        ]);

        // Récupérer l'année scolaire sélectionnée
        $anneeScolaireId = $request->session()->get('annee_scolaire_id');

        // Créer une nouvelle classe pour l'année scolaire sélectionnée
        Classe::create([
            'nom' => $request->nom,
            'annee_scolaire_id' => $anneeScolaireId,
        ]);

        return redirect()->route('classes.index')->with('success', 'Classe ajoutée avec succès.');
    }

    public function edit($id)
    {
        // Récupérer la classe à modifier
        $classe = Classe::findOrFail($id);

        // Retourner la vue d'édition avec les données de la classe
        return view('classes.edit', compact('classe'));
    }

    public function update(Request $request, $id)
    {
        
        // Validation des données entrantes
        $request->validate([
            'nom' => 'required|string|max:255',
        ]);

        // Récupérer la classe à mettre à jour
        $classe = Classe::findOrFail($id);

        // Mettre à jour la classe avec les nouvelles données
        $classe->update([
            'nom' => $request->nom,
        ]);

        return redirect()->route('classes.index')->with('success', 'Classe mise à jour avec succès.');
    }
    public function destroy($id)
    {
        // Trouver la classe par ID et la supprimer
        $classe = Classe::findOrFail($id);
        $classe->delete();

        return redirect()->route('classes.index')->with('success', 'Classe supprimée avec succès.');
    }

   
 
}
