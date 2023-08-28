<?php
require_once "vendor/autoload.php";
use Loja\App\Infra\Connection;
use Loja\App\Repository\ProdutoRepository;

$repo = new ProdutoRepository(Connection::connectionCreator());

$repo->deletar($_POST['id']);

header("Location: admin.php");