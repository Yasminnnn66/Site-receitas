<?php
//Formulario das receitas//
namespace Recipe\Mvc\Controller;

use Recipe\Mvc\Repository\RecipeRepository;

$dbPath = __DIR__ . '/../../bancodados.sqlite';
$pdo = new \PDO("sqlite:$dbPath");

class RecipeFormController implements Controller
{
    function __construct(private RecipeRepository $recipeRepository)
    {
    }

    public function processaRequisicao(): void
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);


        $recipe = null;
        if ($id !== false && $id !== null) {
            $recipe = $this->recipeRepository->find($id);
        }

        require_once __DIR__ . "/../../views/recipe-form.php";

    }
}