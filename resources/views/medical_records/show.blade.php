<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do Prontuário</title>
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
            max-width: 800px;
            margin: 30px auto;
            position: relative;
        }

        h1 {
            text-align: center;
            color: #4e5b6e;
            font-size: 2.2em;
            margin-bottom: 30px;
        }

        .logo {
            text-align: center;
            margin-bottom: 30px;
        }

        .logo img {
            max-width: 250px;
            height: auto;
        }

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

        .campo input,
        .campo textarea {
            width: 100%;
            padding: 12px;
            font-size: 1em;
            border-radius: 8px;
            border: 1px solid #ddd;
            background-color: #f9f9f9;
            color: #333;
            box-sizing: border-box;
            resize: none;
            /* Impede o redimensionamento */
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
        .campo input[type="number"]:focus,
        .campo textarea:focus {
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

        .campo-dados {
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
        }

        .campo-dados .campo-fixo {
            width: 32%;
        }

        .campo-dados .campo-fixo[data-label="data"] {
            width: 100%;
        }

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
    </style>
</head>

<body>

    <div class="container">
        <a class="btn btn-primary" onclick="window.history.back();">Voltar</a>

        <div class="logo">
            <img src="{{ asset('images/logo.png') }}" alt="Logo">
        </div>

        <!-- Título -->
        <h1>Detalhes do Prontuário</h1>

        <!-- Seção de Dados -->
        <div class="secao-dados">
            <div class="campo campo-dados">
                <div class="campo-fixo">
                    <label for="data">Data:</label>
                    <input type="text" id="data" value="{{ $medicalRecord->data }}" readonly>
                </div>
                <div class="campo-fixo">
                    <label for="patient_id">Paciente:</label>
                    <input type="text" id="patient_id" value="{{ $medicalRecord->patient->name }}" readonly>
                </div>
            </div>
        </div>

        <!-- Histórico Médico -->
        <div class="campo-text">
            <label for="medical_history">Histórico Médico:</label>
            <textarea id="medical_history" readonly>{{ $medicalRecord->medical_history }}</textarea>
        </div>

        <!-- Demanda Inicial -->
        <div class="campo-text">
            <label for="initial_demand">Demanda inicial:</label>
            <textarea id="initial_demand" readonly>{{ $medicalRecord->initial_demand }}</textarea>
        </div>

        <!-- Objetivos do Tratamento -->
        <div class="campo-text">
            <label for="treatment_goals">Objetivos do tratamento:</label>
            <textarea id="treatment_goals" readonly>{{ $medicalRecord->treatment_goals }}</textarea>
        </div>

        <!-- Evolução -->
        <div class="campo-text">
            <label for="evolution">Evolução:</label>
            <textarea id="evolution" readonly>{{ $medicalRecord->evolution }}</textarea>
        </div>

        <!-- Informações Gerais -->
        <div class="campo-text">
            <label for="general_info">Informações gerais:</label>
            <textarea id="general_info" readonly>{{ $medicalRecord->general_info }}</textarea>
        </div>

        <button type="button" onclick="generatePDF()" class="btn-pdf">
            Gerar PDF
        </button>
    </div>

    <script>
        // Função para gerar o PDF
        function generatePDF() {
            const {
                jsPDF
            } = window.jspdf;
            const doc = new jsPDF();

            // Configurações
            const margin = 10; // Margem esquerda
            let y = 20; // Posição vertical inicial
            const lineHeight = 8; // Espaçamento entre as linhas (reduzido)
            const maxHeight = 280; // Altura máxima da página antes de adicionar uma nova página

            // Função para adicionar uma linha de texto
            const addLine = (text, fontSize = 10) => {
                if (y > maxHeight) {
                    doc.addPage(); // Adiciona uma nova página
                    y = 20; // Reinicia a posição vertical
                }
                doc.setFontSize(fontSize); // Define o tamanho da fonte
                doc.text(text, margin, y);
                y += lineHeight;
            };

            // Função para adicionar uma linha horizontal
            const addSeparator = () => {
                if (y > maxHeight) {
                    doc.addPage(); // Adiciona uma nova página
                    y = 20; // Reinicia a posição vertical
                }
                doc.setLineWidth(0.5); // Espessura da linha
                doc.line(margin, y, 200 - margin, y); // Desenha a linha
                y += lineHeight; // Espaço após a linha
            };

            // Captura os valores dos campos
            const data = document.getElementById('data').value;
            const patientName = document.getElementById('patient_id').value;
            const medicalHistory = document.getElementById('medical_history').value;
            const initialDemand = document.getElementById('initial_demand').value;
            const treatmentGoals = document.getElementById('treatment_goals').value;
            const evolution = document.getElementById('evolution').value;
            const generalInfo = document.getElementById('general_info').value;

            // Adiciona o título (fonte maior)
            doc.setFontSize(16);
            addLine("Detalhes do Prontuário", 16);
            doc.setFontSize(10); // Volta ao tamanho padrão para o restante

            // Adiciona informações do prontuário
            addLine(`Data: ${data}`);
            addLine(`Paciente: ${patientName}`);
            y += lineHeight; // Espaço extra

            // Histórico Médico
            addLine("Histórico Médico:");
            addLine(medicalHistory);
            addSeparator(); // Linha separadora
            y += lineHeight; // Espaço extra

            // Demanda Inicial
            addLine("Demanda Inicial:");
            addLine(initialDemand);
            addSeparator(); // Linha separadora
            y += lineHeight; // Espaço extra

            // Objetivos do Tratamento
            addLine("Objetivos do Tratamento:");
            addLine(treatmentGoals);
            addSeparator(); // Linha separadora
            y += lineHeight; // Espaço extra

            // Evolução
            addLine("Evolução:");
            addLine(evolution);
            addSeparator(); // Linha separadora
            y += lineHeight; // Espaço extra

            // Informações Gerais
            addLine("Informações Gerais:");
            addLine(generalInfo);
            addSeparator(); // Linha separadora

            // Salva o PDF
            doc.save("prontuario.pdf");
        }

        // Função para imprimir a página
        function printPage() {
            window.print(); // Abre a caixa de diálogo de impressão do navegador
        }
    </script>
</body>

</html>
