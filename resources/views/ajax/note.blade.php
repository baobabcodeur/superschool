@foreach ($notes as $note)
<tr>
    <td>{{ $note->id }}</td>
    <td>{{ $note->etudiant->nom }} {{ $note->etudiant->prenom }}</td>

    <td>{{ $note->note }}</td>
    <td>{{ $note->periode }}</td>
</tr>
@endforeach