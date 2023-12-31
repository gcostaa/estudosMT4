<?php

use Alura\Pdo\Domain\Model\Student;
use Alura\Pdo\Infrastructure\Persistence\ConnectionCreator;
use Alura\Pdo\Infrastructure\Repository\PdoStudentRepository;

require_once "vendor/autoload.php";

$connection = ConnectionCreator::createConnection();
$repositoryStudent = new PdoStudentRepository($connection);

//Inicia uma transação
$connection->beginTransaction();

try {

$student = new Student(
    null,
    "Gustavo",
    new DateTimeImmutable("1999-05-06")
);

$repositoryStudent->save($student);

$student2 = new Student(
    null,
    "Paula",
    new DateTimeImmutable("1999-05-06")
);


$repositoryStudent->save($student2);

//Encerra a transação
    $connection->commit();

//Como o prepare retorna false em caso de problema, podemos validar a execução desta forma
}catch (PDOException $e){
    echo $e->getMessage(). PHP_EOL;
    $connection->rollBack();
}

