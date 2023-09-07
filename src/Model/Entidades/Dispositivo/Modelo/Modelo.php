<?php

namespace Projeto\Cofre\Model\Entidades\Dispositivo\Modelo;

use Projeto\Cofre\Model\Entidades\Dispositivo\Fabricante\Fabricante;

class Modelo
{
    private readonly int $idModelo;
    private string $nomeModelo;
    private string $tipoModelo;
    private Fabricante $fabricante;

    public function __construct(int $idModelo, string $nomeModelo, string $tipoModelo, Fabricante $fabricante)
    {
        $this->idModelo = $idModelo;
        $this->nomeModelo = $nomeModelo;
        $this->tipoModelo = $tipoModelo;
        $this->fabricante = $fabricante;
    }
}