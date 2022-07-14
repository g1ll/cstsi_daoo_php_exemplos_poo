<?php
namespace classes\logs;
use classes\Pessoa;

class Relatorio{

	private $dados = [];

	public function __construct(Array $dados)
	{
		$this->dados = $dados;
	}

	public function log(Pessoa $pessoa)
	{
		echo $pessoa;
	}

	public function imprime(){
		echo "\n### RELATORIO ###\n";
		foreach ($this->dados as $dado) {
			$this->log($dado);
		}
		echo "\n#############\n";
	}
}