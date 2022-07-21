<?php

namespace app\controller;

use app\model\ProdutoDao;

class Produto extends Controller
{

	public function __construct()
	{
		header("Content-Type:application/json;charset=utf-8'");
		$this->model = new ProdutoDao();
	}

	public function index()
	{
		echo json_encode($this->model->read());
	}

	public function show($id)
	{
		$produto = $this->model->show($id);
		if ($produto)
			$json = ['produto' => $produto];
		else
			$json = ['Erro' => "Produto não encontrado"];
		echo json_encode($json);
	}
}
