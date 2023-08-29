<?php

namespace Loja\App\Model;

class Produto
{
    private ?int $id;
    private string $tipo;
    private string $nome;
    private string $descricao;
    private string $imagem;
    private float $preco;

    public function __construct(?int $id, string $tipo, string $nome, string $descricao, string $preco, string $imagem="logo-serenatto.png")
    {
        $this->id = $id;
        $this->tipo = $tipo;
        $this->nome = $nome;
        $this->descricao = $descricao;
        $this->imagem = $imagem;
        $this->preco = $preco;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTipo(): string
    {
        return $this->tipo;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function getDescricao(): string
    {
        return $this->descricao;
    }

    private function getImagem(): string
    {
        return $this->imagem;
    }

    private function getPreco(): float
    {
        return $this->preco;
    }

    public function getPrecoFormatado(): float
    {

        return number_format($this->getPreco(), 2);

    }

    public function getImagemDiretorio(): string
    {
        return "img/".$this->getImagem();
    }

    private function setId(?int $id): void
    {
        $this->id = $id;
    }

    private function setTipo(string $tipo): void
    {
        $this->tipo = $tipo;
    }

    private function setNome(string $nome): void
    {
        $this->nome = $nome;
    }

    private function setDescricao(string $descricao): void
    {
        $this->descricao = $descricao;
    }

    private function setImagem(string $imagem): void
    {
        $this->imagem = $imagem;
    }

    private function setPreco(float $preco): void
    {
        $this->preco = $preco;
    }

    public function inicializa(array $dados): void

    {

           $this->setId($dados['id']);
           $this->setTipo($dados['tipo']);
           $this->setNome($dados['nome']);
           $this->setDescricao($dados['descricao']);
           $this->setPreco($dados['preco']);

    }


}