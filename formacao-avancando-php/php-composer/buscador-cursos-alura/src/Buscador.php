<?php

namespace Alura\BuscadorDeCursos;

use GuzzleHttp\ClientInterface;
use Symfony\Component\DomCrawler\Crawler;

class Buscador
{

    private ClientInterface $httpCliente;
    private Crawler $crawler;

    public function __construct(ClientInterface $httpCliente, Crawler $crawler)
    {

        $this->httpCliente = $httpCliente;
        $this->crawler = $crawler;
        
    }

    public function buscar(string $url): array
    {

        $response = $this->httpCliente->request('GET', $url);
        $html = $response->getBody();
        $this->crawler->addHtmlContent($html);

        $elementosCursos = $this->crawler->filter("span.card-curso__nome");
        $cursos = [];

        foreach ($elementosCursos as $curso){
            $cursos[] = $curso->textContent;
        }

        return $cursos;
    }
}