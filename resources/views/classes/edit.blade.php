@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Modifier une Classe</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('classes.update', $classe->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nom">Nom de la classe</label>
            <input type="text" name="nom" id="nom" class="form-control" value="{{ $classe->nom }}" required>
        </div>

       

        <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>
</div>
@endsection
