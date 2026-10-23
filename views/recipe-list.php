<?php

use Recipe\Mvc\Entity\Recipe;

/** @var Recipe[] $recipeList */

?>
<!--Lista das entradas (receitas)-->
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>List</title>
        <link href="https://fonts.cdnfonts.com/css/itc-benguiat-std" rel="stylesheet">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <link href='/css/Recipe-list.css' rel='stylesheet'>


    </head>
<body>
<div class="container">
    <h1 class="mt-3">Lista de Entradas</h1>
    <a href="/" class="btn btn-primary"><i class='bx bxs-log-out'></i></a>
    <ul class="recipe__container" alt="recipe">
        <?php foreach ($recipeList as $recipe) { ?>
            <li class="recipe__item">
                <img src="<?= htmlspecialchars($recipe->url, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); ?>" alt="Imagem da Receita">
                <div class="descricao-receita">
                    <h3><?= htmlspecialchars($recipe->title, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); ?></h3>
                    <ul>
                        <?php foreach (explode("\n", $recipe->description) as $ingredient) { ?>
                            <li><?= htmlspecialchars($ingredient, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); ?></li>
                        <?php } ?>
                    </ul>
                </div>
                <div class="acoes-video">
                    <a href="/editar-receita?id=<?= (int) $recipe->id; ?>">Editar</a>
                    <form method="post" action="/remover-receita?id=<?= (int) $recipe->id; ?>" onsubmit="return confirm('Excluir esta receita?')">
                      <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_token'], ENT_QUOTES, 'UTF-8') ?>">
                      <button type="submit">Excluir</button>
                    </form>
                </div>
            </li>
        <?php } ?>
    </ul>

<?php require_once __DIR__ . '/fim-html.php';
