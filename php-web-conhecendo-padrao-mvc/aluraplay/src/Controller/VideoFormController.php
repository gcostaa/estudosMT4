<?php

namespace Alura\Mvc\Controller;

use Alura\Mvc\Repository\VideoRepository;

class VideoFormController implements Controller
{

    public function __construct( private VideoRepository $videoRepository)
    {

    }

    public function processaRequisicao():void
    {
        $video = $this->videoRepository->single(intval($_GET['id']));

        require_once __DIR__ . '/../Views/videoForm.php';

    }

}

