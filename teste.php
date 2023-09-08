<?php

use Projeto\Cofre\Model\Entidades\Dispositivo\Conectividade\Conectividade;
use Projeto\Cofre\Model\Entidades\Dispositivo\Fabricante\Fabricante;
use Projeto\Cofre\Model\Entidades\Dispositivo\Modelo\Modelo;

require_once 'vendor/autoload.php';

/*$fabricante = new Fabricante("Microsoft");
$modelo = new Modelo("Teste","Servidor",$fabricante);
$conec = new Conectividade("SSH",22);
*/

$dispositivo = new \Projeto\Cofre\Model\Entidades\Dispositivo\Dispositivo(
    "192.168.1.1",
    "Teste",
    new Conectividade("SSH",22),
    new Modelo("Teste","Servidor",
    new Fabricante("Microsoft"))
);

//var_dump($dispositivo->getConectividade()->getPorta());

