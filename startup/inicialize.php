<?php

use Projeto\Cofre\Infraestrutura\Connection;
use Projeto\Cofre\Model\Entidades\Usuario\Usuario;

require_once 'vendor/autoload.php';

$pdo = Connection::connectionCreator();

$data = require_once 'populaOBanco.php';

$usuarios = $data['usuario'];
$fabricantes = $data['fabricante'];
$conectividades = $data['conectividade'];
$modelos = $data['modelo'];
$dispositivos = $data['dispositivo'];
$credenciais = $data['credencial'];

//var_dump($usuarios);
//var_dump($usuario["idUsuario"]);

function insertUsuario(array $usuarios, PDO $pdo){


    $queryInsert = "INSERT INTO usuario (idUsuario,nome,username,email,senha,idCredencial)
                    VALUES(?,?,?,?,?,?)";

    foreach ($usuarios as $usuario) {

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

function insertFabricante(array $fabricantes, PDO $pdo)
{

    $queryInsert = "INSERT INTO fabricante (idFabricante,nome) VALUES (?,?)";

    foreach ($fabricantes as $fabricante)
    {
        $stmt = $pdo->prepare($queryInsert);
        $stmt->bindValue(1,$fabricante['idFabricante']);
        $stmt->bindValue(2,$fabricante['nome']);

        $status = $stmt->execute();

        echo $status . PHP_EOL;
    }

}

function insertConectividade(array $conectividades, PDO $pdo)
{
    $queryInsert = "INSERT INTO conectividade(idConectividade,protocolo,porta) VALUES (?,?,?)";

        $stmt = $pdo->prepare($queryInsert);
        $stmt->bindValue(1,$conectividade['idConectividade']);
        $stmt->bindValue(2,$conectividade['protocolo']);
        $stmt->bindValue(3,$conectividade['porta']);

        $status = $stmt->execute();

        echo $status . PHP_EOL;
}

function insertModelo(array $modelos, PDO $pdo)
{

    $queryInsert = "INSERT INTO modelo(idModelo,nome,tipo,idFabricante) VALUES (?,?,?,?)";

    foreach ($modelos as $modelo)
    {
        $stmt = $pdo->prepare($queryInsert);
        $stmt->bindValue(1,$modelo['idModelo']);
        $stmt->bindValue(2,$modelo['nome']);
        $stmt->bindValue(3,$modelo['tipo']);
        $stmt->bindValue(4,$modelo['idFabricante']);

        $status = $stmt->execute();

        echo $status . PHP_EOL;
    }
}

function insertDispositivo(array $dispositivos, PDO $pdo)
{

    $queryInsert = "INSERT INTO dispositivo(idDispositivo,ip,hostname,idConectividade,idModelo) VALUES (?,?,?,?,?)";

    foreach ($dispositivos as $dispositivo)
    {

        $stmt = $pdo->prepare($queryInsert);
        $stmt->bindValue(1,$dispositivo['idDispositivo']);
        $stmt->bindValue(2,$dispositivo['ip']);
        $stmt->bindValue(3,$dispositivo['hostname']);
        $stmt->bindValue(4,$dispositivo['idConectividade']);
        $stmt->bindValue(5,$dispositivo['idModelo']);

        $status = $stmt->execute();

        echo $status . PHP_EOL;
    }
}

function insertCredencial(array $credenciais, PDO $pdo)
{
    $queryInsert = "INSERT INTO credencial(idCredencial,username,senha,idDispositivo) VALUES (?,?,?,?)";

    foreach ($credenciais as $credenciail)
    {

        $stmt = $pdo->prepare($queryInsert);
        $stmt->bindValue(1,$credenciail['idCredencial']);
        $stmt->bindValue(2,$credenciail['username']);
        $stmt->bindValue(3,$credenciail['senha']);
        $stmt->bindValue(4,$credenciail['idDispositivo']);

        $status = $stmt->execute();

        echo $status . PHP_EOL;
    }
}

insertUsuario($usuarios, $pdo);
insertFabricante($fabricantes,$pdo);
insertConectividade($conectividades,$pdo);
insertModelo($modelos,$pdo);
insertDispositivo($dispositivos,$pdo);
insertCredencial($credenciais,$pdo);

