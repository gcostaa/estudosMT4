<?php

namespace Alura\Mvc\Infrastructure;

use PDO;

class Connection
{

    public static function connectionCreator(): \PDO
    {
        return new PDO('mysql:host=192.168.100.37;dbname=aluraplay',
            'gustavo',
            'mT4SeG@s2s');
    }
}