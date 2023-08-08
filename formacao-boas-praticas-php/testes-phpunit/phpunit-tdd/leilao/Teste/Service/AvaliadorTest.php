<?php

namespace Alura\Leilao\Teste\Service;

use Alura\Leilao\Model\Lance;
use Alura\Leilao\Model\Leilao;
use Alura\Leilao\Model\Usuario;
use Alura\Leilao\Service\Avaliador;
use PHPUnit\Framework\TestCase;

/*
SOBRE DATAPROVIDERS

Eles irão permitir com que eu passe mais de um valor (em nosso caso são arrays de leiloes diferentes)
para um mesmo método de teste.

*/

/*
 * Para executar :
 * vendor/bin/phpunit --colors Teste
 * Teste é o nome da pasta e o phpunir irá buscar o arquivo com nome de teste
 */

class AvaliadorTest extends TestCase
{

    private $leiloeiro;

    /*
     * O setUp será um método que o phpunit irá executar sempre antes de realizar um teste
     */

    protected function setUp(): void
    {
        $this->leiloeiro = new Avaliador();
    }
    
    /**
     * @dataProvider leilaoOrdemCrescente
     * @dataProvider leilaoOrdemDECrescente
     * @dataProvider leilaoOrdemAleatoria
     */

    public function testValidaOMaiorValor(Leilao $leiao){

        //Configurando valores para o teste
        //Arrange - Given

        $this->leiloeiro->avalia($leiao);

        $maiorValor = $this->leiloeiro->getMaiorValor();

        //Valido se é o resultado esperado
        //Assert - Then


        //Este método estático do PHPUNIT irá realizar a validação para mim, dessa forma o IF não se faz necessário
       self::assertEquals(7000,$maiorValor);
    }


    /**
    * @dataProvider leilaoOrdemCrescente
    * @dataProvider leilaoOrdemDECrescente
    * @dataProvider leilaoOrdemAleatoria
    */
    public function testAvaliadorDeveEncontrarOMenorValor(Leilao $leiao){

        $this->leiloeiro->avalia($leiao);

        $menorValor = $this->leiloeiro->getMenorValor();

        self::assertEquals(2000,$menorValor);
    }

   /**
    * @dataProvider leilaoOrdemCrescente
    * @dataProvider leilaoOrdemDECrescente
    * @dataProvider leilaoOrdemAleatoria
    */
    public function testAvaliadorPegaOs3MaioresLances(Leilao $leiao){

        $this->leiloeiro->avalia($leiao);
        $maiores = $this->leiloeiro->getMaioresLances();


        static::assertCount(3,$maiores);
        static::assertEquals(7000,$maiores[0]->getValor());
        static::assertEquals(3000,$maiores[1]->getValor());
        static::assertEquals(2500,$maiores[2]->getValor());

        

    }

    //melhorando o código
    public static function leilaoOrdemCrescente() : array
    {

        //Configurando valores para o teste
        //Arrange - Given
        $leiao = new Leilao('Civic 2008');

        $maria = new Usuario("Maria");

        $joao = new Usuario("Joao");

        $ana = new Usuario("Ana");

        $gustavo = new Usuario("Gustavo");

        //Executo o código a ser testado
        //Act - When
        $leiao->recebeLance(new Lance($joao,2000));
        $leiao->recebeLance(new Lance($maria,2500));
        $leiao->recebeLance(new Lance($ana,3000));
        $leiao->recebeLance(new Lance($gustavo,7000));

        return [[$leiao]];

    }

    public static function leilaoOrdemDECrescente() : array
    {

        //Configurando valores para o teste
        //Arrange - Given
        $leiao = new Leilao('Civic 2008');

        $maria = new Usuario("Maria");

        $joao = new Usuario("Joao");

        $ana = new Usuario("Ana");

        $gustavo = new Usuario("Gustavo");

        //Executo o código a ser testado
        //Act - When
        $leiao->recebeLance(new Lance($gustavo,7000));
        $leiao->recebeLance(new Lance($ana,3000));
        $leiao->recebeLance(new Lance($maria,2500));
        $leiao->recebeLance(new Lance($joao,2000));

        

        return [[$leiao]];

    }

    public static function leilaoOrdemAleatoria() : array
    {

        //Configurando valores para o teste
        //Arrange - Given
        $leiao = new Leilao('Civic 2008');

        $maria = new Usuario("Maria");

        $joao = new Usuario("Joao");

        $ana = new Usuario("Ana");

        $gustavo = new Usuario("Gustavo");

        //Executo o código a ser testado
        //Act - When

        $leiao->recebeLance(new Lance($maria,2500));
        $leiao->recebeLance(new Lance($gustavo,7000));
        $leiao->recebeLance(new Lance($joao,2000));
        $leiao->recebeLance(new Lance($ana,3000));


        return [[$leiao]];
    }
}