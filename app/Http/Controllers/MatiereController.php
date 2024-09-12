<?php

namespace App\Http\Controllers;

use App\Models\Matiere;
use App\Models\Classe;

use Illuminate\Http\Request;

class MatiereController extends Controller
{
    public function index(Request $request)
    {
        $anneeScolaireId = session('annee_scolaire_id');
        $classes = Classe::where('annee_scolaire_id', $anneeScolaireId)->get();

        if (isset($request->id)) {

            $subjects = Matiere::where('classe_id', $request->id)->get();
            return view('ajax.matiere', compact("subjects"));
        }

        return view('matieres.index', compact('classes'));
    }


    public function create()
    {
        $classes = Classe::where('annee_scolaire_id', session('annee_scolaire_id'))->get();
        return view('matieres.create', compact('classes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'classe_id' => 'required|exists:classes,id',
        ]);

        $anneeScolaireId = session('annee_scolaire_id');

        Matiere::create([
            'nom' => $request->nom,
            'annee_scolaire_id' => $anneeScolaireId,
            'classe_id' => $request->classe_id,
        ]);

        return redirect()->route('matieres.index')->with('success', 'Matière ajoutée avec succès.');
    }

    public function edit($id)
    {
        $matiere = Matiere::where('id', $id)
            ->where('annee_scolaire_id', session('annee_scolaire_id'))
            ->firstOrFail();

        $classes = Classe::where('annee_scolaire_id', session('annee_scolaire_id'))->get();

        return view('matieres.edit', compact('matiere', 'classes'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'classe_id' => 'required|exists:classes,id',
        ]);

        $matiere = Matiere::where('id', $id)
            ->where('annee_scolaire_id', session('annee_scolaire_id'))
            ->firstOrFail();

        $matiere->update([
            'nom' => $request->nom,
            'classe_id' => $request->classe_id,
        ]);

        return redirect()->route('matieres.index')->with('success', 'Matière mise à jour avec succès.');
    }

    public function destroy($id)
    {
        $matiere = Matiere::where('id', $id)
            ->where('annee_scolaire_id', session('annee_scolaire_id'))
            ->firstOrFail();

        $matiere->delete();

        return redirect()->route('matieres.index')->with('success', 'Matière supprimée avec succès.');
    }
}
