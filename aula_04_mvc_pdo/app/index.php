<?php
header("Content-Type:application/json;charset=utf-8'");
require '../vendor/autoload.php';

use app\controller\Produto;

$controllerProduto = new Produto();
echo $controllerProduto->index();