<?php
require "autoload.php";

use classes\Atleta;
use classes\Medico;
use classes\logs\Relatorio;

$medico = new Medico("Paulo Paixão",12345,"Fisiologista");
$jogador = new Atleta("Pedro Geromel", 1.9, 84);

$relatorio = new Relatorio;
$relatorio->add($medico);
$relatorio->add($jogador);
$relatorio->imprime();
