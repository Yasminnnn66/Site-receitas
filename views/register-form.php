<?php

/** @var Recipe\Mvc\Entity\User|null $users */

?>

<?php require_once __DIR__ . '/inicio-html.php'; ?>
<!--Formulário do cadastro-->

    <main class="container">

        <form class="container__formulario" method="post">
            <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_token'], ENT_QUOTES, 'UTF-8') ?>">
            <h2 class="formulario__titulo">Efetue Cadastro</h2>
            <div class="formulario__campo">
                <b> <label class="campo__etiqueta" for="usuario">Usuário</label> </b>
                <input name="email"
                       value="<?= htmlspecialchars($users?->email ?? '', ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); ?>"
                       class="campo__escrita"
                       required
                       placeholder="Digite seu usuário" id='usuario'/>
            </div>

            <div class="formulario__campo">
                <b> <label class="campo__etiqueta" for="senha"> Senha </label></b>
                <input type="password"
                       name="password"
                       value=""
                       class="campo__escrita"
                       required
                       placeholder="Digite sua senha"
                       id='senha'/>
            </div>

            <input class="formulario__botao" type="submit" value="Cadastrar"/>
        </form>

    </main>

<?php require_once __DIR__ . '/fim-html.php'; ?>