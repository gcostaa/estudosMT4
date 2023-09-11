<?php

use Projeto\Cofre\Infraestrutura\Connection;
use Projeto\Cofre\Model\Entidades\Dispositivo\Conectividade\Conectividade;
use Projeto\Cofre\Model\Entidades\Dispositivo\Fabricante\Fabricante;
use Projeto\Cofre\Model\Entidades\Dispositivo\Modelo\Modelo;
use Projeto\Cofre\Repository\DispositivoRepository;
use Projeto\Cofre\Repository\FabricanteRepository;
use Projeto\Cofre\Repository\UsuarioRepository;

require_once 'vendor/autoload.php';

/*$fabricante = new Fabricante("Microsoft");
$modelo = new Modelo("Teste","Servidor",$fabricante);
$conec = new Conectividade("SSH",22);


$dispositivo = new \Projeto\Cofre\Model\Entidades\Dispositivo\Dispositivo(
    "192.168.1.1",
    "Teste",
    new Conectividade("SSH",22),
    new Modelo("Teste","Servidor",
    new Fabricante("Microsoft"))
);*/

//$repodisp = new UsuarioRepository(Connection::connectionCreator());
//var_dump($repodisp->remove(3));
$repocred = new FabricanteRepository(Connection::connectionCreator());
$result = $repocred->all();
//echo $result->getNomeFabricante();

//var_dump($dispositivo->getConectividade()->getPorta());

