<?php
//Definição das rotas//

use Recipe\Mvc\Controller\Controller;
use Recipe\Mvc\Controller\EditRecipeController;
use Recipe\Mvc\Controller\Error404Controller;
use Recipe\Mvc\Controller\NewUserController;
use Recipe\Mvc\Controller\RecipeListController;
use Recipe\Mvc\Repository\RecipeRepository;
use Recipe\Mvc\Repository\UserRepository;


require_once __DIR__ . '/../vendor/autoload.php';

$dbPath = __DIR__ . '/../bancodados.sqlite';
$pdo = new \PDO("sqlite:$dbPath");
$recipeRepository = new RecipeRepository($pdo);

$routes = require __DIR__ . '/../config/routes.php';

$pathInfo = $_SERVER['PATH_INFO'] ?? '/';
$httpMethod = $_SERVER['REQUEST_METHOD'];

session_start();
$isLoginRoute = $pathInfo === '/login';

if (!array_key_exists('logado', $_SESSION) && !$isLoginRoute && $pathInfo !== '/cadastro') {
    header('Location: /login');
    return;
}
$key = "$httpMethod|$pathInfo";

if (array_key_exists($key, $routes)) {
    $controllerClass = $routes[$key];

    if ($controllerClass === NewUserController::class) {
        $userRepository = new UserRepository($pdo);
        $controller = new $controllerClass($userRepository);
    } elseif ($controllerClass === RecipeListController::class) {
        $controller = new $controllerClass($recipeRepository);
    } else {
        $controller = new $controllerClass($recipeRepository);
    }
} else {
    $controller = new Error404Controller();
}

/** @var Controller $controller */
$controller->processaRequisicao();

