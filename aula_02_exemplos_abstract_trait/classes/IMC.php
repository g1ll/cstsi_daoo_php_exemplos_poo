<?php

namespace classes;

trait IMC
{
	protected $imc;
	
	public function calcImc(){
        if ($this->peso && $this->altura) {
            $this->imc = $this->peso/$this->altura**2;
        }else{
			echo "Erro, informe o peso e a altura primeiro!";
		}
	}
}