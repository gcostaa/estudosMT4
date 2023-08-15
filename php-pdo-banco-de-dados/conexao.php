<?php

$caminhoBanco = __DIR__.'/banco.sqlite';
$pdo = new PDO("sqlite:$caminhoBanco");

echo "Conectei";

//essa é a forma como armarzenamos dados no sqlite
$pdo->exec('CREATE TABLE students (id INTEGER PRIMARY KEY, name TEXT, birth_date TEXT)');
