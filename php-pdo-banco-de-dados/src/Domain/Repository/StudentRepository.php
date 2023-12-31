<?php

namespace Alura\Pdo\Domain\Repository;

use Alura\Pdo\Domain\Model\Student;

interface StudentRepository
{

    public function allStudents(): array;

    public function studentBirthAt(\DateTimeImmutable $birthDate): array;

    public function save(Student $student): bool;

    public function delete(Student $student): bool;
}