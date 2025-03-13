<x-layout>

    <div class="text-end mb-4">
        @if ($patients->isNotEmpty())
            <a style="background-color:#6c83c7;"
                href="{{ route('consults.create', ['patient' => $patients->first()->id]) }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Nova Consulta
            </a>
        @else
            <p>Nenhum paciente cadastrado.</p>
        @endif
    </div>

    <div class="table-responsive">
        <table class="table table-hover">
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
                            <a href="{{ route('consults.edit', $consultation->id) }}" class="btn btn-sm btn-warning">
                                <i class="fas fa-edit"></i> Editar
                            </a>
                            <form action="{{ route('consults.destroy', $consultation->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="return confirm('Tem certeza que deseja excluir esta consulta?');">
                                    <i class="fas fa-trash"></i> Excluir
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layout>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
