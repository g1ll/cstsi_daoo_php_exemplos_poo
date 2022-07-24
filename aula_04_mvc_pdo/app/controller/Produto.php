<?php

namespace app\controller;

use app\model\ProdutoDao;

class Produto extends Controller
{

	public function __construct()
	{
		$this->setHeader();
		$this->model = new ProdutoDao();
	}

	public function index()
	{
		echo json_encode($this->model->read());
	}

	public function show($id)
	{
		$produto = $this->model->show($id);
		if ($produto) {
			$json = ['produto' => $produto];
		} else {
			$json = ['Erro' => "Produto não encontrado"];
			header('HTTP/1.0 404 Not Found');
		}
		echo json_encode($json);
	}
}
