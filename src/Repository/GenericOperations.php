<?php

namespace Projeto\Cofre\Repository;

final class GenericOperations
{

    public static function removeFrom(string $class, int $id, \PDO $pdo): bool
    {
        $quey = "DELETE FROM $class WHERE id".ucfirst($class)."=?";

        $stmt = $pdo->prepare($quey);
        $stmt->bindValue(1,$id);

        $status = $stmt->execute();

        return $status;
    }

    public static function allFrom(string $class, \PDO $pdo): array
    {
        $quey = "SELECT * FROM $class";

        $stmt = $pdo->prepare($quey);;

        $status = $stmt->execute();

        if (!$status)
        {
            //tratar erros no futuro
            echo "Error";
        }

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public static function onlyOneOf(string $class, int $id, \PDO $pdo): array
    {
        $quey = "SELECT * FROM $class WHERE id".ucfirst($class)."=?";

        $stmt = $pdo->prepare($quey);;

        $stmt = $pdo->prepare($quey);
        $stmt->bindValue(1,$id);

        $status = $stmt->execute();

        if (!$status)
        {
            //tratar erros no futuro
            echo "Error";
        }

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}