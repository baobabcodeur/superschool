@extends('layouts.app')

@section('content')
<div class="container">
   
    <table width="100%">
            <tr>
                <td>
                     <h1>Étudiants</h1>
                   
                </td>
                <td class="text-right">
                <button><a href="{{ route('etudiants.create') }}"> Créer</a></button>
                </td>
            </tr>
        </table><br />
    <table id="etudiants-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Classe</th>
                <th>Date de Naissance</th>
                <th>Opération</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($etudiants as $etudiant)
                <tr>
                    <td>{{ $etudiant->id }}</td>
                    <td>{{ $etudiant->nom }}</td>
                    <td>{{ $etudiant->prenom }}</td>
                    <td>{{ $etudiant->classe->nom }}</td>
                    <td>{{ $etudiant->date_naissance }}</td>
                    <td class="text-center">
                    <a href="{{ route('etudiants.edit', $etudiant->id) }}" class="icon-button primary">
                        <i class="fas fa-pen-to-square"></i>
                    </a>
                    &nbsp;
                    <form class="d-inline" action="{{ route('etudiants.destroy', $etudiant->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr(e) de vouloir supprimer le produit {{ $etudiant->nom }} ? Cette action sera irréversible !')">
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
