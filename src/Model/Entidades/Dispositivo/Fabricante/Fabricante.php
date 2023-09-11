<?php

namespace Projeto\Cofre\Model\Entidades\Dispositivo\Fabricante;

class Fabricante
{

    private readonly int $idFabricante;
    private string $nomeFabricante;

    public function __construct(string $nomeFabricante, ?int $idFabricante)
    {
        $this->nomeFabricante = $nomeFabricante;

        if (isset($idFabricante))
        {
            $this->setIdFabricante($idFabricante);
        }
    }

    public function getNomeFabricante(): string
    {
        return $this->nomeFabricante;
    }

    public function setIdFabricante(int $id)
    {
        $this->idFabricante = $id;
    }

    public function getIdFabricante(): int
    {
        return $this->idFabricante;
    }

    public static function createsTheDatabaseSelectObject(array $dataList): Fabricante
    {

        $dataListOfObject = [];

        foreach ($dataList as $data)
        {
            $dataListOfObject = new self(
                $data['nome'],
                $data['idFabricante']
            );
        }
        return $dataListOfObject;
    }

}