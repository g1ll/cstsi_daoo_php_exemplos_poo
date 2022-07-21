<?php
require_once '../vendor/autoload.php';
header("Content-Type:application/json;charset=utf-8'");

use app\model\DescontoDao;
use app\model\Produto;
use app\model\ProdutoDao;

if( !isset($_POST['nome']) ||
    !isset($_POST['descricao']) ||
    !isset($_POST['quantidade']) ||
    !isset($_POST['preco']) ||
    !isset($_POST['id_desc'])) die('Erro: falta de parametros !');


$produto = new Produto( $_POST['nome'],
                        $_POST['descricao'],
                        $_POST['quantidade'],
                        $_POST['preco']);

$prodDao = new ProdutoDao($produto);

if($idProd = $prodDao->insertProdWithDesc($_POST['id_desc']))
    echo json_encode(["success"=>"Produto com desconto inserido com sucesso!",
        "data"=>[
            "produto"=>$produto->toArray(),
            "desconto"=>(new DescontoDao())->getDescFromProd($idProd)
            ]
        ]);
else
    echo json_encode(["error"=>"Erro ao inserir produto!"]);