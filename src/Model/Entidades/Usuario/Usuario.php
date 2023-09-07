<?php

namespace Projeto\Cofre\Model\Entidades\Usuario;

class Usuario
{
    private readonly int $idUsuario;
    private string $nome;
    private string $email;
    private string $senha;

    public function __construct(int $idUsuario, string $nome, string $email, string $senha)
    {
        $this->idUsuario = $idUsuario;
        $this->nome = $nome;
        $this->email = $email;
        $this->senha = $senha;
    }
}