<?php

namespace Projeto\Cofre\Repository;

use PDO;
use Projeto\Cofre\Model\Entidades\Credencial\Credencial;

class CredencialRepository
{
    public function __construct(private PDO $pdo)
    {
    }

    private function add (Credencial $credencial): bool

    {

            $queryInsert = "INSERT INTO credencial(username,senha,idDispositivo) VALUES (?,?,?)";

            $stmt = $this->pdo->prepare($queryInsert);
            $stmt->bindValue(1,$credencial->getUsername());
            $stmt->bindValue(2,$credencial->getSenha());
            $stmt->bindValue(3,$credencial->getDispositivo());

            $status = $stmt->execute();

            $credencial->setIdCredencial($this->pdo->lastInsertId());

            var_dump($credencial);

            return $status;
    }
}