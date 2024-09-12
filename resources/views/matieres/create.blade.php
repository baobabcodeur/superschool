@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Ajouter une Matière</h1>

        <form action="{{ route('matieres.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="nom">Nom de la Matière</label>
                <input type="text" name="nom" id="nom" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="classe_id">Classe</label>
                <select name="classe_id" id="classe_id" class="form-control" required>
                    @foreach($classes as $classe)
                        <option value="{{ $classe->id }}">{{ $classe->nom }}</option>
                    @endforeach
                </select>
            </div> <br> <br>

            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>
    </div>
@endsection
