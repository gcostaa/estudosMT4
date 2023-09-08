<?php

namespace Projeto\Cofre\Repository;

use PDO;
use Projeto\Cofre\Model\Entidades\Dispositivo\Fabricante\Fabricante;

class FabricanteRepository
{
    public function __construct(private PDO $pdo)
    {
    }

    public function add(Fabricante $fabricante): bool
    {
        $queryInsert = "INSERT INTO fabricante (nome) VALUES (?)";

            $stmt = $this->pdo->prepare($queryInsert);
            $stmt->bindValue(1,$fabricante->getNomeFabricante());

            $status = $stmt->execute();

            $fabricante->setIdFabricante($this->pdo->lastInsertId());

            return $status;

        }
}