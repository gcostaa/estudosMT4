<?php

$pdo = new PDO('mysql:host=192.168.100.37;dbname=aluraplay',
    'gustavo',
    'mT4SeG@s2s');

$sql = 'INSERT INTO videos (url,title) VALUES (?,?);';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(1,$_POST['url']);
$stmt->bindValue(2,$_POST['titulo']);

var_dump($stmt->execute());
