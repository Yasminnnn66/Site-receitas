<?php

namespace Recipe\Mvc\Controller;
//Redireciona para a lista de receitas//
use Recipe\Mvc\Repository\RecipeRepository;

class RecipeListController implements Controller
{
    function __construct(private RecipeRepository $recipeRepository)
    {
    }

    public function processaRequisicao(): void
    {
        $recipeList = $this->recipeRepository->all();
        require_once __DIR__ . "/../../views/recipe-list.php";
    }
}