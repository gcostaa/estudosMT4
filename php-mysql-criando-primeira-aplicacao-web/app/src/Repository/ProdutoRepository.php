<?php

namespace Loja\App\Repository;

use Loja\App\Model\Produto;
use PDO;

class ProdutoRepository
{

    private \PDO $pdo;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    private function hidrataProdutos(array $produtos): array
    {

        $produtosList = [];

        foreach ($produtos as $produto) {

            $produtosList[] = new Produto(
                $produto['id'],
                $produto['tipo'],
                $produto['nome'],
                $produto['descricao'],
                $produto['preco'],
                $produto['imagem']
            );

        }

            return $produtosList;
    }

    private function retornaUmProduto(array $produto): Produto
    {
        return new Produto(

            $produto['id'],
            $produto['tipo'],
            $produto['nome'],
            $produto['descricao'],
            $produto['preco'],
            $produto['imagem']
        );
    }

    public function opcoesCafe():array
    {

        $statement = $this->pdo->prepare("SELECT * FROM produtos where tipo = 'Café' ORDER BY preco");
        $statement->execute();
        $produtosDataList = $statement->fetchAll(PDO::FETCH_ASSOC);


        return $this->hidrataProdutos($produtosDataList);

    }

    public function opcoesAlmoco():array
    {

        $statement = $this->pdo->prepare("SELECT * FROM produtos where tipo = 'Almoço' ORDER BY preco");
        $statement->execute();
        $produtosDataList = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $this->hidrataProdutos($produtosDataList);

    }

    public function buscarTodos(): array
    {

        $statement = $this->pdo->prepare("SELECT * FROM produtos ORDER BY preco");
        $statement->execute();
        $produtosDataList = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $this->hidrataProdutos($produtosDataList);

    }

    public function deletar(int $id)
    {

        $statement = $this->pdo->prepare("DELETE FROM produtos WHERE id= :id");
        $statement->bindValue("id",$id);
        //retorna true ou false
        $statement->execute();

    }

    public function salvar(Produto $produto)
    {

        $sqlInsert = "INSERT INTO produtos (tipo,nome,descricao,preco,imagem) VALUES(?,?,?,?,?)";
        $statement = $this->pdo->prepare($sqlInsert);
        $statement->bindValue(1, $produto->getTipo());
        $statement->bindValue(2, $produto->getNome());
        $statement->bindValue(3, $produto->getDescricao());
        $statement->bindValue(4, $produto->getPrecoFormatado());
        $statement->bindValue(5, $produto->getImagemDiretorio());

        $statement->execute();

    }

    public function buscarProduto(int $id): Produto
    {

        $statement = $this->pdo->prepare("SELECT * FROM produtos WHERE id= :id;");
        $statement->bindValue("id",$id);
        $statement->execute();
        $produto = $statement->fetch(PDO::FETCH_ASSOC);
        return $this->retornaUmProduto($produto);
    }

    public function atualizaProduto(Produto $produto): bool
    {

        $sqlUpdate = <<<SQL
UPDATE produtos set tipo= :tipo,nome= :nome,descricao= :descricao,preco= :preco
                      WHERE id= :id;
SQL;

        $statement = $this->pdo->prepare($sqlUpdate);
        $statement->bindValue("id",$produto->getId());
        $statement->bindValue("tipo",$produto->getTipo());
        $statement->bindValue("nome",$produto->getNome());
        $statement->bindValue("descricao",$produto->getDescricao());
        $statement->bindValue("preco",$produto->getPrecoFormatado());
        var_dump($statement);
        $execucao = $statement->execute();

        return $execucao;
    }


}