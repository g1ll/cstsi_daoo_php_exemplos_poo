<?php
require_once '../vendor/autoload.php';

use app\model\ProdutoDao;

header("Content-Type:application/json");

$prodDao = new ProdutoDao();

if(!isset($_GET) || !sizeof($_GET))
    die("Filtros vazios!");
echo json_encode($prodDao->filter($_GET));