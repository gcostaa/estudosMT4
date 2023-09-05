<?php

use Alura\Mvc\Entity\Video;
use Alura\Mvc\Repository\VideoRepository;

$pdo = new PDO('mysql:host=192.168.100.37;dbname=aluraplay',
    'gustavo',
    'mT4SeG@s2s');

$id = $_GET['id'];

$url = filter_input(INPUT_POST,'url',FILTER_VALIDATE_URL);
$title = filter_input(INPUT_POST,'titulo');

if (($url && $title) === false) {

    header('Location:listagemCursos.php?status=error');
    exit();
}

$video = new Video($url,$title);
$video->setId($id);

$repository = new VideoRepository($pdo);
$status = $repository->update($video);


if ($status === false) {
    header('Location:/?status=error');
}else{
    header('Location:/?status=success');
}