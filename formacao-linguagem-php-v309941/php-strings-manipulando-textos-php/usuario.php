<?php

$email = 'gustavo@alura.com.br';
$posicaoDoArroba = strpos($email,'@');
$senha = '123áãâ';
echo substr($email,0,$posicaoDoArroba) . PHP_EOL;

echo strlen($senha);
echo mb_strlen($senha);

$teste = ['Gustavo','Costa'];
list($nome,$sobrenome) = $teste;
echo $nome;
