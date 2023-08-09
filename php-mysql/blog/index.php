<?php

$artigos = [

    [
        'Titulo' => 'Primeiros passos com Spring',
        'Conteudo' => <<<CONTEUDO
                Na empresa onde trabalho começamos um Coding Dojo, que é basicamente uma reunião com programadores e
                programadoras a fim de resolver desafios e aperfeiçoar as habilidades com algoritmos.
               CONTEUDO,
        'Link' => 'primeiros-passos-com-spring.html'
    ],

    [
        'Titulo' => 'O que é Metodologia Ágil',
        'Conteudo' => <<<CONTEUDO
                Uma vez fui contratada por uma empresa que desenvolvia softwares e aplicativos para outras empresas.
               CONTEUDO,
        'Link' => 'o-que-e-metodologia-agil.html'
    ],

    [
        'Titulo' => 'Como é o funil do Growth Hacking?',
        'Conteudo' => <<<CONTEUDO
                Minha amiga que possui um clube de assinaturas começou a utilizar o Growth Hacking após conhecer um pouco
                mais sobre ele.
               CONTEUDO,
        'Link' => 'como-e-o-funil-do-growth-hacking.html'
    ],
];

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Meu Blog</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <div id="container">
        <h1>Meu Blog</h1>

        <?php

            foreach ($artigos as $artigo)
            {?>
                         <h2>
                    <a href="<?php echo $artigo['Link']?>">
                        <?php
                        echo $artigo['Titulo'];
                        ?>
                </a>
                </h2>
                <p>
                    <?php
                    echo $artigo['Conteudo'];
                    ?>
                </p>
            <?php } ?>
    </div>
</body>

</html>