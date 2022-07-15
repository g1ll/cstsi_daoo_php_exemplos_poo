<?php
require_once '../vendor/autoload.php';

use app\model\ProdutoDao;

header("Content-Type:application/json;charset=utf-8'");

$prodDao = new ProdutoDao();

if(isset($_GET['id'])) {
    $produto = $prodDao->show($_GET['id']);
    if($produto)
        $json =['produto'=>$produto];
    else
        $json = ['Erro'=>"Produto não encontrado"];
    echo json_encode($json);
}