<?php

namespace Projeto\Cofre\Infraestrutura;

use PDO;

class Connection
{
    public static function connectionCreator()
    {
        return new PDO("mysql:host=192.168.100.37;dbname=cofre","gustavo","mT4SeG@s2s");
    }
}