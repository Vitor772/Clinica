<x-layout>
    <form method="POST" action="{{ route('medical_records.store') }}">
        @csrf

        <div class="secao-dados">
            <div class="campo campo-dados">
                <div class="campo-fixo">
                    <label for="data">Data:</label>
                    <input type="date" id="data" name="data" required>
                </div>
                <div class="campo-fixo">
                    <label for="patient_id">Paciente:</label>
                    <select id="patient_id" name="patient_id" required>
                        <option value="">Selecione um paciente</option>
                        @foreach ($patients as $patient)
                            <option value="{{ $patient->id }}">{{ $patient->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="campo-text">
            <label for="medical_history">Histórico Médico:</label>
            <textarea id="medical_history" name="medical_history"></textarea>
        </div>

        <div class="campo-text">
            <label for="initial_demand">Demanda inicial:</label>
            <textarea id="initial_demand" name="initial_demand"></textarea>
        </div>

        <div class="campo-text">
            <label for="treatment_goals">Objetivos do tratamento:</label>
            <textarea id="treatment_goals" name="treatment_goals"></textarea>
        </div>

        <div class="campo-text">
            <label for="evolution">Evolução:</label>
            <textarea id="evolution" name="evolution"></textarea>
        </div>

        <div class="campo-text">
            <label for="general_info">Informações gerais:</label>
            <textarea id="general_info" name="general_info"></textarea>
        </div>

        <button type="submit">Criar Prontuário</button>
    </form>
</x-layout>
