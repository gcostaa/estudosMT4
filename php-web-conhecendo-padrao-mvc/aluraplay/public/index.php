<?php

use Alura\Mvc\Controller\{
    Controller,
    DeleteVideoController,
    EditVideoController,
    NewVideoController,
    NewVideoFormController,
    VideoFormController,
    VideoListController};
use Alura\Mvc\Repository\VideoRepository;

require_once __DIR__.'/../vendor/autoload.php';

$pdo = new PDO('mysql:host=192.168.100.37;dbname=aluraplay',
    'gustavo',
    'mT4SeG@s2s');

$videoRepository = new VideoRepository($pdo);

if (!array_key_exists('PATH_INFO',$_SERVER) || $_SERVER['PATH_INFO'] === '/') {

    $controller = new VideoListController($videoRepository);


} elseif ($_SERVER['PATH_INFO'] === '/novo-video') {

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {

        $controller = new NewVideoFormController($videoRepository);

    } elseif ($_SERVER['REQUEST_METHOD'] === 'POST'){

        $controller = new NewVideoController($videoRepository);

    }
} elseif ($_SERVER['PATH_INFO'] === '/editar-video') {

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {

        $controller = new VideoFormController($videoRepository);

    } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $controller = new EditVideoController($videoRepository);

    }
 }elseif ($_SERVER['PATH_INFO'] === '/remover-video') {

    $controller = new DeleteVideoController($videoRepository);

}else {
    http_response_code(404);
}

/** @var Controller $controller */

$controller->processaRequisicao();
