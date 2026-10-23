<?php
use Recipe\Mvc\Entity\Recipe;

/** @var Recipe|null $recipe */

?>
<!--Formulario da receita-->
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Formulário de Receita</title>
        <link href="https://fonts.cdnfonts.com/css/itc-benguiat-std" rel="stylesheet">
        <link href="/css/Form-Recipe.css" rel="stylesheet">

    </head>
    <body>
    <main class="container">
        <form class="container__formulario" method="post">
            <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_token'], ENT_QUOTES, 'UTF-8') ?>">
            <h2 class="formulario__titulo">Envie sua receita!</h2>

            <!-- Campo para URL -->
            <div class="formulario__campo">
                <label class="campo__etiqueta" for="url">Insira a URL da sua imagem!</label>
                <input name="url"
                       value="<?= htmlspecialchars($recipe?->url ?? '', ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') ?>"
                       class="campo__escrita"
                       required
                       placeholder="Por exemplo: https://www.shutterstock.com/pt/search/comida"
                       id="url" />
            </div>

            <!-- Campo para o título da receita -->
            <div class="formulario__campo">
                <label class="campo__etiqueta" for="title">Nome da receita</label>
                <input name="title"
                       value="<?= htmlspecialchars($recipe?->title ?? '', ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') ?>"
                       class="campo__escrita"
                       required
                       placeholder="Neste campo, dê o nome da receita"
                       id="titulo" />
            </div>

            <!-- Campo para descrição da receita -->
            <div class="formulario__campo">
                <label class="campo__etiqueta" for="description">Descrição</label>
                <textarea name="description"
                          class="campo__escrita"
                          required
                          placeholder="Neste campo, descreva os ingredientes"
                          id="descricao"><?= htmlspecialchars($recipe?->description ?? '', ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') ?></textarea>
            </div>

            <!-- Botões de envio e cancelamento -->
            <div class="formulario__botoes">
                <input class="formulario__botao" type="submit" value="Enviar" />
                <a class="formulario__botao" href="/">Cancelar</a>
            </div>
        </form>
    </main>
    </body>
    </html>

<?php require_once __DIR__ . '/fim-html.php';
