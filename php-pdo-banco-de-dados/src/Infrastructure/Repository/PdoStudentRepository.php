<?php

namespace Alura\Pdo\Infrastructure\Repository;

use Alura\Pdo\Domain\Model\Student;
use Alura\Pdo\Domain\Repository\StudentRepository;
use Alura\Pdo\Infrastructure\Persistence\ConnectionCreator;

class PdoStudentRepository implements StudentRepository
{

    private \PDO $connection;

    public function __construct(\PDO $pdo)
    {
        $this->connection = $pdo;
    }

    public function allStudents(): array
    {
        $statement = $this->connection->prepare("SELECT * FROM students;");
        $statement->execute();
        return $this->hydrateStudentList($statement);
    }

    public function studentBirthAt(\DateTimeImmutable $birthDate): array
    {
        $statement = $this->connection->prepare("SELECT * FROM students WHERE birth_date = :data;");
        $statement->bindValue(':data', $birthDate);
        $statement->execute();
        return $this->hydrateStudentList($statement);
    }


    //O processo de hidratar o dado é uma técnica que move os dados de uma camada
    //da aplicação para outro, como da base de dados para o domínio do projeto
    public function hydrateStudentList(\PDOStatement $statement): array
    {

        $studentDataList = $statement->fetchAll(\PDO::FETCH_ASSOC);
        $studentList = [];

        foreach ($studentDataList as $studentData)
        {
            $studentList[] = new Student(
                $studentData['id'],
                $studentData['name'],
                new \DateTimeImmutable($studentData['birth_date'])
            );
        }

        return $studentData;

    }

    public function save(Student $student): bool
    {

        if($student->id() === null){
            return $this->insert($student);
        }

        return $this->update($student);

    }

    public function update(Student $student): bool
    {

        $updateQuery = "UPDATE students SET name= :name, birth_date= :niver WHERE id= :id;";
        $statement = $this->connection->prepare($updateQuery);

        //Estou realizando o bind dentro do próprio execute
        //Caso seja ?, basta eu passar um array de indice numérico

        $success = $statement->execute([
            ":name" => $student->name(),
            ":niver" => $student->birthDate()->format('Y-m-d'),
            ":id" => $student->id()
        ]);

        return $success;

    }

    public function insert(Student $student): bool
    {

        $insertQuery = "INSERT INTO students (name, birth_date) VALUES (:name,:niver);";
        $statement = $this->connection->prepare($insertQuery);

        //Estou realizando o bind dentro do próprio execute
        //Caso seja ?, basta eu passar um array de indice numérico
        $success = $statement->execute([
            ":name" => $student->name(),
            ":niver" => $student->birthDate()->format('Y-m-d')
        ]);

        //Ira retornar o último id
        if ($success){
            $student->defineId($this->connection->lastInsertId());
        }
        return $success;

    }

    public function delete(Student $student): bool
    {

        $statement = $this->connection->prepare('DELETE FROM Students WHERE id = :id_estudante;');

        $statement->bindValue('id_estudante',$student->id(), PDO::PARAM_INT);

        return $statement->execute();

    }
}