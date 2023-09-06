<?php

namespace Alura\Mvc\Controller;

use Alura\Mvc\Repository\VideoRepository;

class DeleteVideoController implements Controller
{

    public function __construct( private VideoRepository $videoRepository)
    {

    }

    public function processaRequisicao():void
    {
        $id = $_GET['id'];

        $status = $this->videoRepository->remove($id);
        if ($status === false) {
            header('Location:/?sucesso=0');
        }else{
            header('Location:/?sucesso=1');
        }
    }
}