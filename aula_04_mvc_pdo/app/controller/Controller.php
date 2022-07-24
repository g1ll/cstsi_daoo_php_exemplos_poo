<?php 

namespace app\controller;

abstract class Controller{

	protected static $query;
	protected $model;

	public abstract function index();

	protected function setHeader(){
		header("Content-Type:application/json;charset=utf-8'");
	}

}