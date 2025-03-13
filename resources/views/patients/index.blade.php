<x-layout>


    <form action="{{ route('patients.index') }}" method="GET">
        @csrf
        <div class="secao-dados">
            <div class="campo campo-dados">
                <div class="campo-fixo">
                    <label for="data">Data:</label>
                    <input type="date" id="data" name="data" value=""
                        placeholder="Clique para selecionar a data">
                </div>
                <div class="campo-fixo">
                    <label for="name">Paciente:</label>
                    <input type="text" id="name" name="name" placeholder="Digite o nome do paciente"
                        value="{{ request()->input('name') }}">
                </div>
                <div class="campo-fixo">
                    <label for="age">Idade:</label>
                    <input type="number" id="age" name="age" placeholder="Idade"
                        value="{{ request()->input('age') }}">
                </div>
            </div>

            <div class="campo linha">
                <div class="campo-fixo">
                    <label for="civil_status">Estado Civil:</label>
                    <input type="text" id="civil_status" name="civil_status" placeholder="Estado civil"
                        value="{{ request()->input('civil_status') }}">
                </div>
                <div class="campo-fixo">
                    <label for="id_gov">RG:</label>
                    <input type="text" id="id_gov" name="id_gov" placeholder="RG"
                        value="{{ request()->input('id_gov') }}" maxlength="12" oninput="formatarRG(this)"
                        pattern="\d{2}\.\d{3}\.\d{3}-\d{1}" title="O RG deve seguir o formato XX.XXX.XXX-X">
                </div>
                <div class="campo-fixo">
                    <label for="responsable">Responsável:</label>
                    <input type="text" id="responsable" name="responsable" placeholder="Responsável"
                        value="{{ request()->input('responsable') }}">
                </div>
            </div>
            <a type="submit" style="background-color:#6c83c7;" class="btn btn-primary">Aplicar
                Filtros</a>
        </div>

    </form>


    <h1 class="text-center mb-4">Lista de Pacientes</h1>
    <div class="text-end mb-4">
        <a style="background-color:#6c83c7;" href="{{ route('patients.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Adicionar Novo Paciente
        </a>
    </div>

    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Idade</th>
                    <th>Estado Civil</th>
                    <th>RG</th>
                    <th>Responsável</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($patients as $patient)
                    <tr>
                        <td>{{ $patient->name }}</td>
                        <td>{{ $patient->age }}</td>
                        <td>{{ $patient->civil_status }}</td>
                        <td>{{ $patient->id_gov }}</td>
                        <td>{{ $patient->responsable }}</td>
                        <td>
                            <a href="{{ route('patients.show', $patient->id) }}" class="btn btn-info btn-sm">
                                <i class="fas fa-eye"></i> Ver
                            </a>

                            <a href="{{ route('patients.edit', $patient->id) }}" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i> Editar
                            </a>

                            <a href="{{ route('medical_records.show', $patient->id) }}"
                                class="btn btn-secondary btn-sm">
                                <i class="fas fa-file-medical"></i> Prontuário
                            </a>
                            <a href="{{ route('consults.create', $patient->id) }}" class="btn btn-secondary btn-sm">
                                <i class="fas fa-file-medical"></i> Consultas
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</x-layout>
