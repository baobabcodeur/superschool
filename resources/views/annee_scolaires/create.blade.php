@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Ajouter une Année Scolaire</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('annee_scolaires.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="annee">Nom de l'Année Scolaire</label>
            <input type="text" name="annee" id="annee" class="form-control" value="{{ old('annee') }}" required>
        </div>

        <div class="form-group">
            <label for="date_debut">Date de Début</label>
            <input type="date" name="date_debut" id="date_debut" class="form-control" value="{{ old('date_debut') }}" required>
        </div>

        <div class="form-group">
            <label for="date_fin">Date de Fin</label>
            <input type="date" name="date_fin" id="date_fin" class="form-control" value="{{ old('date_fin') }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>
</div>
@endsection
