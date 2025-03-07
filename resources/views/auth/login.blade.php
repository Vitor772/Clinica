<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Anamnese de Psicologia</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f7fc;
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #fff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            margin: 30px;
            position: relative;
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

        .campo input[type="password"] {
            width: 100%;
            padding: 12px;
            font-size: 1em;
            border-radius: 8px;
            border: 1px solid #ddd;
            background-color: #f9f9f9;
            color: #333;
            box-sizing: border-box;
        }

        .campo input:focus {
            outline: none;
            border-color: #6c83c7;
            background-color: #e8effd;
        }

        .erro {
            color: red;
            font-size: 1em;
            text-align: center;
            margin-top: 10px;
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
            width: 100%;
        }

        button:hover {
            background-color: #56688b;
        }
    </style>
</head>

<body>

    <!-- Página de Login -->
    <div class="container">
        <!-- Logo -->
        <div class="logo">
            <img src="images/logo.png" alt="Logo">
        </div>

        <!-- Formulário de Login -->
        <form action="{{ route('auth.login') }}" method="POST">
            @csrf
            <div class="campo">
                <label for="email">E-mail:</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required>
                @if ($errors->has('email'))
                    <div class="erro">{{ $errors->first('email') }}</div>
                @endif
            </div>

            <div class="campo">
                <label for="senha">Senha:</label>
                <input type="password" id="senha" name="password" required>
                @if ($errors->has('password'))
                    <div class="erro">{{ $errors->first('password') }}</div>
                @endif
            </div>

            <button type="submit">Entrar</button>
        </form>

        <!-- Mensagem de erro -->
        @if (session('error'))
            <div id="mensagem-erro" class="erro">
                {{ session('error') }}
            </div>
        @endif
    </div>

</body>

</html>
