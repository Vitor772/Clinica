<!-- resources/views/medical_records/create.blade.php -->

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prontuários</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"></script>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f7fc;
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            /* Mudado para flex-start para permitir que o conteúdo cresça */
            flex-direction: column;
            box-sizing: border-box;
            height: 100%;
            /* Garantir que o body ocupe toda a altura */
            overflow: auto;
            /* Permite que o conteúdo com overflow mostre uma barra de rolagem */
        }

        .container {
            background-color: #fff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 800px;
            margin: 30px auto;
            /* Centraliza o conteúdo horizontalmente */
            position: relative;
        }

        h1 {
            text-align: center;
            color: #4e5b6e;
            font-size: 2.2em;
            margin-bottom: 30px;
        }

        /* Logo */
        .logo {
            text-align: center;
            margin-bottom: 30px;
        }

        .logo img {
            max-width: 250px;
            /* Ajusta o tamanho máximo da logo */
            height: auto;
            /* Mantém a proporção da imagem */
        }

        /* Estilo para o botão de logout */
        .logout-btn {
            top: 20px;
            margin-bottom: 820px;
            right: 20px;
            background-color: #e74c3c;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 1em;
        }

        .logout-btn:hover {
            background-color: #c0392b;
        }

        .campo {
            margin-bottom: 20px;
        }

        .campo label {
            font-size: 1.1em;
            font-weight: bold;
            color: #4e5b6e;
        }

        .campo input {
            width: 100%;
            padding: 12px;
            font-size: 1em;
            border-radius: 8px;
            border: 1px solid #ddd;
            background-color: #f9f9f9;
            color: #333;
            box-sizing: border-box;
        }

        .campo input[type="date"] {
            width: 100%;
            padding: 12px;
            font-size: 1em;
            border-radius: 8px;
            border: 1px solid #ddd;
            background-color: #f9f9f9;
            color: #333;
            box-sizing: border-box;
        }

        .campo input[type="number"],
        .campo input[type="text"] {
            width: 100%;
            padding: 12px;
            font-size: 1em;
            border-radius: 8px;
            border: 1px solid #ddd;
            background-color: #f9f9f9;
            color: #333;
        }

        .campo input[type="date"]:focus,
        .campo input[type="text"]:focus,
        .campo input[type="number"]:focus {
            outline: none;
            border-color: #6c83c7;
            background-color: #e8effd;
        }

        .campo .linha {
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
        }

        .campo .campo-fixo {
            width: 48%;
        }

        .pergunta {
            margin-bottom: 20px;
        }

        .opcoes {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
        }

        .opcao {
            display: flex;
            align-items: center;
            font-size: 1em;
        }

        .opcao input[type="radio"] {
            margin-right: 10px;
        }

        fieldset {
            border: none;
            padding: 0;
            margin: 20px 0;
        }

        fieldset legend {
            font-size: 1.2em;
            font-weight: bold;
            color: #4e5b6e;
        }

        .total {
            margin-top: 30px;
            font-size: 1.2em;
            font-weight: bold;
            color: #4e5b6e;
        }

        .total table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }

        .total th,
        .total td {
            padding: 8px 12px;
            text-align: center;
            border: 1px solid #ddd;
        }

        .total th {
            background-color: #f3f4f8;
            font-weight: bold;
        }

        .total td {
            background-color: #f9f9f9;
        }

        button {
            background-color: #6c83c7;
            color: #fff;
            font-size: 1.1em;
            padding: 12px 20px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s;
            width: auto;
            position: fixed;
            bottom: 30px;
            right: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        button:hover {
            background-color: #56688b;
        }

        button i {
            font-size: 1.5em;
        }

        .linha {
            display: flex;
            justify-content: space-between;
            gap: 20px;
        }

        .campo-fixo {
            width: 48%;
        }

        .campo .data {
            display: flex;
            flex-direction: column;
            width: 100%;
        }

        .data input {
            width: 100%;
            padding: 12px;
            border-radius: 8px;
            border: 1px solid #ddd;
            background-color: #f9f9f9;
            font-size: 1em;
            margin-top: 5px;
        }

        .campo label[data-label="data"] {
            font-weight: bold;
        }

        .analisetitulo {
            font-size: 1.8em;
            color: #4e5b6e;
            font-weight: bold;
            text-align: center;
            margin-top: 40px;
        }

        /* Adicionando estilo para os campos Data, Psicóloga e CRP na mesma linha */
        .campo-dados {
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
        }

        .campo-dados .campo-fixo {
            width: 32%;
        }

        /* Garantindo que o campo Data tenha o layout correto */
        .campo-dados .campo-fixo[data-label="data"] {
            width: 100%;
        }

        /* Espaço entre os campos e o título "Entrevista" */
        .espaco-entre-campos-e-titulo {
            margin-bottom: 30px;
        }

        .titulo-entrevista {
            font-size: 2em;
            color: #4e5b6e;
            font-weight: bold;
            text-align: center;
            margin-top: 40px;
        }

        /* Seção de Dados - Fundo claro para os campos */
        .secao-dados {
            background-color: #f4f7fc;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 30px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .campo-text textarea {
            width: 100%;
            padding: 12px;
            font-size: 1em;
            border-radius: 8px;
            border: 1px solid #ddd;
            background-color: #f9f9f9;
            color: #333;
            height: 150px;
            box-sizing: border-box;
            resize: vertical;
        }

        .campo-text label {
            font-size: 1.1em;
            font-weight: bold;
            color: #4e5b6e;
            margin-bottom: 10px;
            display: block;
        }

        .secao-gravidez {
            background-color: #f4f7fc;
            padding: 10px;
            border-radius: 10px;
            margin-bottom: 30px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>

    <!-- Botão de Logout no canto superior direito -->
    <button class="logout-btn" onclick="logout()">Logout</button>
    <div class="container">
        <div class="logo">
            <img src="images/logo.png" alt="Logo">
        </div>

        <form method="POST" action="{{ route('medical_records.store') }}">
            @csrf <!-- Protege contra CSRF -->

            <div class="secao-dados">
                <!-- Campos Data, Psicóloga e CRP na mesma linha -->
                <div class="campo campo-dados">
                    <div class="campo-fixo">
                        <label for="data" data-label="data">Data:</label>
                        <input type="date" id="data" name="data" value="{{ old('data') }}"
                            placeholder="Clique para selecionar a data">
                    </div>
                    <div class="campo-fixo">
                        <label for="paciente">Paciente:</label>
                        <input type="text" name="patient_name" id="paciente" list="patients_list" required
                            placeholder="Digite o nome do paciente">
                        <datalist id="patients_list">
                            @foreach ($patients as $patient)
                                <option value="{{ $patient->name }}">
                            @endforeach
                        </datalist>
                    </div>
                    <div class="campo-fixo">
                        <label for="idade">Idade:</label>
                        <input type="number" id="idade" name="idade" placeholder="Idade" required>
                    </div>
                </div>

                <!-- Campos Estado Civil, RG e Responsável -->
                <div class="campo linha">
                    <div class="campo-fixo">
                        <label for="estado-civil">Estado civil:</label>
                        <input type="text" id="estado-civil" name="estado-civil" placeholder="Estado civil" required>
                    </div>
                    <div class="campo-fixo">
                        <label for="rg">RG:</label>
                        <input type="text" id="rg" name="rg" placeholder="RG" required maxlength="12"
                            oninput="formatarRG(this)" pattern="\d{2}\.\d{3}\.\d{3}-\d{1}"
                            title="O RG deve seguir o formato XX.XXX.XXX-X">
                    </div>
                    <div class="campo-fixo">
                        <label for="responsavel">Responsável</label>
                        <input type="text" id="nome-pai" name="responsavel" placeholder="Responsável" required>
                    </div>
                </div>

            </div>

            <!-- Sessão Histórico Médico -->
            <div class="campo-text">
                <label for="historico_medico">Histórico Médico:</label>
                <textarea id="historico_medico" name="medical_history" placeholder="Insira o histórico médico do paciente.">{{ old('medical_history') }}</textarea>
            </div>

            <!-- Sessão Demanda -->
            <div class="campo-text">
                <label for="demanda">Demanda inicial:</label>
                <textarea id="demanda" name="initial_demand"
                    placeholder="Insira aqui informações sobre a demanda inicial do paciente.">{{ old('initial_demand') }}</textarea>
            </div>

            <!-- Seção de Objetivos -->
            <div class="campo-text">
                <label for="objetivos">Objetivos do tratamento:</label>
                <textarea id="objetivos" name="treatment_goals" placeholder="Insira aqui os objetivos do tratamento.">{{ old('treatment_goals') }}</textarea>
            </div>

            <!-- Seção de Evolução -->
            <div class="campo-text">
                <label for="evolucao">Evolução:</label>
                <textarea id="evolucao" name="evolution" placeholder="Insira aqui as evoluções do tratamento.">{{ old('evolution') }}</textarea>
            </div>

            <!-- Seção de Descrição -->
            <div class="campo-text">
                <label for="gerais">Informações gerais:</label>
                <textarea id="gerais" name="general_info" placeholder="Insira outras informações gerais sobre o paciente.">{{ old('general_info') }}</textarea>
            </div>

            <button type="submit">Criar Prontuário</button>
        </form>
    </div>

    <script>
        // Função para aplicar a máscara no campo RG
        function formatarRG(input) {
            let valor = input.value.replace(/\D/g, ''); // Remove todos os caracteres não numéricos
            if (valor.length <= 2) {
                input.value = valor;
            } else if (valor.length <= 5) {
                input.value = valor.replace(/(\d{2})(\d{1,3})/, '$1.$2');
            } else if (valor.length <= 8) {
                input.value = valor.replace(/(\d{2})(\d{3})(\d{1,3})/, '$1.$2.$3');
            } else if (valor.length <= 10) {
                input.value = valor.replace(/(\d{2})(\d{3})(\d{3})(\d{1})/, '$1.$2.$3-$4');
            } else {
                input.value = valor.replace(/(\d{2})(\d{3})(\d{3})(\d{1})(\d{1})/, '$1.$2.$3-$4');
            }
        }
    </script>

</body>

</html>
