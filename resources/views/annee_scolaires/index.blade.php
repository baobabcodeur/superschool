@extends('layouts.app')

@section('content')
<div class="container">
    
    <table width="100%">
            <tr>
                <td>
                  <h1>Années Scolaires</h1>  
                </td>
                <td class="text-right">
                <button><a href="{{ route('annee_scolaires.create') }}"> Créer</a></button>
                </td>
            </tr>
        </table><br />
 
    <table id="etudiants-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Année</th>
                <th>Date de Début</th>
                <th>Date de Fin</th>
                <th>Opération</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($anneeScolaires as $anneeScolaire)
            <tr>
                <td>{{ $anneeScolaire->id }}</td>
                <td>{{ $anneeScolaire->annee }}</td>
                <td>{{ $anneeScolaire->date_debut }}</td>
                <td>{{ $anneeScolaire->date_fin }}</td>
                <td class="text-center">
                    <a href="{{ route('annee_scolaires.edit', $anneeScolaire->id) }}" class="icon-button primary">
                        <i class="fas fa-pen-to-square"></i>
                    </a>
                    &nbsp;
                    <form class="d-inline" action="{{ route('annee_scolaires.destroy', $anneeScolaire->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr(e) de vouloir supprimer le produit {{ $anneeScolaire->annee }} ? Cette action sera irréversible !')">
                        @csrf
                        @method("DELETE")
                        <button type="submit" class="icon-button error">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection