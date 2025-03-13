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

        .btn-primary {
            background-color: #6c83c7;
            border: none;
            padding: 10px 20px;
            font-size: 1.1em;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn-primary:hover {
            background-color: #56688b;
        }

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

        <form action="{{ route('patients.store') }}" method="POST">
            @csrf <!-- Token CSRF para segurança -->

            <div class="logo">
                <img src="{{ asset('images/logo.png') }}" alt="Logo">
            </div>

            <!-- Seção de Dados com fundo claro -->
            <div class="secao-dados">
                <!-- Campos Data, Psicóloga e CRP na mesma linha -->
                <div class="campo campo-dados">
                    <div class="campo-fixo">
                        <label for="birth_date">Data:</label>
                        <input type="date" id="birth_date" name="birth_date" value=""
                            placeholder="Clique para selecionar a data">
                    </div>
                    <div class="campo-fixo">
                        <label for="name">Paciente:</label>
                        <input type="text" id="name" name="name" placeholder="Paciente" required>
                    </div>
                    <div class="campo-fixo">
                        <label for="age">Idade:</label>
                        <input type="number" id="age" name="age" placeholder="Idade" required>
                    </div>
                </div>

                <!-- Campos Paciente, Idade, Responsavel -->
                <div class="campo linha">
                    <div class="campo-fixo">
                        <label for="civil_status">Estado civil:</label>
                        <input type="text" id="civil_status" name="civil_status" placeholder="Estado civil" required>
                    </div>
                    <div class="campo-fixo">
                        <label for="id_gov">RG:</label>
                        <input type="text" id="id_gov" name="id_gov" placeholder="RG" required maxlength="12"
                            oninput="formatarRG(this)" pattern="\d{2}\.\d{3}\.\d{3}-\d{1}"
                            title="O RG deve seguir o formato XX.XXX.XXX-X">
                    </div>
                    <div class="campo-fixo">
                        <label for="responsable">Responsável</label>
                        <input type="text" id="responsable" name="responsable" placeholder="Responsável" required>
                    </div>
                </div>
            </div>

            <!-- Espaço entre os campos e o título -->
            <div class="espaco-entre-campos-e-titulo"></div>

            <div class="titulo-entrevista">Anamnese (Introdução)</div>
            <div class="espaco-entre-campos-e-titulo"></div>

            <!-- Anamnese Introdução -->
            <div class="campo-text">
                <label for="family_reason">Qual motivo principal para o a família buscar o atendimentos?</label>
                <textarea id="family_reason" name="family_reason" placeholder="Insira aqui informações."></textarea>
            </div>
            <div class="campo-text">
                <label for="demand_start_date">Quando se iniciou essa demanda?</label>
                <textarea id="demand_start_date" name="demand_start_date" placeholder="Insira aqui informações."></textarea>
            </div>
            <div class="campo-text">
                <label for="behavior_environments">Em quais ambientes esse comportamento ocorre? ( casa/ escola,
                    etc)</label>
                <textarea id="behavior_environments" name="behavior_environments" placeholder="Insira aqui informações."></textarea>
            </div>
            <div class="campo-text">
                <label for="specialized_treatment">A criança realiza algum outro atendimento especializado? Ou já
                    realizou?</label>
                <textarea id="specialized_treatment" name="specialized_treatment" placeholder="Insira aqui informações."></textarea>
            </div>
            <div class="campo-text">
                <label for="school_start">Como foi o início da vida escolar?</label>
                <textarea id="school_start" name="school_start" placeholder="Insira aqui informações."></textarea>
            </div>
            <div class="campo-text">
                <label for="current_school_performance">Como está o desempenho escolar atualmente?</label>
                <textarea id="current_school_performance" name="current_school_performance" placeholder="Insira aqui informações."></textarea>
            </div>
            <div class="campo-text">
                <label for="has_close_friends">A criança tem amigos mais próximos? Há alguma dificuldade de
                    socializar?</label>
                <textarea id="has_close_friends" name="has_close_friends" placeholder="Insira aqui informações."></textarea>
            </div>

            <!-- Anamnese Gravidez -->
            <div class="titulo-entrevista">Anamnese (Gravidez)</div>
            <div class="espaco-entre-campos-e-titulo"></div>

            <!-- Pergunta 1: Foi planejada? -->
            <fieldset>
                <legend>1. Foi planejada?</legend>
                <div class="pergunta">
                    <div class="opcoes">
                        <div class="opcao">
                            <input type="radio" id="pregnancy_planned_sim" name="pregnancy_planned"
                                value="1">
                            <label for="pregnancy_planned_sim">Sim</label>
                        </div>
                        <div class="opcao">
                            <input type="radio" id="pregnancy_planned_nao" name="pregnancy_planned"
                                value="0">
                            <label for="pregnancy_planned_nao">Não</label>
                        </div>
                    </div>
                </div>
            </fieldset>

            <!-- Pergunta 2: Sua gravidez foi aceita? -->
            <fieldset>
                <legend>2. Sua gravidez foi aceita?</legend>
                <div class="pergunta">
                    <div class="opcoes">
                        <div class="opcao">
                            <input type="radio" id="pregnancy_accepted_sim" name="pregnancy_accepted"
                                value="1">
                            <label for="pregnancy_accepted_sim">Sim</label>
                        </div>
                        <div class="opcao">
                            <input type="radio" id="pregnancy_accepted_nao" name="pregnancy_accepted"
                                value="0">
                            <label for="pregnancy_accepted_nao">Não</label>
                        </div>
                    </div>
                </div>
            </fieldset>

            <!-- Pergunta 3: Alteração da pressão arterial (eclampsia e pré-eclampsia)? -->
            <fieldset>
                <legend>3. Alteração da pressão arterial (eclampsia e pré-eclampsia)?</legend>
                <div class="pergunta">
                    <div class="opcoes">
                        <div class="opcao">
                            <input type="radio" id="blood_pressure_issues_sim" name="blood_pressure_issues"
                                value="1">
                            <label for="blood_pressure_issues_sim">Sim</label>
                        </div>
                        <div class="opcao">
                            <input type="radio" id="blood_pressure_issues_nao" name="blood_pressure_issues"
                                value="0">
                            <label for="blood_pressure_issues_nao">Não</label>
                        </div>
                    </div>
                </div>
            </fieldset>

            <!-- Pergunta 4: Quadro de doença infecciosa durante a gravidez (TORSCH)? -->
            <fieldset>
                <legend>4. Quadro de doença infecciosa durante a gravidez (TORSCH)?</legend>
                <div class="pergunta">
                    <div class="opcoes">
                        <div class="opcao">
                            <input type="radio" id="infectious_disease_sim" name="infectious_disease"
                                value="1">
                            <label for="infectious_disease_sim">Sim</label>
                        </div>
                        <div class="opcao">
                            <input type="radio" id="infectious_disease_nao" name="infectious_disease"
                                value="0">
                            <label for="infectious_disease_nao">Não</label>
                        </div>
                    </div>
                </div>
            </fieldset>

            <!-- Pergunta 5: Complicações (sangramentos, ameaças de aborto). Especifique -->
            <fieldset>
                <legend>5. Complicações (sangramentos, ameaças de aborto). Especifique</legend>
                <div class="pergunta">
                    <div class="opcoes">
                        <div class="opcao">
                            <input type="radio" id="pregnancy_complications_sim" name="pregnancy_complications"
                                value="1">
                            <label for="pregnancy_complications_sim">Sim</label>
                        </div>
                        <div class="opcao">
                            <input type="radio" id="pregnancy_complications_nao" name="pregnancy_complications"
                                value="0">
                            <label for="pregnancy_complications_nao">Não</label>
                        </div>
                    </div>
                    <div class="campo-text">
                        <br>
                        <textarea id="pregnancy_complications_details" name="pregnancy_complications_details"
                            placeholder="Insira aqui informações."></textarea>
                    </div>
                </div>
            </fieldset>

            <!-- Pergunta 6: Uso de medicação? Especifique. -->
            <fieldset>
                <legend>6. Uso de medicação? Especifique.</legend>
                <div class="pergunta">
                    <div class="opcoes">
                        <div class="opcao">
                            <input type="radio" id="medication_use_sim" name="medication_use" value="1">
                            <label for="medication_use_sim">Sim</label>
                        </div>
                        <div class="opcao">
                            <input type="radio" id="medication_use_nao" name="medication_use" value="0">
                            <label for="medication_use_nao">Não</label>
                        </div>
                    </div>
                    <div class="campo-text">
                        <br>
                        <textarea id="medication_details" name="medication_details" placeholder="Insira aqui informações."></textarea>
                    </div>
                </div>
            </fieldset>

            <!-- Pergunta 7: Prematuridade? Especifique. -->
            <fieldset>
                <legend>7. Prematuridade? Especifique.</legend>
                <div class="pergunta">
                    <div class="opcoes">
                        <div class="opcao">
                            <input type="radio" id="prematurity_sim" name="prematurity" value="1">
                            <label for="prematurity_sim">Sim</label>
                        </div>
                        <div class="opcao">
                            <input type="radio" id="prematurity_nao" name="prematurity" value="0">
                            <label for="prematurity_nao">Não</label>
                        </div>
                    </div>
                    <div class="campo-text">
                        <br>
                        <textarea id="prematurity_details" name="prematurity_details" placeholder="Insira aqui informações."></textarea>
                    </div>
                </div>
            </fieldset>

            <!-- Pergunta 8: Tipo de parto? -->
            <fieldset>
                <legend>8. Tipo de parto?</legend>
                <div class="pergunta">
                    <div class="opcoes">
                        <div class="opcao">
                            <input type="radio" id="birth_type_normal" name="birth_type" value="Normal">
                            <label for="birth_type_normal">Normal</label>
                        </div>
                        <div class="opcao">
                            <input type="radio" id="birth_type_cesareo" name="birth_type" value="Cesáreo">
                            <label for="birth_type_cesareo">Cesáreo</label>
                        </div>
                    </div>
                </div>
            </fieldset>

            <!-- Pergunta 9: Complicações no parto? -->
            <fieldset>
                <legend>9. Complicações no parto?</legend>
                <div class="pergunta">
                    <div class="opcoes">
                        <div class="opcao">
                            <input type="radio" id="birth_complications_sim" name="birth_complications"
                                value="1">
                            <label for="birth_complications_sim">Sim</label>
                        </div>
                        <div class="opcao">
                            <input type="radio" id="birth_complications_nao" name="birth_complications"
                                value="0">
                            <label for="birth_complications_nao">Não</label>
                        </div>
                    </div>
                </div>
            </fieldset>
            <button type="submit" style="background-color:#6c83c7;" class="btn btn-primary">Salvar
                Consulta</button>
        </form>

    </div>

</body>

</html>
