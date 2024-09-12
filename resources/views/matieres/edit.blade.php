@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Modifier la Matière</h1>

        <form action="{{ route('matieres.update', $matiere->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nom">Nom de la Matière</label>
                <input type="text" name="nom" id="nom" class="form-control" value="{{ $matiere->nom }}" required>
            </div>

            <div class="form-group">
                <label for="classe_id">Classe</label>
                <select name="classe_id" id="classe_id" class="form-control" required>
                    @foreach($classes as $classe)
                        <option value="{{ $classe->id }}" {{ $matiere->classe_id == $classe->id ? 'selected' : '' }}>
                            {{ $classe->nom }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Mettre à jour</button>
        </form>
    </div>
@endsection
