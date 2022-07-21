<?php
require_once '../vendor/autoload.php';

use app\model\Produto;
use app\model\ProdutoDao;

header("Content-Type:application/json");

if (!isset($_POST['id']) || !sizeof($_POST) > 1)
    die('Erro: falta de parametros !');

$produto = new Produto(
    $_POST['nome'],
    $_POST['descricao'],
    $_POST['qtd_estoque'],
    $_POST['preco']
);

$produto->setId($_POST['id']);

$prodDao = new ProdutoDao($produto);

if ($prodDao->update()) {
    echo json_encode(
        [
            'sucesso' => "Produto Atualizado!",
            "produto" => $prodDao->show($produto->getId())
        ]
    );
} else {
    echo json_encode(['Error' => "Erro ao inserir produto!"]);
}
