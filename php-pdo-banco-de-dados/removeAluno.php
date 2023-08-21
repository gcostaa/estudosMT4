<?php

use Alura\Pdo\Domain\Model\Student;
use Alura\Pdo\Infrastructure\Persistence\ConnectionCreator;

require_once 'vendor/autoload.php';

// IMPLEMENTAÇÃO CORRETA EM src/Infra/Repo/PdoStudentRepository

$pdo = ConnectionCreator::createConnection();

$statement = $pdo->prepare('DELETE FROM Students WHERE id = :id_estudante;');
//Informa o tipo de dado
$statement->bindValue('id_estudante',4, PDO::PARAM_INT);
var_dump($statement->execute());



