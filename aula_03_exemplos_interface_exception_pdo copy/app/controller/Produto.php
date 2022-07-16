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
}