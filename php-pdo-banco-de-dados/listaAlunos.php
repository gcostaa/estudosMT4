<?php

use Alura\Pdo\Domain\Model\Student;

require_once 'vendor/autoload.php';

$databasePath = __DIR__.'/banco.sqlite';
$pdo = new PDO("sqlite:$databasePath");

$statement = $pdo->query('SELECT * FROM students');

//O FATCH irá obter apenas uma linha
/*Enquanto os dados do estudando for verdadeiro, ou seja, o statement retorna dados
é instanciado um novo e exibida sua idade
*/
while ($studentData = $statement->fetch(PDO::FETCH_ASSOC)){

    $student = new Student(
        $studentData['id'],
        $studentData['name'],
        new DateTimeImmutable($studentData['birth_date'])
    );

    echo $student->age() . PHP_EOL;
}

/*$studentDataList = $statement->fetchAll(PDO::FETCH_ASSOC);
$studentList = [];

foreach ($studentDataList as $studentData) {

    $studentList = new Student(
        $studentData['id'],
        $studentData['name'],
        new DateTimeImmutable($studentData['birth_date'])
    );
}

var_dump($studentList);*/