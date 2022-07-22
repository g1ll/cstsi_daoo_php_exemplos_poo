<?php
header("Content-Type:application/json;charset=utf-8'");
require '../vendor/autoload.php';

use app\controller\Produto;

$controllerProduto = new Produto();

// var_dump($_GET);

if (empty($_GET))
	echo $controllerProduto->index();
else if (isset($_GET['id']))
	echo $controllerProduto->show($_GET['id']);
