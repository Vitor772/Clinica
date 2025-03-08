<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Consulta</title>
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

        <div class="logo">
            <img src="{{ asset('images/logo.png') }}" alt="Logo">
        </div>
        <!-- Botão de Logout no canto superior direito -->
        <form action="{{ route('auth.logout') }}" method="POST" id="logout-form" style="display: none;">
            @csrf
            @method('POST')
        </form>

        <button class="logout-btn" onclick="document.getElementById('logout-form').submit();">Logout</button>


        <!-- Título -->
        <h1 class="text-center mb-4">Editar Consulta</h1>

        <div class="secao-dados">
            <form action="{{ route('consults.update', $consultation->id) }}" method="POST">
                @csrf
                @method('PUT') <!-- Método para atualizar -->

                <div class="campo campo-dados">
                    <div class="campo-fixo">
                        <label for="patient_id">Paciente:</label>
                        <select id="patient_id" name="patient_id" class="form-control" required>
                            <option value="">Selecione um paciente</option>
                            @foreach ($patients as $patient)
                                <option value="{{ $patient->id }}"
                                    {{ $consultation->patient_id == $patient->id ? 'selected' : '' }}>
                                    {{ $patient->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="campo-fixo">
                        <label for="consultation_date">Data da Consulta:</label>
                        <input type="date" id="consultation_date" name="consultation_date" class="form-control"
                            value="{{ $consultation->consultation_date }}" required>
                    </div>
                </div>
                <div class="campo linha">
                    <div class="campo-fixo">
                        <label for="description">Descrição:</label>
                        <textarea id="description" name="description" class="form-control" rows="4" required>{{ $consultation->description }}</textarea>
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" style="background-color:#6c83c7;" class="btn btn-primary">Salvar
                        Consulta</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
