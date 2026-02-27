<?php

namespace Recipe\Mvc\Controller;
//Configura para criar uma nova receita//

use Recipe\Mvc\Entity\Recipe;
use Recipe\Mvc\Repository\RecipeRepository;

class NewRecipeController implements Controller
{
    function __construct(private RecipeRepository $recipeRepository)
    {
    }

    public function processaRequisicao(): void
    {
        $url = filter_input(INPUT_POST, 'url');
        if ($url === false) {
            header('Location: /?sucesso=0');
            exit();
        }

        $title = filter_input(INPUT_POST, 'title');
        if ($title === false) {
            header('Location: /?sucesso=0');
            exit();
        }

        $description = filter_input(INPUT_POST, 'description');
        if ($description === false) {
            header('Location: /?sucesso=0');
            exit();
        }


        $result = $this->recipeRepository->add(new Recipe($url, $title, $description));
        if ($result === false) {
            header('Location: /?sucesso=0');
        } else {
            header('Location: /?sucesso=1');
        }
    }
}