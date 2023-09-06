<?php

use Alura\Mvc\Infrastructure\Connection;
use Alura\Mvc\Controller\{
    Controller};
use Alura\Mvc\Repository\VideoRepository;

require_once __DIR__.'/../vendor/autoload.php';

$pdo = Connection::connectionCreator();

$videoRepository = new VideoRepository($pdo);

$routes = require_once __DIR__ . '/../config/routes.php';

//Se não existir será barra
$pathInfo = $_SERVER['PATH_INFO'] ?? '/';

$httpMethod =   $_SERVER['REQUEST_METHOD'];

$key = "$httpMethod|$pathInfo";

if (array_key_exists($key,$routes)) {

    //Ira retornar o nome da classe, pois em route usamos ::class
    $controllerClass = $routes["$httpMethod|$pathInfo"];

    $controller = new $controllerClass($videoRepository);
} else {

    http_response_code(404);
}

/** @var Controller $controller */

$controller->processaRequisicao();
