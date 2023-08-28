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

    public function hidrataProdutos(array $produtos): array
    {

        $produtosList = [];

        foreach ($produtos as $produto) {

            $produtosList[] = new Produto(
                $produto['id'],
                $produto['tipo'],
                $produto['nome'],
                $produto['descricao'],
                $produto['imagem'],
                $produto['preco']
            );

        }

            return $produtosList;
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
        $statement->execute();

    }

}