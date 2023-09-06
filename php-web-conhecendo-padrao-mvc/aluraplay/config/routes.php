<?php

return [

    'GET|/' => \Alura\Mvc\Controller\VideoListController::class,
    'GET|/novo-video' => \Alura\Mvc\Controller\NewVideoFormController::class,
    'POST|/novo-video' => \Alura\Mvc\Controller\NewVideoController::class,
    'GET|/editar-video' => \Alura\Mvc\Controller\VideoFormController::class,
    'POST|/editar-video'=> \Alura\Mvc\Controller\EditVideoController::class,
    'GET|/remover-video' => \Alura\Mvc\Controller\DeleteVideoController::class,
    http_response_code(404)

];