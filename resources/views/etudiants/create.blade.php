@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Ajouter un Étudiant</h1>

        <form action="{{ route('etudiants.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="nom">Nom de l'Étudiant</label>
                <input type="text" name="nom" id="nom" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="prenom">Prénom de l'Étudiant</label>
                <input type="text" name="prenom" id="prenom" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="date_naissance">Date de Naissance</label>
                <input type="date" name="date_naissance" id="date_naissance" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="classe_id">Classe</label>
                <select name="classe_id" id="classe_id" class="form-control" required>
                    @foreach ($classes as $classe)
                        <option value="{{ $classe->id }}">{{ $classe->nom }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="date_inscription">Date d'Inscription</label>
                <input type="date" name="date_inscription" id="date_inscription" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>
    </div>
@endsection
