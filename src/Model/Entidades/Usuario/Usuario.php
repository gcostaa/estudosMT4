<?php

namespace Projeto\Cofre\Model\Entidades\Usuario;

class Usuario
{
    private readonly int $idUsuario;
    private string $nome;
    private string $username;
    private string $email;
    private string $senha;
    private array $credencial;

    public function __construct(string $nome, string $username, string $email, string $senha, array $credencial)
    {
        $this->nome = $nome;
        $this->username = $username;
        $this->email = $email;
        $this->senha = $senha;
        $this->credencial = $credencial;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function getUsername(): string
    {
        return $this->username;
    }


    public function getEmail(): string
    {
        return $this->email;
    }

    public function getSenha(): string
    {
        return $this->senha;
    }

    /**
     * @return array Credencial
     */

    public function getCredencial(): array
    {
        return $this->credencial;
    }


    public function setIdUsuario(int $id)
    {
        $this->idUsuario = $id;
    }


}