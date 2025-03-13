<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Prontuários</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Estilos base (para todos os dispositivos) */
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
            width: 90%;
            max-width: 1200px;
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

        /* Botão Logout (estilo original) */
        .logout-btn {
            background-color: #e74c3c;

            top background-color: #e74c3c;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 1em;
            float: right;

        }

        .logout-btn:hover {
            background-color: #c0392b;
        }

        /* Restante do CSS (mantido igual) */
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

        /* Estilos para a tabela */
        .table {
            background-color: #f4f7fc;
            border-radius: 10px;
            margin-bottom: 30px;
        }

        .table th,
        .table td {
            padding: 15px;
            text-align: left;
        }

        .table th {
            background-color: #f3f4f8;
            color: #4e5b6e;
            font-weight: bold;
        }

        .table td {
            background-color: #fff;
        }

        .table-hover tbody tr:hover {
            background-color: #e8effd;
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
        <form action="{{ route('auth.logout') }}" method="POST" id="logout-form" style="display: none;">
            @csrf
            @method('POST')
        </form>
        <button class="logout-btn" onclick="document.getElementById('logout-form').submit();">Logout</button>


        <div class="logo">
            <img src="{{ asset('images/logo.png') }}" alt="Logo">
        </div>


        <form action="{{ route('medical_records.index') }}" method="GET">
            @csrf
            <div class="secao-dados">
                <div class="campo campo-dados">
                    <div class="campo-fixo">
                        <label for="data">Data:</label>
                        <input type="date" id="data" name="data" value="{{ request()->input('data') }}">
                    </div>
                    <div class="campo-fixo">
                        <label for="patient_name">Paciente:</label>
                        <input type="text" id="patient_name" name="patient_name"
                            placeholder="Digite o nome do paciente" value="{{ request()->input('patient_name') }}">
                    </div>
                    <div class="campo-fixo">
                        <label for="age">Idade:</label>
                        <input type="number" id="age" name="age" placeholder="Idade"
                            value="{{ request()->input('age') }}">
                    </div>
                    <div class="text-center">
                        <a type="submit" style="background-color:#6c83c7;" class="btn btn-primary">Aplicar
                            Filtros</a>
                    </div>
                </div>
            </div>
        </form>

        <h1 class="text-center mb-4">Lista de Prontuários</h1>

        <div class="text-end mb-4">
            <a style="background-color:#6c83c7;" href="{{ route('medical_records.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Adicionar Novo Prontuário
            </a>
        </div>

        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Paciente</th>
                        <th>Idade</th>
                        <th>Responsável</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($medicalRecords as $record)
                        <tr>
                            <td>{{ $record->patient->name }}</td>
                            <td>{{ $record->patient->age }}</td>
                            <td>{{ $record->patient->responsable }}</td>
                            <td>
                                <!-- Link para visualizar detalhes -->
                                <a href="{{ route('medical_records.show', $record->id) }}" class="btn btn-info btn-sm">
                                    <i class="fas fa-eye"></i> Ver
                                </a>

                                <!-- Link para editar -->
                                <a href="{{ route('medical_records.edit', $record->id) }}"
                                    class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i> Editar
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    </div>
</body>

</html>
