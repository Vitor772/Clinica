<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/app.css">
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
        {{ $slot }}

    </div>
</body>

</html>
