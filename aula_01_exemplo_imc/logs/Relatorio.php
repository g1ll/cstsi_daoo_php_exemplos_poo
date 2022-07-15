<?php
namespace logs;
use classes\Atleta as Jogador;

class Relatorio {
	public static function log(Jogador $jogador)
	{
		echo "\nlog:\n";
		var_dump($jogador);
	}
}