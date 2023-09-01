<?php

$pdo = new PDO('mysql:host=192.168.100.37;dbname=aluraplay',
    'gustavo',
    'mT4SeG@s2s');

$id = $_GET['id'];
$sql = 'DELETE FROM videos WHERE id = ?';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(1,$id);

if ($stmt->execute() === false) {
    header('Location:index.php?sucesso=0');
}else{
    header('Location:index.php?sucesso=1');
}


