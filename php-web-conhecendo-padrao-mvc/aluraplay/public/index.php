<?php

use Alura\Mvc\Controller\VideoListController;
use Alura\Mvc\Repository\VideoRepository;

require_once __DIR__.'/../vendor/autoload.php';

$pdo = new PDO('mysql:host=192.168.100.37;dbname=aluraplay',
    'gustavo',
    'mT4SeG@s2s');

$videoRepository = new VideoRepository($pdo);

if (!array_key_exists('PATH_INFO',$_SERVER) || $_SERVER['PATH_INFO'] === '/') {

    $controller = new VideoListController($videoRepository);
    $controller->processaRequisicaoListagemGeral();


} elseif ($_SERVER['PATH_INFO'] === '/novo-video') {

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {

        $controller = new VideoListController($videoRepository);
        $controller->processaRequisicaoParaUmNovoVideo();

    } elseif ($_SERVER['REQUEST_METHOD'] === 'POST'){

        $controller = new VideoListController($videoRepository);
        $controller->processaRequisicaoParaAdicionarUmNovoVideo();

    }
} elseif ($_SERVER['PATH_INFO'] === '/editar-video') {

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {

        $controller = new VideoListController($videoRepository);
        $controller->processaRequisicaoDoformularioParaEditarUmVideo();

    } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $controller = new VideoListController($videoRepository);
        $controller->processaRequisicaoParaEditarUmVideoExistente();

    }
 }elseif ($_SERVER['PATH_INFO'] === '/remover-video') {

    $controller = new VideoListController($videoRepository);
    $controller->processaRequisicaoParaExcluirUmVideo();

}else {
    http_response_code(404);
}
