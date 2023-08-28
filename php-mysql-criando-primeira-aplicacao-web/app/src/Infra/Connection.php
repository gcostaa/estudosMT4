<?php

namespace Loja\App\Infra;

use PDO;

class Connection
{

    private static PDO $connection;

    public static function connectionCreator(): \PDO
    {

        if (!isset(self::$connection)) {

            self::$connection = new PDO(
                "mysql:host=192.168.100.37;dbname=loja",
                'gustavo',
                'mT4SeG@s2s'
            );

            self::$connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }

        return self::$connection;

    }

}