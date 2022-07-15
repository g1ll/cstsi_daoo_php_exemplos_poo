<?php
namespace classes; 

class Pessoa{
	public  $nome, $idade, $peso, $altura;
	private $imc;

	public function __construct($nome, $peso, $altura, $idade = null)
	{
		$this->nome = $nome;
		$this->idade = $idade;
		$this->peso = $peso;
		$this->altura = $altura;
	}

	public function __destruct()
	{
		echo "\n$this->nome foi destruído!\n";
	}

	public function showIMC()
	{	
		if(!$this->imc) echo "O IMC ainda não foi calculado!";
		echo "\nIMC $this->nome: $this->imc\n";
	}

	public function setAltura($altura)
	{
		$this->altura = $altura;
		IMC::calc($this);
	}

	public function setPeso($peso)
	{
		$this->peso = $peso;
		IMC::calc($this);
	}

	public function getAltura(){
		return $this->altura;
	}

	public function getPeso(){
		return $this->peso;
	}

	// public function __set($name,$value){
	// 	if($name == 'imc' && sizeof($value)==2){
	// 		$this->peso = $value[0];
	// 		$this->altura = $value[1];
	//		$this->calcImc();
	// 	}
	// }

	public function __set($name,$value){
		if($name == 'imc'){
			$this->imc = $value;
			$this->peso = $this->altura**2*$this->imc;
		}
	}

	// public function __set($name,$value){
	// 	$this->$name = $value;
	// }

	public function __get($name){
		return $this->$name;
	}

	public function __toString()
	{
        return 	"\n===Dados da Pessoa==="
                    ."\nNome: $this->nome"
                   	. ($this->idade?"\nIdade: $this->idade":"")
                    ."\nPeso: $this->peso"
                    ."\nAltura: $this->altura";
    }
}
?>