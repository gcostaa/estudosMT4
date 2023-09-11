<?php

namespace Projeto\Cofre\Model\Entidades\Credencial;

use Projeto\Cofre\Model\Entidades\Dispositivo\Dispositivo;

class Credencial
{

    private readonly int $idCredencial;
    private string $username;
    private string $senha;
    private Dispositivo $dispositivo;

    public function __construct(string $username, string $senha, Dispositivo $dispositivo)
    {
        $this->username = $username;
        $this->senha = $senha;
        $this->dispositivo = $dispositivo;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function getSenha(): string
    {
        return $this->senha;
    }

    public function getDispositivo(): Dispositivo
    {
        return $this->dispositivo;
    }


    public function setIdCredencial(int $id)
    {
        $this->idCredencial = $id;
    }

    /**
     * @return Credencial[]
     */
    public static function createsTheDatabaseSelectObject(array $dataList): array
    {

        $dataListOfObject = [];

        foreach ($dataList as $data)
        {
            $dataListOfObject = new self(
                $data['username'],
                $data['senha'],
                $data['idDispositivo']
            );

            self::setIdCredencial($data['idCredencial']);
        }

        return $dataListOfObject;
    }

}