<?php

namespace Projeto\Cofre\Model\Entidades\Dispositivo\Fabricante;

class Fabricante
{

    private readonly int $idFabricante;
    private string $nomeFabricante;

    public function __construct(int $idFabricante, string $nomeFabricante)
    {
        $this->idFabricante = $idFabricante;
        $this->nomeFabricante = $nomeFabricante;
    }

}