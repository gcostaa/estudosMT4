<?php

$pdo = new PDO('mysql:host=192.168.100.37;dbname=aluraplay',
    'gustavo',
    'mT4SeG@s2s');


    $url = filter_input(INPUT_POST,'url',FILTER_VALIDATE_URL);
    $title = filter_input(INPUT_POST,'titulo');

    if (($url && $title) === false) {

        header('Location:listagemCursos.php?status=error');
        exit();
    }


    $sql = 'INSERT INTO videos (url,title) VALUES (?,?);';

    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(1,$_POST['url']);
    $stmt->bindValue(2,$_POST['titulo']);

    if ($stmt->execute() === false) {
        header('Location:/?status=error');
    }else{
        header('Location:/?status=success');
    }




