<?php
//Deleta a receita//

namespace Recipe\Mvc\Controller;


use Recipe\Mvc\Entity\Recipe;
use Recipe\Mvc\Repository\RecipeRepository;

class EditRecipeController implements Controller
{
    function __construct(private RecipeRepository $recipeRepository)
    {

    }

    public function processaRequisicao(): void
    {

        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        if ($id === false || $id === null || $id <= 0) {
            header('Location: /list?sucesso=0');
            exit();
        }
        $url = filter_input(INPUT_POST, 'url', FILTER_SANITIZE_URL);
        if ($url === false) {
            header('Location: /list?sucesso=0');
            exit();
        }

        $title = filter_input(INPUT_POST, 'title');
        if ($title === false) {
            header('Location: /list?sucesso=0');
            exit();
        }
        $description = filter_input(INPUT_POST, 'description');
        if ($description === false) {
            header('Location: /list?sucesso=0');
            exit();
        }


        $recipe = new Recipe($url, $title, $description);
        $recipe->setId($id);


        $result = $this->recipeRepository->update($recipe);

        if ($result === false) {
            header('Location: /list?sucesso=0');

        } else {
            header('Location: /list?sucesso=1');
        }
    }
}