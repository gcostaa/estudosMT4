<?php

namespace Projeto\Cofre\Repository;

use PDO;
use Projeto\Cofre\Model\Entidades\Usuario\Usuario;

class UsuarioRepository
{
    public function __construct(private PDO $pdo)
    {
    }

    public function add(Usuario $usuario): bool
    {
        $queryInsert = "INSERT INTO usuario (nome,username,email,senha,idCredencial)
                    VALUES(?,?,?,?,?,?)";


            $stmt = $this->pdo->prepare($queryInsert);
            $stmt->bindValue(1,$usuario->getNome());
            $stmt->bindValue(2,$usuario->getUsername());
            $stmt->bindValue(3,$usuario->getEmail());
            $stmt->bindValue(4,$usuario->getSenha());
            $stmt->bindValue(5,$usuario->getCredencial());

            $status = $stmt->execute();

            $usuario->setIdUsuario($this->pdo->lastInsertId());

            return $status;
    }

    public function remove(int $id)
    {

        return GenericOperations::removeFrom("usuario",$id,$this->pdo);

    }
}