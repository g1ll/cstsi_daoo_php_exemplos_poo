<?php
require "autoload.php";

use classes\Atleta;
use classes\IMC;

$jogador = new Atleta("Diego Souza", 1.86, 89);

echo "O jogador $jotador->nome está ".IMC::classifica($jogador);