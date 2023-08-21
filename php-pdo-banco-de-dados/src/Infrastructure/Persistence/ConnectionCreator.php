<?php

namespace Alura\Pdo\Infrastructure\Persistence;

use PDO;

class ConnectionCreator
{

    //como não existe nenhum atributo na classe e não é necessário instanciar ela, podemos tornar o método estático
    public static function createConnection(): PDO
    {
        $databasePath = __DIR__ . '/../../../banco.sqlite';
        return new PDO("sqlite:$databasePath");
    }

}