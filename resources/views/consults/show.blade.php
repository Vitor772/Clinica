<h1>Consulta de {{ $consultation->patient->name }}</h1>

<p><strong>Data da Consulta:</strong> {{ $consultation->consultation_date }}</p>
<p><strong>Descrição:</strong> {{ $consultation->description }}</p>

<a href="{{ route('consults.edit', $consultation->id) }}" class="btn btn-warning">Editar</a>

<form action="{{ route('consults.destroy', $consultation->id) }}" method="POST" style="display:inline;">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">Excluir</button>
</form>
