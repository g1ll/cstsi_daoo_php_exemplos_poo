<?php
header("Content-Type:application/json;charset=utf-8'");

require '../vendor/autoload.php';

use app\model\ProdutoDao;

echo json_encode((new ProdutoDao())->read());