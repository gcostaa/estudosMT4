<?php

namespace Projeto\Cofre\Model\Entidades\Dispositivo\Conectividade;


class Conectividade
{
    private readonly int $idConectividade;
    private string $protocolo;
    private int $porta;

    public function __construct(string $protocolo, int $porta)
    {
        $this->protocolo = $protocolo;
        $this->porta = $porta;
    }

    public function getProtocolo(): string
    {
        return $this->protocolo;
    }

    public function getPorta(): int
    {
        return $this->porta;
    }

    public function setIdConectividade(int $id)
    {

        $this->idConectividade = $id;

    }

    public function getIdConectividade(): int
    {
        return $this->idConectividade;
    }


}