@extends('layouts.app')

@section('content')
<div class="container">

    <table width="100%">
        <td>
            <label for="classe_id">Choisir une classe</label>
            <select name="classe_id" id="classe_id">
                <option value="">Sélectionner une classe</option>
                @foreach ($classes as $classe)
                <option value="{{ $classe->id }}">
                    {{ $classe->nom }}
                </option>
                @endforeach
            </select>
        </td>
        <td style="width: 200px;"></td>
        <td class="text-right">
            <button><a href="{{ route('matieres.create') }}" id="creer"> Créer</a></button>

        </td>

        <tr>
            <td>
                <h1>Matières</h1>
            </td>

        </tr>
    </table><br />

    <table id="etudiants-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>

                <th>Opération</th>
            </tr>
        </thead>
        <tbody id="tbody">

        </tbody>
    </table>
    
</div>


@endsection

@section('js')
<script>
    $('#classe_id').change(function() {
        if ($(this).val()) {

            $.ajax({
                url: "{{ route('matieres.index') }}",
                data: {
                    id: $(this).val()
                }
            }).done(function(data) {
             console.log(data)
                $('#tbody').html(data)
               
            });
        }
    })

   
</script>
@endsection