<?php

namespace Alura\leilao\Teste\Model;

use Alura\Leilao\Model\Lance;
use Alura\Leilao\Model\Leilao;
use Alura\Leilao\Model\Usuario;
use PHPUnit\Framework\TestCase;

class TestLeilao extends TestCase
{

    public function testLeiaoDeveReceberLances()
    {

        $joao = new Usuario("Joao");
        $maria = new Usuario("Maria");

        $leiao = new Leilao('Civic 2008');
        $leiao->recebeLance(new Lance($joao,2000));
        $leiao->recebeLance(new Lance($maria,2500));

        var_dump($leiao->getLances());

        static::assertCount(2,$leiao->getLances());
        static::assertEquals(2000,$leiao->getLances()[0]->getValor());
        static::assertEquals(2500,$leiao->getLances()[1]->getValor());
    }

}
