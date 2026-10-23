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

// Cookies de sessao seguros quando servidos por HTTPS.
session_set_cookie_params([
    'httponly' => true,
    'secure' => !empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off',
    'samesite' => 'Lax',
]);
session_start();
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
if ($httpMethod === 'POST') {
    $token = $_POST['csrf_token'] ?? '';
    if (!is_string($token) || !hash_equals($_SESSION['csrf_token'], $token)) {
        http_response_code(403);
        exit('Solicitacao invalida. Atualize a pagina e tente novamente.');
    }
}
$isLoginRoute = $pathInfo === '/login';

if (empty($_SESSION['logado']) && !$isLoginRoute && $pathInfo !== '/cadastro') {
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

