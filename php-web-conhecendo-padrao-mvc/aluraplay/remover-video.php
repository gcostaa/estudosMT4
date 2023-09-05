<?php

use Alura\Mvc\Repository\VideoRepository;

$pdo = new PDO('mysql:host=192.168.100.37;dbname=aluraplay',
    'gustavo',
    'mT4SeG@s2s');

$id = $_GET['id'];

$repository = new VideoRepository($pdo);
$status = $repository->remove($id);

if ($status === false) {
    header('Location:/?sucesso=0');
}else{
    header('Location:/?sucesso=1');
}


