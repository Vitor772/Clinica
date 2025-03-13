<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
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
        flex-direction: column;
    }

    .logo {
        text-align: center;
        margin-bottom: 30px;
    }

    .logo img {
        max-width: 250px;
        height: auto;
    }

    /* Estilo para os ícones */
    .icons-container {
        display: flex;
        justify-content: space-around;
        gap: 40px;
    }

    .icon-box {
        font-size: 3.5em;
        cursor: pointer;
        transition: color 0.3s;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        color: #4e5b6e;
    }

    .icon-box:hover {
        color: #6c83c7;
    }

    .icon-label {
        font-size: 0.6em;
        margin-top: 10px;
        color: #4e5b6e;
    }
</style>

<body>

    <form action="{{ route('auth.logout') }}" method="POST" id="logout-form" style="display: none;">
        @csrf
        @method('POST')
    </form>

    <div class="container">
        <div class="logo">
            <img src="images/logo.png" alt="Logo">
        </div>

        <br><br><br><br><br><br>

        <div class="icons-container">
            <!-- Ícone Pacientes (Anamneses) -->
            <div class="icon-box" onclick="location.href='patients'">
                <i class="fas fa-brain"></i>
                <div class="icon-label">Anamneses</div>
            </div>

            <!-- Ícone Prontuários -->
            <div class="icon-box" onclick="location.href='medical_records'">
                <i class="fas fa-folder-open"></i>
                <div class="icon-label">Prontuários</div>
            </div>
        </div>
    </div>



</body>

</html>
