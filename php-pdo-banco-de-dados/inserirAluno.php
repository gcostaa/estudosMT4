<?php

use Alura\Pdo\Domain\Model\Student;
use Alura\Pdo\Infrastructure\Persistence\ConnectionCreator;

require_once 'vendor/autoload.php';

// IMPLEMENTAÇÃO CORRETA EM src/Infra/Repo/PdoStudentRepository

$pdo = ConnectionCreator::createConnection();

$student = new Student(
    null,
    'Vitor 2',
    new \DateTimeImmutable('1998-04-09')
);

//$sqlInsert = "INSERT INTO students (name, birth_date) VALUES ('{$student->name()}','{$student->birthDate()->format('Y-m-d')}');";
$sqlInsert = "INSERT INTO students (name, birth_date) VALUES (:name,:niver);";
$statement = $pdo->prepare($sqlInsert);
$statement->bindValue(':name', $student->name());
$statement->bindValue(':niver', $student->birthDate()->format('Y-m-d'));

if($statement->execute()) {
    echo "Aluno incluído";
}

