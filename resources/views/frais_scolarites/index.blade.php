@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Frais de Scolarité</h1>
    <table id="etudiants-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Étudiant</th>
                <th>Montant Total</th>
                <th>Montant Payé</th>
                <th>Reste à Payer</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($fraisScolarites as $frais)
                <tr>
                    <td>{{ $frais->id }}</td>
                    <td>{{ $frais->etudiant->nom }} {{ $frais->etudiant->prenom }}</td>
                    <td>{{ $frais->montant_total }}</td>
                    <td>{{ $frais->montant_paye }}</td>
                    <td>{{ $frais->montant_total - $frais->montant_paye }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
