@foreach ($subjects as $matiere)
            <tr>
                <td>{{ $matiere->id }}</td>
                <td>{{ $matiere->nom }}</td>

                <td class="text-center">
                    <a href="{{ route('matieres.edit', $matiere->id) }}" class="icon-button primary">
                        <i class="fas fa-pen-to-square"></i>
                    </a>
                    &nbsp;
                    <form class="d-inline" action="{{ route('matieres.destroy', $matiere->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr(e) de vouloir supprimer le produit {{ $matiere->annee }} ? Cette action sera irréversible !')">
                        @csrf
                        @method("DELETE")
                        <button type="submit" class="icon-button error">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
