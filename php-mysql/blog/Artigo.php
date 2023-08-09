<?php

class Artigo
{
    public function exibirTodos():array
    {
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

        return $artigos;
    }
}


