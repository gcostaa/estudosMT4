<?php

$data = [

    "usuario"=>[
        [
            "idUsuario"=>1,
            "nome"=>"Gustavo",
            "username"=>"gcosta",
            "email" => "teste@teste.com",
            "senha" => "teste@123",
            "idCredencial" => json_encode([
                1,2,3
            ])
        ],

        [
            "idUsuario"=>2,
            "nome"=>"Maia",
            "username"=>"maia",
            "email" => "teste@teste.com",
            "senha" => "teste@123",
            "idCredencial" => json_encode([
                1,2,3
            ])
        ],

        [
            "idUsuario"=>3,
            "nome"=>"Gabriel",
            "username"=>"gabs",
            "email" => "teste@teste.com",
            "senha" => "teste@123",
            "idCredencial" => json_encode([
                1,2,3
            ])
        ],
    ],

    "credencial" => [
        [
            "idCredencial"=>1,
            "username" => "root",
            "senha" => "senha@123",
            "idDispositivo" => 1
        ],

        [
            "idCredencial"=>2,
            "username" => "admin",
            "senha" => "senha@123",
            "idDispositivo" => 2
        ]
    ],

    "conectividade" => [
        [
            "idConectividade" => 1,
            "protocolo" => "SSH",
            "porta" => 22
        ],

        [
            "idConectividade" => 2,
            "protocolo" => "SSH",
            "porta" => 22
        ],

        [
            "idConectividade" => 3,
            "protocolo" => "RDP",
            "porta" => 3389
        ],
    ],

    "fabricante" => [
        [
            "idFabricante" => 1,
            "nome" => "Microsoft"
        ]
    ],

    "modelo" => [
        [
            "idModelo" => 1,
            "nome" => "Windows 11",
            "tipo" => "Server",
            "idFabricante" => 1
        ]
    ],

    "dispositivo" => [
        [
            "idDispositivo" => 1,
            "ip" => "192.168.100.5",
            "hostname" => "PRD5",
            "idConectividade" => 1,
            "idModelo" => 1
        ],

        [
            "idDispositivo" => 2,
            "ip" => "192.168.100.6",
            "hostname" => "PRD5",
            "idConectividade" => 1,
            "idModelo" => 1
        ]
    ]

];

return $data;
