<?php

use Alura\Leilao\Model\Lance;
use Alura\Leilao\Model\Leilao;
use Alura\Leilao\Model\Usuario;
use Alura\Leilao\Service\Avaliador;

require_once 'vendor/autoload.php';

//Configurando valores para o teste
//Arrange - Given
$leiao = new Leilao('Civic 2008');

$maria = new Usuario("Maria");

$joao = new Usuario("Joao");

//Executo o código a ser testado
//Act - When
$leiao->recebeLance(new Lance($joao,2000));
$leiao->recebeLance(new Lance($maria,2500));

$leiloeiro = new Avaliador();

$leiloeiro->avalia($leiao);

$maiorValor = $leiloeiro->getMaiorValor();

//Valido se é o resultado esperado
//Assert - Then
if ($maiorValor == 2500){
    
    echo "TESTE OK" .PHP_EOL;

}else{

    echo "TESTE FALHOU" .PHP_EOL;
}
