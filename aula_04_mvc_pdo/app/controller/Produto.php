<?php

namespace app\controller;

use app\model\ProdutoDao;

class Produto extends Controller{

	public function __construct()
	{
		$this->model = new ProdutoDao();
	}

	public function index()
	{	
		return json_encode($this->model->read());
	}

	public function show($id)
	{
		if(isset($id)) {
			$produto = $this->model->show($id);
			if($produto)
				$json =['produto'=>$produto];
			else
				$json = ['Erro'=>"Produto não encontrado"];
			echo json_encode($json);
		}
	}
}