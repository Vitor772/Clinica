<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anamnese de psicologia</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

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
            flex-direction: column;
            box-sizing: border-box;
            height: 100%;
            overflow: auto;
        }

        .container {
            background-color: #fff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 900px;
            margin: 30px auto;
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
            height: auto;
        }

        /* Estilo para o botão de logout */
        .logout-btn {
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

        /* Media Queries para Responsividade */

        /* Dispositivos com largura até 768px (Tablets e Smartphones) */
        @media (max-width: 768px) {
            .container {
                width: 95%;
                padding: 20px;
            }

            h1 {
                font-size: 1.8em;
            }

            .logo img {
                max-width: 200px;
            }

            .campo .linha,
            .campo-dados {
                flex-direction: column;
            }

            .campo .campo-fixo,
            .campo-dados .campo-fixo {
                width: 100%;
            }

            button {
                font-size: 1em;
                padding: 10px 15px;
                bottom: 20px;
                right: 20px;
            }

            .titulo-entrevista {
                font-size: 1.6em;
            }

            .analisetitulo {
                font-size: 1.5em;
            }

            .campo-text textarea {
                height: 120px;
            }
        }

        /* Dispositivos com largura até 480px (Smartphones pequenos) */
        @media (max-width: 480px) {
            h1 {
                font-size: 1.5em;
            }

            .logo img {
                max-width: 150px;
            }

            button {
                font-size: 0.9em;
                padding: 8px 12px;
                bottom: 15px;
                right: 15px;
            }

            .titulo-entrevista {
                font-size: 1.4em;
            }

            .analisetitulo {
                font-size: 1.3em;
            }

            .campo-text textarea {
                height: 100px;
            }
        }
    </style>
</head>

<body>
    <div class="container">

        <a class="btn btn-primary" onclick="window.history.back();">Voltar</a>

        <form action="{{ route('auth.logout') }}" method="POST" id="logout-form" style="display: none;">
            @csrf
            @method('POST')
        </form>

        <button class="logout-btn" onclick="document.getElementById('logout-form').submit();">Logout</button>

        <!-- Alterar a action para a rota de atualização e usar o método PUT ou PATCH -->
        <form action="{{ route('patients.update', $patient->id) }}" method="POST">
            @csrf
            @method('PUT') <!-- Método HTTP PUT para edição -->

            <div class="logo">
                <img src="{{ asset('images/logo.png') }}" alt="Logo">
            </div>

            <!-- Seção de Dados com fundo claro -->
            <div class="secao-dados">
                <!-- Campos Data, Psicóloga e CRP na mesma linha -->
                <div class="campo campo-dados">
                    <div class="campo-fixo">
                        <label for="birth_date">Data de Nascimento:</label>
                        <!-- Preenchendo o campo com a data existente -->
                        <input type="date" id="birth_date" name="birth_date"
                            value="{{ old('birth_date', $patient->birth_date) }}"
                            placeholder="Clique para selecionar a data de nascimento">
                    </div>
                    <div class="campo-fixo">
                        <label for="name">Paciente:</label>
                        <!-- Preenchendo com o nome existente -->
                        <input type="text" id="name" name="name" value="{{ old('name', $patient->name) }}"
                            placeholder="Paciente" required>
                    </div>
                    <div class="campo-fixo">
                        <label for="age">Idade:</label>
                        <!-- Preenchendo com a idade existente -->
                        <input type="number" id="age" name="age" value="{{ old('age', $patient->age) }}"
                            placeholder="Idade" required>
                    </div>
                </div>

                <!-- Campos de estado civil, RG, responsável, etc. -->
                <div class="campo linha">
                    <div class="campo-fixo">
                        <label for="civil_status">Estado civil:</label>
                        <input type="text" id="civil_status" name="civil_status"
                            value="{{ old('civil_status', $patient->civil_status) }}" placeholder="Estado civil"
                            required>
                    </div>
                    <div class="campo-fixo">
                        <label for="id_gov">RG:</label>
                        <input type="text" id="id_gov" name="id_gov"
                            value="{{ old('id_gov', $patient->id_gov) }}" placeholder="RG" required maxlength="12"
                            oninput="formatarRG(this)" pattern="\d{2}\.\d{3}\.\d{3}-\d{1}"
                            title="O RG deve seguir o formato XX.XXX.XXX-X">
                    </div>
                    <div class="campo-fixo">
                        <label for="responsable">Responsável</label>
                        <input type="text" id="responsable" name="responsable"
                            value="{{ old('responsable', $patient->responsable) }}" placeholder="Responsável" required>
                    </div>
                </div>
            </div>

            <!-- Perguntas da anamnese com as informações já preenchidas -->
            <div class="titulo-entrevista">Anamnese (Introdução)</div>
            <div class="espaco-entre-campos-e-titulo"></div>

            <div class="campo-text">
                <label for="family_reason">Qual motivo principal para a família buscar o atendimento?</label>
                <textarea id="family_reason" name="family_reason" placeholder="Insira aqui informações.">{{ old('family_reason', $patient->family_reason) }}</textarea>
            </div>

            <div class="campo-text">
                <label for="demand_start_date">Quando se iniciou essa demanda?</label>
                <textarea id="demand_start_date" name="demand_start_date" placeholder="Insira aqui informações.">{{ old('demand_start_date', $patient->demand_start_date) }}</textarea>
            </div>

            <!-- Outras perguntas da anamnese... -->

            <!-- Perguntas da Anamnese de Gravidez -->
            <div class="titulo-entrevista">Anamnese (Gravidez)</div>
            <div class="espaco-entre-campos-e-titulo"></div>

            <!-- Exemplo de preenchimento de um campo com resposta já existente -->
            <fieldset>
                <legend>1. Foi planejada?</legend>
                <div class="pergunta">
                    <div class="opcoes">
                        <div class="opcao">
                            <input type="radio" id="pregnancy_planned_sim" name="pregnancy_planned" value="1"
                                {{ old('pregnancy_planned', $patient->pregnancy_planned) == '1' ? 'checked' : '' }}>
                            <label for="pregnancy_planned_sim">Sim</label>
                        </div>
                        <div class="opcao">
                            <input type="radio" id="pregnancy_planned_nao" name="pregnancy_planned" value="0"
                                {{ old('pregnancy_planned', $patient->pregnancy_planned) == '0' ? 'checked' : '' }}>
                            <label for="pregnancy_planned_nao">Não</label>
                        </div>
                    </div>
                </div>
            </fieldset>
            <fieldset>
                <legend>2. Sua gravidez foi aceita?</legend>
                <div class="pergunta">
                    <div class="opcoes">
                        <div class="opcao">
                            <input type="radio" id="pregnancy_accepted_sim" name="pregnancy_accepted"
                                value="1"
                                {{ old('pregnancy_accepted', $patient->pregnancy_accepted) == '1' ? 'checked' : '' }}>
                            <label for="pregnancy_accepted_sim">Sim</label>
                        </div>
                        <div class="opcao">
                            <input type="radio" id="pregnancy_accepted_nao" name="pregnancy_accepted"
                                value="0"
                                {{ old('pregnancy_accepted', $patient->pregnancy_accepted) == '0' ? 'checked' : '' }}>
                            <label for="pregnancy_accepted_nao">Não</label>
                        </div>
                    </div>
                </div>
            </fieldset>

            <fieldset>
                <legend>3. Alteração da pressão arterial (eclampsia e pré-eclampsia)?</legend>
                <div class="pergunta">
                    <div class="opcoes">
                        <div class="opcao">
                            <input type="radio" id="blood_pressure_issues_sim" name="blood_pressure_issues"
                                value="1"
                                {{ old('blood_pressure_issues', $patient->blood_pressure_issues) == '1' ? 'checked' : '' }}>
                            <label for="blood_pressure_issues_sim">Sim</label>
                        </div>
                        <div class="opcao">
                            <input type="radio" id="blood_pressure_issues_nao" name="blood_pressure_issues"
                                value="0"
                                {{ old('blood_pressure_issues', $patient->blood_pressure_issues) == '0' ? 'checked' : '' }}>
                            <label for="blood_pressure_issues_nao">Não</label>
                        </div>
                    </div>
                </div>
            </fieldset>

            <fieldset>
                <legend>4. Quadro de doença infecciosa durante a gravidez (TORSCH)?</legend>
                <div class="pergunta">
                    <div class="opcoes">
                        <div class="opcao">
                            <input type="radio" id="infectious_disease_sim" name="infectious_disease"
                                value="1"
                                {{ old('infectious_disease', $patient->infectious_disease) == '1' ? 'checked' : '' }}>
                            <label for="infectious_disease_sim">Sim</label>
                        </div>
                        <div class="opcao">
                            <input type="radio" id="infectious_disease_nao" name="infectious_disease"
                                value="0"
                                {{ old('infectious_disease', $patient->infectious_disease) == '0' ? 'checked' : '' }}>
                            <label for="infectious_disease_nao">Não</label>
                        </div>
                    </div>
                </div>
            </fieldset>

            <fieldset>
                <legend>5. Complicações (sangramentos, ameaças de aborto). Especifique</legend>
                <div class="pergunta">
                    <div class="opcoes">
                        <div class="opcao">
                            <input type="radio" id="pregnancy_complications_sim" name="pregnancy_complications"
                                value="1"
                                {{ old('pregnancy_complications', $patient->pregnancy_complications) == '1' ? 'checked' : '' }}>
                            <label for="pregnancy_complications_sim">Sim</label>
                        </div>
                        <div class="opcao">
                            <input type="radio" id="pregnancy_complications_nao" name="pregnancy_complications"
                                value="0"
                                {{ old('pregnancy_complications', $patient->pregnancy_complications) == '0' ? 'checked' : '' }}>
                            <label for="pregnancy_complications_nao">Não</label>
                        </div>
                    </div>
                    <div class="campo-text">
                        <br>
                        <textarea id="pregnancy_complications_details" name="pregnancy_complications_details"
                            placeholder="Insira aqui informações.">{{ old('pregnancy_complications_details', $patient->pregnancy_complications_details) }}</textarea>
                    </div>
                </div>
            </fieldset>

            <fieldset>
                <legend>6. Uso de medicação? Especifique.</legend>
                <div class="pergunta">
                    <div class="opcoes">
                        <div class="opcao">
                            <input type="radio" id="medication_use_sim" name="medication_use" value="1"
                                {{ old('medication_use', $patient->medication_use) == '1' ? 'checked' : '' }}>
                            <label for="medication_use_sim">Sim</label>
                        </div>
                        <div class="opcao">
                            <input type="radio" id="medication_use_nao" name="medication_use" value="0"
                                {{ old('medication_use', $patient->medication_use) == '0' ? 'checked' : '' }}>
                            <label for="medication_use_nao">Não</label>
                        </div>
                    </div>
                    <div class="campo-text">
                        <br>
                        <textarea id="medication_details" name="medication_details" placeholder="Insira aqui informações.">{{ old('medication_details', $patient->medication_details) }}</textarea>
                    </div>
                </div>
            </fieldset>

            <fieldset>
                <legend>7. Prematuridade? Especifique.</legend>
                <div class="pergunta">
                    <div class="opcoes">
                        <div class="opcao">
                            <input type="radio" id="prematurity_sim" name="prematurity" value="1"
                                {{ old('prematurity', $patient->prematurity) == '1' ? 'checked' : '' }}>
                            <label for="prematurity_sim">Sim</label>
                        </div>
                        <div class="opcao">
                            <input type="radio" id="prematurity_nao" name="prematurity" value="0"
                                {{ old('prematurity', $patient->prematurity) == '0' ? 'checked' : '' }}>
                            <label for="prematurity_nao">Não</label>
                        </div>
                    </div>
                    <div class="campo-text">
                        <br>
                        <textarea id="prematurity_details" name="prematurity_details" placeholder="Insira aqui informações.">{{ old('prematurity_details', $patient->prematurity_details) }}</textarea>
                    </div>
                </div>
            </fieldset>

            <fieldset>
                <legend>8. Tipo de parto?</legend>
                <div class="pergunta">
                    <div class="opcoes">
                        <div class="opcao">
                            <input type="radio" id="birth_type_normal" name="birth_type" value="Normal"
                                {{ old('birth_type', $patient->birth_type) == 'Normal' ? 'checked' : '' }}>
                            <label for="birth_type_normal">Normal</label>
                        </div>
                        <div class="opcao">
                            <input type="radio" id="birth_type_cesareo" name="birth_type" value="Cesáreo"
                                {{ old('birth_type', $patient->birth_type) == 'Cesáreo' ? 'checked' : '' }}>
                            <label for="birth_type_cesareo">Cesáreo</label>
                        </div>
                    </div>
                </div>
            </fieldset>

            <fieldset>
                <legend>9. Complicações no parto?</legend>
                <div class="pergunta">
                    <div class="opcoes">
                        <div class="opcao">
                            <input type="radio" id="birth_complications_sim" name="birth_complications"
                                value="1"
                                {{ old('birth_complications', $patient->birth_complications) == '1' ? 'checked' : '' }}>
                            <label for="birth_complications_sim">Sim</label>
                        </div>
                        <div class="opcao">
                            <input type="radio" id="birth_complications_nao" name="birth_complications"
                                value="0"
                                {{ old('birth_complications', $patient->birth_complications) == '0' ? 'checked' : '' }}>
                            <label for="birth_complications_nao">Não</label>
                        </div>
                    </div>
                </div>
            </fieldset>



        </form>
        <!-- Botão de envio -->
        <button type="submit" style="background-color:#6c83c7;" class="btn btn-primary">Salvar
            Consulta</button>
    </div>

    <body>

</html>
