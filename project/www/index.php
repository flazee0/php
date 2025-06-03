<?php

spl_autoload_register(function(string $className) {
    require dirname(__DIR__) . DIRECTORY_SEPARATOR . $className . '.php';
});

$route = $_GET['route'] ?? null;
$routePatterns = require 'route.php';
$isRouteFound = false;

foreach ($routePatterns as $pattern => [$controllerClass, $actionMethod]) {
    if (preg_match($pattern, $route, $matches)) {
        $isRouteFound = true;
        
        array_shift($matches);
        
        $controller = new $controllerClass();   
        $controller->$actionMethod(...$matches);
        
        break;
    }
}

if (!$isRouteFound) {
    http_response_code(404);
    echo 'Страница не найдена';
}