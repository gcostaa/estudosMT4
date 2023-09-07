<?php

namespace Projeto\Cofre\Model\Entidades\Dispositivo;

use Projeto\Cofre\Model\Entidades\Dispositivo\Conectividade\Conectividade;
use Projeto\Cofre\Model\Entidades\Dispositivo\Modelo\Modelo;

class Dispositivo
{

    private readonly int $idDispositivo;
    private string $ip;
    private string $hostname;
    private Conectividade $conectividade;
    private Modelo $modelo;

    public function __construct(int $idDispositivo, string $ip, string $hostname, Conectividade $conectividade, Modelo $modelo)
    {
        $this->idDispositivo = $idDispositivo;
        $this->ip = $ip;
        $this->hostname = $hostname;
        $this->conectividade = $conectividade;
        $this->modelo = $modelo;
    }

}