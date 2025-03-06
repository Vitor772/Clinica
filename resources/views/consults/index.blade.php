<h1>Consultas</h1>

<a href="{{ route('consults.create') }}" class="btn btn-primary">Nova Consulta</a>

<table class="table mt-3">
    <thead>
        <tr>
            <th>Paciente</th>
            <th>Data da Consulta</th>
            <th>Descrição</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($consultations as $consultation)
            <tr>
                <td>{{ $consultation->patient->name }}</td>
                <td>{{ $consultation->consultation_date }}</td>
                <td>{{ $consultation->description }}</td>
                <td>
                    <a href="{{ route('consults.show', $consultation->id) }}" class="btn btn-info">Ver</a>
                    <a href="{{ route('consults.edit', $consultation->id) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('consults.destroy', $consultation->id) }}" method="POST"
                        style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Excluir</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
