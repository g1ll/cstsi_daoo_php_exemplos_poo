<?php
namespace classes;

abstract class Pessoa{
	public  $nome, $idade;

	public abstract function __toString();
	
	public function __destruct()
	{
		echo "\n$this->nome foi removido!\n";
	}

	public function __set($name,$value){
    	$this->$name=$value;
	}
	
	public function __get($name){
		return $this->$name;
	}
}
?>