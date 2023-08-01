<?php

namespace Alura\Leilao\Service;

use Alura\Leilao\Model\Lance;
use Alura\Leilao\Model\Leilao;

class Avaliador{

    private $maiorValor = -INF;
    //INFINITO
    private $menorValor = INF;

    private $maioresLances=[];

    public function avalia(Leilao $leiao) : void
    {

        $lances = $leiao->getLances();
       
        foreach ($lances as $valor) {
            
            if ($valor->getValor() > $this->maiorValor){

                $this->maiorValor = $valor->getValor();
            }
            
            if ($valor->getValor() < $this->menorValor){
                $this->menorValor = $valor->getValor();
            }
        }

        usort($lances,function (Lance $lance1, Lance $lance2){


            //A função de comparação deve retornar um inteiro menor, igual ou maior que zero
            //se o primeiro argumento for considerado respectivamente menor, igual, ou maior que o segundo.
            return $lance2->getValor() - $lance1->getValor();

        });  

        //Existe a necessidade de obter o 3 maiores lances
        $this->maioresLances = array_slice($lances,0,3);
        
    }

    public function getMaiorValor() : float
    {

        return $this->maiorValor;

    }

    public function getMenorValor() : float
    {

        return $this->menorValor;

    }

    public function getMaioresLances() : array
    {

        return $this->maioresLances;

    }

}