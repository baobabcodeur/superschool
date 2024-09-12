@extends('layouts.app')

@section('content')
<div class="container">
<table width="100%">
        <td>
            <label for="matiere_id">Choisir la matière </label>
            <select name="matiere_id" id="matiere_id">
                <option value="">Sélectionner la matière</option>
                @foreach ($matieres as $matiere)
                <option value="{{ $matiere->id }}">
                    {{ $matiere->nom }}
                </option>
                @endforeach
            </select>
        </td>
        <td style="width: 200px;"></td>
        <td class="text-right">
            <button><a href="{{ route('notes.create') }}" id="creer"> Créer</a></button>

        </td>

        <tr>
            <td>
                <h1>Notes</h1>
            </td>

        </tr>
    </table><br />
    
    <table id="etudiants-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Étudiant</th>
                
                <th>Note</th>
                <th>Période</th>
            </tr>
        </thead>
        <tbody id="tbody">
          
        </tbody>
    </table>
</div>
@endsection

@section('js')
<script>
    $('#matiere_id').change(function() {
        if ($(this).val()) {
           
            $.ajax({
                url: "{{ route('notes.index') }}",
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