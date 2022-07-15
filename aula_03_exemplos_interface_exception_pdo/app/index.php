<?php
require_once '../vendor/autoload.php';

use app\model\ProdutoDao;

header("Content-Type:application/json");

$prodDao = new ProdutoDao();
echo json_encode($prodDao->read());