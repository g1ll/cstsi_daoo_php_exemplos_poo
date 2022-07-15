<?php 

namespace classes;

class IMC{

	public static function calc(Pessoa $pessoa)
	{
		if ($pessoa->peso && $pessoa->altura) {
			return  $pessoa->imc = $pessoa->peso/$pessoa->altura**2;
        }else{
			echo "Erro, informe o peso e a altura primeiro!";
			return false;
		}
	}

	public static function classifica(Pessoa $pessoa){
			if($pessoa->imc<18.5) 
				return "Abaixo do Peso";
			else if($pessoa->imc<24.9)
				return "Saudável";
			else if($pessoa->imc<29.9)
				return "Sobrepeso";
			else return "Obesidade";
	}
}