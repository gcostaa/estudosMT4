<?php

use Projeto\Cofre\Infraestrutura\Connection;
use Projeto\Cofre\Model\Entidades\Usuario\Usuario;

require_once 'vendor/autoload.php';

$data = require_once 'populaOBanco.php';

$usuarios = $data['usuario'];

//var_dump($usuarios);
//var_dump($usuario["idUsuario"]);

function insertUsuario(array $usuarios){

    $pdo = Connection::connectionCreator();

    foreach ($usuarios as $usuario) {

        $queryInsert = "INSERT INTO usuario (idUsuario,nome,username,email,senha,idCredencial)
                    VALUES(?,?,?,?,?,?)";

        $stmt = $pdo->prepare($queryInsert);
        $stmt->bindValue(1,$usuario['idUsuario']);
        $stmt->bindValue(2,$usuario['nome']);
        $stmt->bindValue(3,$usuario['username']);
        $stmt->bindValue(4,$usuario['email']);
        $stmt->bindValue(5,$usuario['senha']);
        $stmt->bindValue(6,$usuario['idCredencial']);

        $status = $stmt->execute();

        echo $status . PHP_EOL;
    }

}

insertUsuario($usuarios);
