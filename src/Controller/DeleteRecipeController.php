<?php
//Deleta a receita//
namespace Recipe\Mvc\Controller;


use Recipe\Mvc\Repository\RecipeRepository;

class DeleteRecipeController implements Controller
{
    function __construct(private RecipeRepository $recipeRepository)
    {
    }
    public function processaRequisicao(): void
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        if ($id === false) {
            header('Location: /list?sucesso=0');
            exit();
        }

        $result = $this->recipeRepository->remove($id);
        if ($result === false) {
            header('Location: /list?sucesso=0');

        }else{
            header('Location: /list?sucesso=1');
        }
    }
}