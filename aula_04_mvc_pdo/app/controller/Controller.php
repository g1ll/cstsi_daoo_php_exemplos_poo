<?php 

namespace app\controller;

abstract class Controller{

	protected static $query;
	protected $model;

	public abstract function index();

}