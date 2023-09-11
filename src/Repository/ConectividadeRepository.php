<?php

namespace Projeto\Cofre\Repository;

use PDO;
use Projeto\Cofre\Model\Entidades\Dispositivo\Conectividade\Conectividade;

class ConectividadeRepository
{



    public function __construct(private PDO $pdo)
    {
    }

    public function add(Conectividade $conectividade): bool
    {

        $queryInsert = "INSERT INTO conectividade(protocolo,porta) VALUES (?,?)";

        $stmt = $this->pdo->prepare($queryInsert);
        $stmt->bindValue(2,$conectividade->getProtocolo());
        $stmt->bindValue(3,$conectividade->getPorta());

        $status = $stmt->execute();

        $conectividade->setIdConectividade($this->pdo->lastInsertId());

        return $status;

    }

    public function remove(int $id)
    {

        return GenericOperations::removeFrom("conectividade",$id,$this->pdo);

    }

    public function all()
    {

        return Conectividade::createsTheDatabaseSelectObject(GenericOperations::allFrom("conectividade",$this->pdo));

    }

}