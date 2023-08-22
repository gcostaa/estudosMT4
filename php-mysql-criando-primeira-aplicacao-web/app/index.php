<?php

$produtosCafe = [

        [
                "nome"=>"Café Cremoso",
                "descricao" => "Café cremoso irresistivelmente suave e que envolve seu paladar",
                "preco" => "R$ 5.00",
                "imagem" => "img/cafe-cremoso.jpg"
        ],

        [
                "nome"=>"Café com Leite",
                "descricao" => "A harmonia perfeita do café e do leite, uma experiência reconfortante",
                "preco" => "R$ 2.00",
                "imagem" => "img/cafe-com-leite.jpg"
        ],

    [
        "nome"=>"Cappuccino",
        "descricao" => "Café suave, leite cremoso e uma pitada de sabor adocicado",
        "preco" => "R$ 7.00",
        "imagem" => "img/cappuccino.jpg"
    ],

    [
        "nome"=>"Café Gelado",
        "descricao" => "Café gelado refrescante, adoçado e com notas sutis de baunilha ou caramelo.",
        "preco" => "R$ 5.00",
        "imagem" => "img/cafe-gelado.jpg"
    ]

];

$produtosAlmoco = [

        [
            "nome"=>"Bife",
            "descricao" => "Bife, arroz com feijão e uma deliciosa batata frita",
            "preco" => "R$ 27.00",
            "imagem" => "img/bife.jpg"
        ],[
            "nome"=>"Frango",
            "descricao" => "Saboroso frango à milanesa com batatas fritas, salada de repolho e molho picante",
            "preco" => "R$ 23.00",
            "imagem" => "img/prato-frango.jpg"
        ],[
            "nome"=>"Filé de peixe",
            "descricao" => "Filé de peixe salmão assado, arroz, feijão verde e tomate.",
            "preco" => "R$ 24.00",
            "imagem" => "img/prato-peixe.jpg"
        ],[
            "nome"=>"Fettuccine",
            "descricao" => "Prato italiano autêntico da massa do fettuccine com peito de frango grelhado",
            "preco" => "R$ 22.00",
            "imagem" => "img/fettuccine.jpg"
        ],
];

?>

<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="icon" href="img/icone-serenatto.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700&display=swap" rel="stylesheet">
    <title>Serenatto - Cardápio</title>
</head>
<body>
    <main>
        <section class="container-banner">
            <div class="container-texto-banner">
                <img src="img/logo-serenatto.png" class="logo" alt="logo-serenatto">
            </div>
        </section>
        <h2>Cardápio Digital</h2>
        <section class="container-cafe-manha">
            <div class="container-cafe-manha-titulo">
                <h3>Opções para o Café</h3>
                <img class= "ornaments" src="img/ornaments-coffee.png" alt="ornaments">
            </div>
            <div class="container-cafe-manha-produtos">
                <?php
                foreach ($produtosCafe as $cafes):
                ?>
                <div class="container-produto">
                    <div class="container-foto">
                        <img src="<?= $cafes['imagem']?>">

                    </div>
                    <p><?= $cafes['nome']?></p>
                    <p><?= $cafes['descricao']?></p>
                    <p><?= $cafes['preco']?></p>
                </div>
                <?php endforeach;?>
            </div>
        </section>
        <section class="container-almoco">
            <div class="container-almoco-titulo">
                <h3>Opções para o Almoço</h3>
                <img class= "ornaments" src="img/ornaments-coffee.png" alt="ornaments">
            </div>

            <div class="container-cafe-manha-produtos">
                <?php
                foreach ($produtosAlmoco as $almocos):?>
                    <div class="container-produto">
                        <div class="container-foto">
                            <img src="<?= $almocos['imagem']?>">

                        </div>
                        <p><?= $almocos['nome']?></p>
                        <p><?= $almocos['descricao']?></p>
                        <p><?= $almocos['preco']?></p>
                    </div>
                <?php endforeach;?>
            </div>
            
        </section>
    </main>
</body>
</html>
