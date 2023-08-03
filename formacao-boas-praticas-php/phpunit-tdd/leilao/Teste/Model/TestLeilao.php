<?php

namespace Alura\leilao\Teste\Model;

use Alura\Leilao\Model\Lance;
use Alura\Leilao\Model\Leilao;
use Alura\Leilao\Model\Usuario;
use PHPUnit\Framework\TestCase;

class TestLeilao extends TestCase
{

    /**
     * @dataProvider geraLances
     */
    public function testLeiaoDeveReceberLances(int $quantidadeDeLances,
                                               Leilao $leilao,
                                               array $valores)
    {

        static::assertCount($quantidadeDeLances,$leilao->getLances());

        foreach ($valores as $i => $valorEsperado){

            static::assertEquals($valorEsperado,$leilao->getLances()[$i]->getValor());

        }
        
    }

    public function testLeilaoNaoDeveReceberLancesRepetidos()
    {

        $leilao = new Leilao('Civic 2008');
        $joao = new Usuario("Joao");

        $leilao->recebeLance(new Lance($joao,2000));
        $leilao->recebeLance(new Lance($joao,2500));

        //precisamos garantir que apenas o primeiro lance seja mantido
        static::assertCount(1, $leilao->getLances());
        static::assertEquals(2000, $leilao->getLances()[0]->getValor());
    }
    
    public static function geraLances()
    {

        $joao = new Usuario("Joao");
        $maria = new Usuario("Maria");

        $leilaoComDoisLances = new Leilao('Civic 2008');
        $leilaoComDoisLances->recebeLance(new Lance($joao,2000));
        $leilaoComDoisLances->recebeLance(new Lance($maria,2500));

        $leilao = new Leilao('Fusca 2008');
        $leilao->recebeLance(new Lance($joao,2000));

        return [
            [2, $leilaoComDoisLances, [2000,2500]],
            [1, $leilao, [2000]]
        ];

    }

}
