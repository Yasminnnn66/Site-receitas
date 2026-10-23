<?php
//Lugar das rotas//

use Recipe\Mvc\Controller\DeleteRecipeController;
use Recipe\Mvc\Controller\EditRecipeController;
use Recipe\Mvc\Controller\Inicio;
use Recipe\Mvc\Controller\LoginController;
use Recipe\Mvc\Controller\LoginFormController;
use Recipe\Mvc\Controller\LogoutController;
use Recipe\Mvc\Controller\NewRecipeController;
use Recipe\Mvc\Controller\NewUserController;
use Recipe\Mvc\Controller\RecipeFormController;
use Recipe\Mvc\Controller\RecipeListController;
use Recipe\Mvc\Controller\RegisterFormController;

return [
    'GET|/' => Inicio::class,
    'GET|/list' => RecipeListController::class,
    'GET|/nova-receita' => RecipeFormController::class,
    'POST|/nova-receita' => NewRecipeController::class,
    'GET|/editar-receita' => RecipeFormController::class,
    'POST|/editar-receita' => EditRecipeController::class,
    'POST|/remover-receita' => DeleteRecipeController::class,
    'GET|/login' => LoginFormController::class,
    'POST|/login' => LoginController::class,
    'POST|/logout' => LogoutController::class,
    'GET|/cadastro' => RegisterFormController::class,
    'POST|/cadastro' => NewUserController::class,
];