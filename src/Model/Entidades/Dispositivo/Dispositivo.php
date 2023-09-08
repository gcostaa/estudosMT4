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

    public function __construct(string $ip, string $hostname, Conectividade $conectividade, Modelo $modelo)
    {
        $this->ip = $ip;
        $this->hostname = $hostname;
        $this->conectividade = $conectividade;
        $this->modelo = $modelo;
    }

    public function getIp(): string
    {
        return $this->ip;
    }

    public function getHostname(): string
    {
        return $this->hostname;
    }

    public function getConectividade(): Conectividade
    {
        return $this->conectividade;
    }

    public function getModelo(): Modelo
    {
        return $this->modelo;
    }

    public function setIdDispositivos(int $id)
    {
        $this->idDispositivo = $id;
    }


}