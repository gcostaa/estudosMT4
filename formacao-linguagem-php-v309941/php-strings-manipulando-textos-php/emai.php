<?php

function geraEmail(): void{

    $conteudo = 'Ola xxx

    Estamos entrando em contato....

    Obrigado';

    echo $conteudo;

}

function geraEmail2(): void{

    //heredoc
    $str = <<<IDENTIFIER
    place a string here
    it can span multiple lines
    and include single quote ' and double quotes "
    IDENTIFIER;

    echo $str;

}

//Observe que o php irá exibir os espaços da indentação da função.
geraEmail();
geraEmail2();

