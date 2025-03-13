<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anamnese de Psicologia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
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
            position: absolute;
            top: 20px;
            margin-bottom: 905px;
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

        /* Estilo para o resto da página */
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

        .texto-justificado {
            text-align: justify;
            font-size: 1em;
            color: #333;
            margin-top: 20px;
        }

        /* Adicionando estilo para os campos Data, Psicóloga e CRP na mesma linha */
        .campo-dados {
            display: flex;
            justify-content: space-between;
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

        /* Estilo para o campo de descrição */
        .campo-text {
            margin-top: 30px;
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
    </style>
</head>

<body>
    <div class="container">
        <a class="btn btn-primary" onclick="window.history.back();">Voltar</a>

        <h1>Anamnese de Psicologia</h1>

        <!-- Formulário de Anamnese -->
        <form id="anamnese-form">
            <!-- Seção de Dados -->
            <div class="secao-dados">
                <div class="campo">
                    <label for="name">Nome do Paciente:</label>
                    <input type="text" id="name" name="name" value="João da Silva" required>
                </div>
                <div class="campo">
                    <label for="birth_date">Data de Nascimento:</label>
                    <input type="date" id="birth_date" name="birth_date" value="1990-01-01" required>
                </div>
                <div class="campo">
                    <label for="age">Idade:</label>
                    <input type="number" id="age" name="age" value="33" required>
                </div>
                <div class="campo">
                    <label for="civil_status">Estado Civil:</label>
                    <input type="text" id="civil_status" name="civil_status" value="Solteiro" required>
                </div>
                <div class="campo">
                    <label for="id_gov">RG:</label>
                    <input type="text" id="id_gov" name="id_gov" value="12.345.678-9" required>
                </div>
                <div class="campo">
                    <label for="responsable">Responsável:</label>
                    <input type="text" id="responsable" name="responsable" value="Maria Silva" required>
                </div>
            </div>

            <!-- Perguntas da Anamnese -->
            <div class="titulo-entrevista">Anamnese (Introdução)</div>

            <div class="campo-text">
                <label for="family_reason">Qual motivo principal para a família buscar o atendimento?</label>
                <textarea id="family_reason" name="family_reason">Problemas de comportamento.</textarea>
            </div>

            <div class="campo-text">
                <label for="demand_start_date">Quando se iniciou essa demanda?</label>
                <textarea id="demand_start_date" name="demand_start_date">Há 6 meses.</textarea>
            </div>

            <!-- Perguntas da Anamnese de Gravidez -->
            <div class="titulo-entrevista">Anamnese (Gravidez)</div>

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
                            <input type="radio" id="pregnancy_accepted_sim" name="pregnancy_accepted" value="1"
                                {{ old('pregnancy_accepted', $patient->pregnancy_accepted) == '1' ? 'checked' : '' }}>
                            <label for="pregnancy_accepted_sim">Sim</label>
                        </div>
                        <div class="opcao">
                            <input type="radio" id="pregnancy_accepted_nao" name="pregnancy_accepted" value="0"
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

        <!-- Botão para Gerar PDF -->
        <button type="button" onclick="generatePDF()">Gerar PDF</button>
    </div>
    <script>
        function generatePDF() {
    const { jsPDF } = window.jspdf;
    const doc = new jsPDF();

    // Configurações
    const margin = 15; // Margem aumentada para melhorar a legibilidade
    let y = 20; // Posição inicial no eixo Y
    const lineHeight = 8; // Altura da linha
    const maxHeight = 280; // Altura máxima antes de adicionar uma nova página

    // Função para adicionar uma linha de texto
    const addLine = (text, fontSize = 10, isBold = false) => {
        if (y > maxHeight) {
            doc.addPage(); // Adiciona uma nova página
            y = 20; // Reinicia a posição Y
        }
        doc.setFontSize(fontSize);
        doc.setFont(isBold ? 'helvetica' : 'helvetica', isBold ? 'bold' : 'normal');
        doc.text(text, margin, y);
        y += lineHeight;
    };

    // Função para adicionar um separador
    const addSeparator = () => {
        if (y > maxHeight) {
            doc.addPage();
            y = 20;
        }
        doc.setLineWidth(0.5);
        doc.line(margin, y, doc.internal.pageSize.width - margin, y);
        y += lineHeight;
    };

    // Captura os valores dos campos
    const name = document.getElementById('name')?.value || 'Não informado';
    const birthDate = document.getElementById('birth_date')?.value || 'Não informado';
    const age = document.getElementById('age')?.value || 'Não informado';
    const civilStatus = document.getElementById('civil_status')?.value || 'Não informado';
    const idGov = document.getElementById('id_gov')?.value || 'Não informado';
    const responsable = document.getElementById('responsable')?.value || 'Não informado';
    const familyReason = document.getElementById('family_reason')?.value || 'Não informado';
    const demandStartDate = document.getElementById('demand_start_date')?.value || 'Não informado';
    const pregnancyPlanned = document.querySelector('input[name="pregnancy_planned"]:checked')?.value || 'Não informado';
    const pregnancyAccepted = document.querySelector('input[name="pregnancy_accepted"]:checked')?.value || 'Não informado';
    const bloodPressureIssues = document.querySelector('input[name="blood_pressure_issues"]:checked')?.value || 'Não informado';
    const infectiousDisease = document.querySelector('input[name="infectious_disease"]:checked')?.value || 'Não informado';
    const pregnancyComplications = document.querySelector('input[name="pregnancy_complications"]:checked')?.value || 'Não informado';
    const pregnancyComplicationsDetails = document.getElementById('pregnancy_complications_details')?.value || 'Não informado';
    const medicationUse = document.querySelector('input[name="medication_use"]:checked')?.value || 'Não informado';
    const medicationDetails = document.getElementById('medication_details')?.value || 'Não informado';
    const prematurity = document.querySelector('input[name="prematurity"]:checked')?.value || 'Não informado';
    const prematurityDetails = document.getElementById('prematurity_details')?.value || 'Não informado';
    const birthType = document.querySelector('input[name="birth_type"]:checked')?.value || 'Não informado';
    const birthComplications = document.querySelector('input[name="birth_complications"]:checked')?.value || 'Não informado';

    // Adiciona o título (fonte maior)
    addLine("Anamnese de Psicologia", 16, true);
    y += lineHeight; // Espaço extra após o título

    // Adiciona informações do paciente
    addLine(`Nome do Paciente: ${name}`);
    addLine(`Data de Nascimento: ${birthDate}`);
    addLine(`Idade: ${age}`);
    addLine(`Estado Civil: ${civilStatus}`);
    addLine(`RG: ${idGov}`);
    addLine(`Responsável: ${responsable}`);
    y += lineHeight; // Espaço extra

    // Perguntas da Anamnese
    addLine("Qual motivo principal para a família buscar o atendimento?", 12, true);
    addLine(familyReason);
    y += lineHeight; // Espaço extra

    addLine("Quando se iniciou essa demanda?", 12, true);
    addLine(demandStartDate);
    y += lineHeight; // Espaço extra

    // Perguntas da Anamnese de Gravidez
    addLine("1. Foi planejada?", 12, true);
    addLine(`( ${pregnancyPlanned === '1' ? 'X' : ' '} ) Sim`);
    addLine(`( ${pregnancyPlanned === '0' ? 'X' : ' '} ) Não`);
    y += lineHeight; // Espaço extra

    addLine("2. Sua gravidez foi aceita?", 12, true);
    addLine(`( ${pregnancyAccepted === '1' ? 'X' : ' '} ) Sim`);
    addLine(`( ${pregnancyAccepted === '0' ? 'X' : ' '} ) Não`);
    y += lineHeight; // Espaço extra

    addLine("3. Alteração da pressão arterial (eclampsia e pré-eclampsia)?", 12, true);
    addLine(`( ${bloodPressureIssues === '1' ? 'X' : ' '} ) Sim`);
    addLine(`( ${bloodPressureIssues === '0' ? 'X' : ' '} ) Não`);
    y += lineHeight; // Espaço extra

    addLine("4. Quadro de doença infecciosa durante a gravidez (TORSCH)?", 12, true);
    addLine(`( ${infectiousDisease === '1' ? 'X' : ' '} ) Sim`);
    addLine(`( ${infectiousDisease === '0' ? 'X' : ' '} ) Não`);
    y += lineHeight; // Espaço extra

    addLine("5. Complicações (sangramentos, ameaças de aborto). Especifique", 12, true);
    addLine(`( ${pregnancyComplications === '1' ? 'X' : ' '} ) Sim`);
    addLine(`( ${pregnancyComplications === '0' ? 'X' : ' '} ) Não`);
    addSeparator(); // Linha separadora
    addLine(`Detalhes: ${pregnancyComplicationsDetails}`);
    y += lineHeight; // Espaço extra

    addLine("6. Uso de medicação? Especifique.", 12, true);
    addLine(`( ${medicationUse === '1' ? 'X' : ' '} ) Sim`);
    addLine(`( ${medicationUse === '0' ? 'X' : ' '} ) Não`);
    addSeparator(); // Linha separadora
    addLine(`Detalhes: ${medicationDetails}`);
    y += lineHeight; // Espaço extra

    addLine("7. Prematuridade? Especifique.", 12, true);
    addLine(`( ${prematurity === '1' ? 'X' : ' '} ) Sim`);
    addLine(`( ${prematurity === '0' ? 'X' : ' '} ) Não`);
    addSeparator(); // Linha separadora
    addLine(`Detalhes: ${prematurityDetails}`);
    y += lineHeight; // Espaço extra

    addLine("8. Tipo de parto?", 12, true);
    addLine(`( ${birthType === 'Normal' ? 'X' : ' '} ) Normal`);
    addLine(`( ${birthType === 'Cesáreo' ? 'X' : ' '} ) Cesáreo`);
    y += lineHeight; // Espaço extra

    addLine("9. Complicações no parto?", 12, true);
    addLine(`( ${birthComplications === '1' ? 'X' : ' '} ) Sim`);
    addLine(`( ${birthComplications === '0' ? 'X' : ' '} ) Não`);

    // Salva o PDF
    doc.save("anamnese.pdf");
}
    </script>
</body>

</html>
