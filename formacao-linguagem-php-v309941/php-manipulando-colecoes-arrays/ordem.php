<?php

$notas = [10,2,8];

//COPIANDO O VALOR
$notasDesordenadas = $notas;
//COPIANDO A REFERÊNCIA EM MEMÓRIA
//$notasDesordenadas = &$notas;

sort($notas);
var_dump($notasDesordenadas);