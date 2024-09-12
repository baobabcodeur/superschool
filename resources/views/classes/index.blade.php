@extends('layouts.app')

@section('content')
<div class="container">
    
    <table width="100%">
            <tr>
                <td>
                    <h1>Classes</h1>
                </td>
                <td class="text-right">
                <button><a href="{{ route('classes.create') }}"> Créer</a></button>
                </td>
            </tr>
        </table><br />

    <table id="etudiants-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Année Scolaire</th>
                <th>Opération</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($classes as $classe)
                <tr>
                    <td>{{ $classe->id }}</td>
                    <td>{{ $classe->nom }}</td>
                    <td>{{ $classe->anneeScolaire->annee }}</td>
                    <td class="text-center">
                    <a href="{{ route('classes.edit', $classe->id) }}" class="icon-button primary">
                        <i class="fas fa-pen-to-square"></i>
                    </a>
                    &nbsp;
                    <form class="d-inline" action="{{ route('classes.destroy', $classe->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr(e) de vouloir supprimer le produit {{ $classe->nom }} ? Cette action sera irréversible !')">
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
