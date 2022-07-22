<?php
header("Content-Type:application/json;charset=utf-8'");

require '../vendor/autoload.php';

use app\model\ProdutoDao;

$prodDao = new ProdutoDao();
$result = $prodDao->read();
echo json_encode($result);