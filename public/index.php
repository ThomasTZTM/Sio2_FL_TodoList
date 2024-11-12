<?php

require_once __DIR__ . '/../vendor/autoload.php';

// Récupération des routes
$routes = require_once __DIR__ . '/../config/routes.php'; // On inclu le fichier de route et on le met dans un tableau

// Récupération de l'URL actuelle
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH); // On récupère la partie route

// Recherche de la route correspondante
if (!isset($routes[$uri])) {
    $errorController = new \App\Controller\ErrorController();
    $errorController->error404();
    exit;
}

// Récupération du contrôleur et de l'action
[$controllerName, $action] = $routes[$uri]; // Destructuring
$controllerClass = "App\\Controller\\{$controllerName}";

try {
    // Instanciation du contrôleur et appel de l'action
    $controller = new $controllerClass();
    $controller->$action();
} catch (\Exception $e) {
    error_log($e->getMessage());
    $errorController = new \App\Controller\ErrorController();
    $errorController->error404();
}
