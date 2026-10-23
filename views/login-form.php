<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <link rel="stylesheet" href="/css/reset.css">
    <link rel="stylesheet" href="/css/login.css">
</head>

<body>
<div>
    <img src="img/Pedidos & Sabores.gif" alt="e-menu">
</div>
<a class="logo" href="/login"></a>
<section>
    <input class="butao1" type="button" value="Login"/>
    <a href="/cadastro" class="butao2">Cadastrar</a>
</section>
<main class="container">

    <h1><b>Seja bem-vindo!</b></h1>
    <h3>Por favor, faça o login da sua conta.</h3>


    <form action="/login" method="POST">
        <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_token'], ENT_QUOTES, 'UTF-8') ?>">
        <label for="email">Email</label>
        <div>
            <input type="email" id="email" name="email" maxlength="50" size="50" required>
        </div>

        <label for="senha">Senha</label>
        <div>
            <input type="password" id="senha" name="pwd" maxlength="25" size="50" required>
        </div>

        <a href="https://suaurlpararesetarsenha.com"><b>Esqueceu a senha?</b></a>
        <input class="butao3" type="submit" value="Entrar">
    </form>
</main>
<footer>
    <img src="/img/Logo Escrita.png" alt="mr. phellipe">
    <a href="https://policies.google.com/terms?hl=en">
        <p>Terms and conditions & Privacy Policy</p>
    </a>
</footer>
</body>

</html>
