<?php

namespace Alura\Mvc\Controller;

class NewVideoFormController implements Controller
{

    public function processaRequisicao():void
    {

            require_once __DIR__.'/../Views/newVideoForm.php';
    }
}