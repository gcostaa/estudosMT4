<?php

namespace Projeto\Cofre\Repository;

use PDO;
use Projeto\Cofre\Model\Entidades\Dispositivo\Modelo\Modelo;

class ModeloRepository
{

    public function __construct(private PDO $pdo)
    {
    }

    public function add(Modelo $modelo): bool
    {

        $queryInsert = "INSERT INTO modelo(nome,tipo,idFabricante) VALUES (?,?,?,?)";

            $stmt = $this->pdo->prepare($queryInsert);
            $stmt->bindValue(1,$modelo->getNomeModelo());
            $stmt->bindValue(2,$modelo->getTipoModelo());
            $stmt->bindValue(3,$modelo->getFabricante()->getIdFabricante());

            $status = $stmt->execute();

            $modelo->setIdModelo($this->pdo->lastInsertId());

            return $status;

    }

    public function remove(int $id)
    {

        return GenericOperations::removeFrom("modelo",$id,$this->pdo);

    }
}