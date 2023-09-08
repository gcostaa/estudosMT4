<?php

namespace Projeto\Cofre\Model\Entidades\Dispositivo\Fabricante;

class Fabricante
{

    private readonly int $idFabricante;
    private string $nomeFabricante;

    public function __construct(string $nomeFabricante)
    {
        $this->nomeFabricante = $nomeFabricante;
    }

    public function getNomeFabricante(): string
    {
        return $this->nomeFabricante;
    }

    public function setIdFabricante(int $id)
    {
        $this->idFabricante = $id;
    }

    public function getIdFabricante(): int
    {
        return $this->idFabricante;
    }


}