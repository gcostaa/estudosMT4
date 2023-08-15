<?php

use Alura\Pdo\Domain\Model\Student;

require_once 'vendor/autoload.php';

$databasePath = __DIR__.'/banco.sqlite';
$pdo = new PDO("sqlite:$databasePath");

$student = new Student(
    null,
    'Gustavo',
    new \DateTimeImmutable('1999-06-05')
);

$sqlInsert = "INSERT INTO students (name, birth_date) VALUES ('{$student->name()}','{$student->birthDate()->format('Y-m-d')}');";

//exec retorna a quantidade de linha afetada
var_dump($pdo->exec($sqlInsert));

