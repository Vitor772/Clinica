<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="css/app.css">
</head>
<style>
    .logo {
        text-align: center;
        margin-bottom: 30px;
    }

    .logo img {
        max-width: 250px;
        height: auto;
    }
</style>

<body>

    <button class="logout-btn" onclick="logout()">Logout</button>

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
