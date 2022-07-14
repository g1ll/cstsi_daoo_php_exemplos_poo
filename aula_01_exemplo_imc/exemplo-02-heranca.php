<?php 
spl_autoload_register(function ($class_name) {
	$path = implode("/",explode('\\',$class_name));
    require_once $path . '.php';
});

use classes\Atleta;
use classes\logs\Relatorio as logIMC;

$pa1 = new Atleta("Walter Kannemann",1.83,80);

$pa1->calcImc();
$pa1->showIMC();
logIMC::log($pa1);