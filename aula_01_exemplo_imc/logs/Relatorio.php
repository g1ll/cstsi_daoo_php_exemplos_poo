<?php
namespace logs;
use classes\Atleta as IMC;

class Relatorio {
	public static function log(IMC $imc)
	{
		echo "\nlog:\n";
		var_dump($imc);
	}
}