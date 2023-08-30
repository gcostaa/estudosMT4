<?php

$pdo = new PDO('mysql:host=192.168.100.37;dbname=aluraplay',
    'gustavo',
    'mT4SeG@s2s');
$stmt = $pdo->prepare("SELECT * FROM videos");
var_dump($stmt->execute());