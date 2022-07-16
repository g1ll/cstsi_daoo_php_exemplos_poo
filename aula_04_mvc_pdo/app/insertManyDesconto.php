<?php
require_once '../vendor/autoload.php';
header("Content-Type:application/json;charset=utf-8'");

use app\model\Desconto;
use app\model\DescontoDao;

if(!isset($_POST['descricao']) || !isset($_POST['taxa']))
    die('Erro: falta de parametros !');

foreach ($_POST['descricao'] as $key=>$value)
        $arrayDescontos[]=[$value,$_POST['taxa'][$key]];

$descDao = new DescontoDao();

if($descDao->createMany($arrayDescontos))
    echo json_encode(["success"=>"Descontos cadastrados com sucesso!"]);
else
    echo json_encode(["error"=>"Erro ao inserir produto!"]);