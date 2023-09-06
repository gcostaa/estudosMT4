<?php

namespace Alura\Mvc\Controller;

use Alura\Mvc\Entity\Video;
use Alura\Mvc\Repository\VideoRepository;

class NewVideoController implements Controller
{

    public function __construct( private VideoRepository $videoRepository)
    {

    }

    public function processaRequisicao():void
    {
        $url = filter_input(INPUT_POST,'url',FILTER_VALIDATE_URL);
        $title = filter_input(INPUT_POST,'titulo');

        if (($url && $title) === false) {

            header('Location:/?status=error');
            exit();
        }

        $status = $this->videoRepository->add(new Video($url,$title));

        if ($status === false) {
            header('Location:/?status=error');
        }else{
            header('Location:/?status=success');
        }
    }
}