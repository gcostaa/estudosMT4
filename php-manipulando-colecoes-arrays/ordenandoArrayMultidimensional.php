<?php

$notas = [

    [
        "aluno" => "Gustavo",
        "nota" => "10"
    ],

    [
        "aluno" => "Paula",
        "nota" => "5"
    ],

    [
        "aluno" => "Paula",
        "nota" => "1"
    ],

    [
        "aluno" => "Paula",
        "nota" => "20"
    ],

    [
        "aluno" => "Paula",
        "nota" => "1"
    ],

    [
        "aluno" => "Paula",
        "nota" => "6"
    ],

    [
        "aluno" => "Vitor",
        "nota" => "8"
    ]

];

function ordena(array $notas1, array $notas2): int{


    if($notas1["nota"] > $notas2["nota"]){
        
        return 1;

    }

    if($notas1["nota"] < $notas2["nota"]){
        
        return -1;
        
    }

    return 0;

}

usort($notas,'ordena');

print_r($notas);