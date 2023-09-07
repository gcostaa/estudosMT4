<?php

namespace Projeto\Cofre\Model\Entidades\Credencial;

use Projeto\Cofre\Model\Entidades\Dispositivo\Dispositivo;

class Credencial
{

    private readonly int $idCredencial;
    private string $username;
    private string $senha;
    private Dispositivo $dispositivo;

    public function __construct(int $idCredencial, string $username, string $senha)
    {
        $this->idCredencial = $idCredencial;
        $this->username = $username;
        $this->senha = $senha;
    }

}