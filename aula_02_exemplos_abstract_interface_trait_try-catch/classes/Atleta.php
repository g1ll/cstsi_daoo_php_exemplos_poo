<?php

namespace classes;

class Atleta extends Pessoa
{
	private $peso, $altura;
	
	public function __construct($nome, $altura, $peso, $idade=null)
	{
		$this->nome = $nome;
		$this->idade = $idade;
		$this->peso = $peso;
		$this->altura = $altura;
		$this->calcImc();
	}

	public function calcImc(){
        if ($this->peso && $this->altura) {
            $this->imc = $this->peso/$this->altura**2;
        }else{
			echo "Erro, informe o peso e a altura primeiro!";
		}
	}

	public function getAltura(){
		return $this->altura;
	}

	public function getPeso(){
		return $this->peso;
	}

	public function setAltura($altura)
	{
		$this->altura = $altura;
		$this->calcImc();
	}

	public function setPeso($peso)
	{
		$this->peso = $peso;
		$this->calcImc();
	}

	public function __set($name,$value){
		if($name == 'imc'){
			$this->imc = $value;
			$this->peso = $this->altura**2*$this->imc;
		}
	}

	public function __toString()
	{
		$className = self::class;
		return 	"\n===Dados de $className ==="
			. "\nNome: $this->nome"
			. ($this->idade ? "\nIdade: $this->idade" : "")
			. "\nPeso: $this->peso"
			. "\nAltura: $this->altura"
			. "\nIMC: " . number_format($this->imc, 2) . "\n";
	}
}
