<div class="container">
    <!-- Logo -->
    <div class="logo">
        <img src="images/logo.png" alt="Logo">
    </div>

    <!-- Formulário de Login -->
    <form id="form-login" onsubmit="return verificarLogin(event)">
        <div class="campo">
            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email" required>
        </div>

        <div class="campo">
            <label for="senha">Senha:</label>
            <input type="password" id="senha" name="senha" required>
        </div>

        <button type="submit">Entrar</button>
    </form>

    <!-- Mensagem de erro -->
    <div id="mensagem-erro" class="erro" style="display: none;">
        Usuário ou senha inválidos. Favor tentar novamente.
    </div>
</div>
