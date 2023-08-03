<?php

namespace Alura\Leilao\Model;

class Leilao
{
    /** @var Lance[] */
    private $lances;
    /** @var string */
    private $descricao;

    public function __construct(string $descricao)
    {
        $this->descricao = $descricao;
        $this->lances = [];
    }

    public function recebeLance(Lance $lance)
    {
        //garantindo que não tenha lances repetidos


        if (!empty($this->lances) && $lance->getUsuario() == $this->lances[count($this->lances) -1]->getUsuario()){
            // O empty garanti que não esta fazio
            //paro a execução
            return;

        }

        $this->lances[] = $lance;
    }

    /**
     * @return Lance[]
     */
    public function getLances(): array
    {
        
        return $this->lances;
    }
}
