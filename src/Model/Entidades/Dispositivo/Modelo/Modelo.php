<?php

namespace Projeto\Cofre\Model\Entidades\Dispositivo\Modelo;

use Projeto\Cofre\Model\Entidades\Dispositivo\Fabricante\Fabricante;

class Modelo
{
    private readonly int $idModelo;
    private string $nomeModelo;
    private string $tipoModelo;
    private Fabricante $fabricante;

    public function __construct(string $nomeModelo, string $tipoModelo, Fabricante $fabricante)
    {
        $this->nomeModelo = $nomeModelo;
        $this->tipoModelo = $tipoModelo;
        $this->fabricante = $fabricante;
    }

    public function getNomeModelo(): string
    {
        return $this->nomeModelo;
    }

    public function getTipoModelo(): string
    {
        return $this->tipoModelo;
    }

    public function getFabricante(): Fabricante
    {
        return $this->fabricante;
    }

    public function setIdModelo(int $id)
    {
        $this->idModelo = $id;
    }

    public function getIdModelo(): int
    {
        return $this->idModelo;
    }


}