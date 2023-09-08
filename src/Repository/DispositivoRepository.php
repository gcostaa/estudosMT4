<?php

namespace Projeto\Cofre\Repository;

use PDO;
use Projeto\Cofre\Model\Entidades\Dispositivo\Dispositivo;

class DispositivoRepository
{

    public function __construct(private PDO $pdo)
    {
    }

    public function add(Dispositivo $dispositivo): bool
    {
            $queryInsert = "INSERT INTO dispositivo(ip,hostname,idConectividade,idModelo) VALUES (?,?,?,?)";

            $stmt = $this->pdo->prepare($queryInsert);

            $stmt->bindValue(1,$dispositivo->getIp());
            $stmt->bindValue(2,$dispositivo->getHostname());
            $stmt->bindValue(3,$dispositivo->getConectividade()->getIdConectividade());
            $stmt->bindValue(4,$dispositivo->getModelo()->getIdModelo());

            $status = $stmt->execute();

            $dispositivo->setIdDispositivos($this->pdo->lastInsertId());

            return $status;
        }
}