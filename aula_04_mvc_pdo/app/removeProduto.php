<?php
require_once '../vendor/autoload.php';

use app\model\ProdutoDao;

header("Content-Type:application/json");

if(!isset($_POST['id']))
    die('Erro: falta de parametros !');

$prodDao = new ProdutoDao();

if($prodDao->delete($_POST['id'])) {
    echo json_encode(['sucesso'=>"Produto $_POST[id] Removido!"]);
}else {
    echo json_encode(['Error'=>"Erro ao inserir produto!"]);
}
