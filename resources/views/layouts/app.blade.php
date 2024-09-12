<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Gestion École')</title>
    <!-- CSS de Bootstrap -->
    <link rel="stylesheet" href="{{ URL::asset('assets/fontawesome/css/all.min.css') }}">

    <!-- CSS de DataTables -->
    <link rel="stylesheet" href="{{ URL::asset('assets/datatable/datatables.min.css') }}">

    <!-- jQuery (nécessaire pour DataTables) -->
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
    <!-- JS de DataTables -->
    

    <!-- CSS pour les boutons DataTables -->
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.dataTables.min.css">



</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ url('/') }}">Gestion École</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard') }}">Tableau de Bord</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('annee_scolaires.index') }}">Années Scolaires</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('classes.index') }}">Classes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('etudiants.index') }}">Étudiants</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('matieres.index') }}">Matières</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('notes.index') }}">Notes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('frais_scolarites.index') }}">Frais de Scolarité</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('paiements.index') }}">Paiements</a>
                    </li>
                </ul>

                <form action="{{ route('set-annee-scolaire') }}" method="POST" class="d-flex">
                    @csrf
                    <select name="annee_scolaire_id" id="annee_scolaire_id" class="form-select me-2" onchange="this.form.submit()">
                        @foreach($anneeScolaires as $annee)
                            <option value="{{ $annee->id }}" {{ $annee->id == session('annee_scolaire_id', 1) ? 'selected' : '' }}>
                                {{ $annee->annee }}
                            </option>
                        @endforeach
                    </select>
                </form>
                
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        @yield('content')
    </div>

    <script src="{{ URL::asset('js/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('assets/datatable/datatables.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#etudiants-table').DataTable({
                dom: 'Bfrtip',
            buttons: [
                'excel', 'pdf', 'print'
            ],
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.13.4/i18n/fr-FR.json"
            }
            });
        });


        
    </script>

        <!-- Script AJAX -->
        
    <!-- JS pour les boutons DataTables -->
<script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>


    @yield('js')
</body>

</html>