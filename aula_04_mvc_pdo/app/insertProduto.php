<?php
require_once '../vendor/autoload.php';

header("Content-Type:application/json;charset=utf-8'");

use app\model\Produto;
use app\model\ProdutoDao;

if( !isset($_POST['nome']) ||
    !isset($_POST['descricao']) ||
    !isset($_POST['quantidade']) ||
    !isset($_POST['preco'])) die('Erro: falta de parametros !');


$produto = new Produto( $_POST['nome'],
                        $_POST['descricao'],
                        $_POST['quantidade'],
                        $_POST['preco']);

$prodDao = new ProdutoDao($produto);

if($prodDao->create())
    echo json_encode(["success"=>"Produto inserido com sucesso!", "data"=>$produto->toArray()]);
else
    echo json_encode(["error"=>"Erro ao inserir produto!"]);
