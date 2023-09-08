<?php

namespace Projeto\Cofre\Infraestrutura;

use PDO;

class Connection
{
    public static function connectionCreator()
    {
        return new PDO("mysql:host=127.0.0.1;dbname=cofre","service","mT4SeG@s2s");
    }
}