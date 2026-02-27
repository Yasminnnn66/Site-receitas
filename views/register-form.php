<?php

/** @var Recipe\Mvc\Entity\User|null $users */

?>

<?php require_once __DIR__ . '/inicio-html.php'; ?>
<!--Formulário do cadastro-->

    <main class="container">

        <form class="container__formulario" method="post">
            <h2 class="formulario__titulo">Efetue Cadastro</h2>
            <div class="formulario__campo">
                <b> <label class="campo__etiqueta" for="usuario">Usuário</label> </b>
                <input name="email"
                       value="<?= $users?->email ?? ''; ?>"
                       class="campo__escrita"
                       required
                       placeholder="Digite seu usuário" id='usuario'/>
            </div>

            <div class="formulario__campo">
                <b> <label class="campo__etiqueta" for="senha"> Senha </label></b>
                <input type="password"
                       name="password"
                       value="<?= $users?->password ?? ''; ?>"
                       class="campo__escrita"
                       required
                       placeholder="Digite sua senha"
                       id='senha'/>
            </div>

            <input class="formulario__botao" type="submit" value="Cadastrar"/>
        </form>

    </main>

<?php require_once __DIR__ . '/fim-html.php'; ?>