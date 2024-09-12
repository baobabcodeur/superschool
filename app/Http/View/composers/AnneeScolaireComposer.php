<?php


namespace App\Http\View\Composers;

use Illuminate\View\View;
use App\Models\AnneeScolaire;

class AnneeScolaireComposer
{

    public function compose(View $view)
    {
        // Récupérer toutes les années scolaires depuis la base de données
        $anneeScolaires = AnneeScolaire::all();

        // Partager les années scolaires avec la vue
        $view->with('anneeScolaires', $anneeScolaires);
    }
}
