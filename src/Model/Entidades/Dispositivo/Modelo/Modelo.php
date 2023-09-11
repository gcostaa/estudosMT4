<?php

namespace Projeto\Cofre\Model\Entidades\Dispositivo\Modelo;

use Projeto\Cofre\Model\Entidades\Dispositivo\Fabricante\Fabricante;
use Projeto\Cofre\Repository\FabricanteRepository;

class Modelo
{
    private readonly int $idModelo;
    private string $nomeModelo;
    private string $tipoModelo;
    private Fabricante $fabricante;

    public function __construct(string $nomeModelo, string $tipoModelo, Fabricante $fabricante, ?int $idModelo)
    {
        $this->nomeModelo = $nomeModelo;
        $this->tipoModelo = $tipoModelo;
        $this->fabricante = $fabricante;

        if (isset($idModelo))
        {
            $this->setIdModelo($idModelo);
        }
    }

    public function getNomeModelo(): string
    {
        return $this->nomeModelo;
    }

    public function getTipoModelo(): string
    {
        return $this->tipoModelo;
    }

    public function getFabricante(): Fabricante
    {
        return $this->fabricante;
    }

    public function setIdModelo(int $id)
    {
        $this->idModelo = $id;
    }

    public function getIdModelo(): int
    {
        return $this->idModelo;
    }

    public static function createsTheDatabaseSelectObject(array $dataList, \PDO $pdo): Modelo
    {

        $fabricanteRepository = new FabricanteRepository($pdo);

        $dataListOfObject = [];

        foreach ($dataList as $data)
        {

            $dataListOfObject = new self(
                $data['nome'],
                $data['tipo'],
                $fabricanteRepository->oneFabricante($data['idFabricante']),
                $data['idModelo']
            );
        }

        return $dataListOfObject;
    }


}