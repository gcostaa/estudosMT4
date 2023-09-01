<?php

$pdo = new PDO('mysql:host=192.168.100.37;dbname=aluraplay',
    'gustavo',
    'mT4SeG@s2s');

$id = $_GET['id'];

$url = filter_input(INPUT_POST,'url',FILTER_VALIDATE_URL);
$title = filter_input(INPUT_POST,'titulo');

if (($url && $title) === false) {

    header('Location:index.php?status=error');
    exit();
}

$update = 'UPDATE videos SET url=?, title=? where id=?';
$stmt = $pdo->prepare($update);
$stmt->bindValue(1,$url);
$stmt->bindValue(2,$title);
$stmt->bindValue(3,$id);

if ($stmt->execute() === false) {
    header('Location:index.php?status=error');
}else{
    header('Location:index.php?status=success');
}