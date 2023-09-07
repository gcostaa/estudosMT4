<?php

namespace Projeto\Cofre\Model\Entidades\Dispositivo\Conectividade;

class Conectividade
{
    private readonly int $idConectividade;
    private string $protocolo;
    private int $porta;

    public function __construct(int $idConectividade, string $protocolo, int $porta)
    {
        $this->idConectividade = $idConectividade;
        $this->protocolo = $protocolo;
        $this->porta = $porta;
    }


}