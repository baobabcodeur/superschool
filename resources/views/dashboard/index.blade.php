@extends('layouts.app')

@section('title', 'Tableau de Bord')

@section('content')
<div class="container">
    <h1 class="mb-4">Tableau de Bord</h1>

    <div class="row">
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card text-white bg-primary">
                <div class="card-body">
                    <div class="card-title">
                        <h5>Nombre d'Étudiants</h5>
                    </div>
                    <p class="card-text display-4">{{ $etudiantsCount }}</p>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card text-white bg-success">
                <div class="card-body">
                    <div class="card-title">
                        <h5>Nombre de Classes</h5>
                    </div>
                    <p class="card-text display-4">{{ $classesCount }}</p>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card text-white bg-warning">
                <div class="card-body">
                    <div class="card-title">
                        <h5>Nombre de Matières</h5>
                    </div>
                    <p class="card-text display-4">{{ $matieresCount }}</p>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card text-white bg-danger">
                <div class="card-body">
                    <div class="card-title">
                        <h5>Total des Frais de Scolarité</h5>
                    </div>
                    <p class="card-text display-4">{{ $totalFraisScolarite }} CFA</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
